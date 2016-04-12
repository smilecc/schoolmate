<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	public function _initialize() {
		if(session('id') == null) {
			$this->error('对不起，你未登录', '/User/Page/login');
		}
	}

	public function setting() {
		$userinfo = M('User')->where('id=%d', session('id'))->find();
		$this->assign('userinfo',$userinfo);
		$this->display();
	}

	public function update_setting($phone, $birthday) {
		$sex = I('sex');
		$data = array(
			'id'		=> session('id'),
			'phone'  	=> $phone,
			'birthday' 	=> $birthday
			);
		if ($sex != null && ($sex == 1 || $sex == 2)) {
			$data['sex'] = $sex;
		}
		if(M('User')->save($data)) {
			$this->success('资料保存成功');
		} else {
			$this->error('保存失败，未修改或系统繁忙');
		}
	}
}