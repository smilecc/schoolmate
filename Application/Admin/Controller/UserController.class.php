<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
	public function index($alert = false) {
		$this->assign('alert',$alert);
		$this->display();
	}
}