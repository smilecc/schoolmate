<?php
namespace Home\Controller;
use Think\Controller;
class ApiController extends Controller {
	public function _initialize() {
		if(session('user_role') != 2) {
			$this->error('对不起，您没有访问权限');
		}
	}

	public function index(){}

	public function CreateActivitty(){
		if(IS_POST){
			$title = I('title');
			$content =  I('content');
			$classid = I('classid');
			$aid = I('aid');

			echo D('Activity')->CreateActivity($title, $content, $classid, $aid);
		}
	}    

	public function delete_activity($aid) {
		if(IS_POST) {
			if(M('Activity')->where('id=%d', $aid)->delete() > 0) {
				$this->success('删除成功', '/Home/Class/activity?time='.time());
			} else {
				$this->error('删除失败');
			}
		}
	}

	public function save_user()
	{
		if (IS_POST) {
			$data = array(
				'realname' 	=> I('realname'),
				'sex' 		=> I('sex'),
				'phone'		=> I('phone'),
				'birthday'	=> I('birthday'),
				);

			if(M('User')->where('id=%d', I('id'))->save($data))
			{
				$this->success('修改成功');
			}
			else
			{
				$this->error('修改失败，未修改或系统错误');
			}
		}
	}

	public function upload_photo(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     10145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
		// 上传文件 
		$info   =   $upload->uploadOne($_FILES['file']);

		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{
			$image = new \Think\Image();
			$image->open($upload->rootPath.$info['savepath'].$info['savename']);
			$image->thumb(418, 300, \Think\Image::IMAGE_THUMB_FIXED)->save($upload->rootPath.$info['savepath'].'sm_'.$info['savename']);

			$photo = array(
				'code1'		=> $upload->rootPath.$info['savepath'],
				'code2'		=> $info['savename'],
				'photourl'  => $upload->rootPath.$info['savepath'].$info['savename'],
				'user_id'	=> session('id'),
				'album_id'	=> D('Album')->GetIdByUserid(session('id')),
				'photodescription' => I('photodescription')
				);
			M('Albumphoto')->add($photo);

			$this->success('上传成功', '/Home/Class/album?time='.time());
		}
	}

	public function delete_photo($photoid) {
		$count = M('Albumphoto')->where('id=%d',$photoid)->delete();
		if($count == 0) {
			$this->error('删除失败，系统繁忙，请稍后再试');
		} else {
			$this->success('删除成功', '/Home/Class/album?time='.time());
		}
	}
}