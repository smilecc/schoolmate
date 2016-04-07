<?php
namespace Home\Controller;
use Think\Controller;
class ApiController extends Controller {
    public function index(){}

	public function CreateActivitty(){
		if(IS_POST){
			$title = I('title');
			$content =  I('content');
			$classid = I('classid');

			echo D('Activity')->CreateActivity($title,$content,$classid);
		}
	}    

	public function upload_photo(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
		// 上传文件 
		$info   =   $upload->uploadOne($_FILES['file']);

		if(!$info) {// 上传错误提示错误信息
			print_r($_FILES);
			//$this->error($upload->getError());
		}else{
			$image = new \Think\Image();
			$image->open($upload->rootPath.$info['savepath'].$info['savename']);
			$image->thumb(300, 165, \Think\Image::IMAGE_THUMB_FIXED)->save($upload->rootPath.$info['savepath'].'sm_'.$info['savename']);

			$photo = array(
				'code1'		=> $upload->rootPath.$info['savepath'],
				'code2'		=> $info['savename'],
				'photourl'  => $upload->rootPath.$info['savepath'].$info['savename'],
				'user_id'	=> cookie('userid'),
				'album_id'	=> D('Album')->GetIdByUserid(cookie('userid'))
				);
			M('Albumphoto')->add($photo);

			$this->success('上传成功');
		}
	}
}