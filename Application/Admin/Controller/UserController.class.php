<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
	public function index($alert = false) {
		$this->assign('alert',$alert);
		$this->display();
	}

	public function role() {
		$weblist = M('ThinkRoleUser')->field('roleuser.*,user.username,user.realname')->table('think_role_user roleuser,user user')
		->where('role_id = 3 AND user_id = user.id')->select();

		$classlist = M('ThinkRoleUser')->field('roleuser.*,user.username,user.realname,class.classname')->table('think_role_user roleuser,user user,alumnus alumnus,class class')
		->where('roleuser.role_id = 2 AND roleuser.user_id = user.id AND alumnus.class_id = class.id AND user.id = alumnus.user_id')->select();

		$rolelist = M('ThinkRole')->select();

		$this->assign('teacherlist', D('User')->GetTeacher());
		$this->assign('rolelist',$rolelist);
		$this->assign('weblist',$weblist);
		$this->assign('classlist',$classlist);

		$this->assign('attendanlist', M('Attendandate')->select());
		$this->display();
	}

	public function rolelists($type) {

		$this->display();
	}
}