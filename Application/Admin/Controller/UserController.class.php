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
		$this->assign('weblist',$weblist);
		$this->display();
	}

	public function rolelists($type) {

		$this->display();
	}
}