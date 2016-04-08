<?php
namespace Home\Controller;
use Think\Controller;
class ClassController extends BaseController {

	private function myClassid() {
	    return M('Alumnus')->where('user_id=%d', session('id'))->getField('class_id');
	}

	public function index() {
	    // 获取基本数据
		$classid = self::myClassid();
		$classinfo = M('Class')->where('id=%d',$classid)->find();
		$classinfo['attendan'] = M('Attendandate')->where('id=%d',$classinfo['attendandate_id'])->getField('attendan');

	    // 获取活动列表
	    $activity_list = D('Activity')->GetClassList(5, self::myClassid());
	    $this->assign('activity_list',$activity_list);

	    // 获取成员
	    $member_list = D('Class')->GetMember(self::myClassid(),5);
	    $this->assign('member_list',$member_list);

	    // 获取相册
		$albumid = D('Album')->GetIdByUserid(session('id'));
		$album_arr = M('Albumphoto')->where('album_id=%d',$albumid)->order('id desc')->limit(4)->select();
		$this->assign('albumlist',$album_arr);

		$this->assign('info',$classinfo);
		$this->display();
	}

	public function activity() {
		$list = D('Activity')->GetClassAll(self::myClassid());

		$this->assign('list',$list);
		$this->display();
	}

	public function activitycg($aid=-1) {
	    $this->assign('classid',self::myClassid());
	    if($aid != -1) {
			$detail = M('Activity')->where('id=%d', $aid)->find();
			$this->assign('detail',$detail);
	    }
	    $this->assign('aid', $aid);
		$this->display();
	}

	public function member() {
	    $member_list = D('Class')->GetMember(self::myClassid());
	    $this->assign('list',$member_list);
	    $this->display();
	}

	public function album() {
		$albumid = D('Album')->GetIdByUserid(session('id'));
		$album_arr = M('Albumphoto')->where('album_id=%d',$albumid)->order('id desc')->select();
		$this->assign('albumlist',$album_arr);
		$this->display();
	}

	public function activitydetail($aid) {
		$detail = M('Activity')->where('id=%d', $aid)->find();
		$this->assign('detail',$detail);
		$this->display();
	}
}