<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	public function index() {}

	public function setting() {
		$userinfo = M('User')->where('id=%d', session('id'))->find();
		$this->assign('userinfo',$userinfo);
		$this->display();
	}
}