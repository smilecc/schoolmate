<?php
namespace User\Controller;
use Think\Controller;
class ApiController extends Controller {
	public function index(){}

	public function login($email,$password)
	{
		$resArr = \User\Api\UserApi::Login($email,$password);
		echo json_encode($resArr);
	}

	public function register($username,$password,$email)
	{
    	//echo json_encode(\User\Api\UserApi::Register($username,$password,$email));
	}

	public function logout()
	{
		\User\Api\UserApi::Logout();
		$this->redirect('/User/Page/login');
	}

	public function get_class($attendandate_id)
	{
		$res_arr = M('Class')->where('attendandate_id=%d',$attendandate_id)->select();
		echo json_encode($res_arr);
	}

	public function student_register($realname, $sex, $classid, $classmate, $username, $email, $password)
	{
		$user = D('User');
		$check_res = $user->CheckStudent($realname, $sex, $classid, $classmate);

		if($check_res['status']) {
			$res_arr = $user->SaveUser($check_res['userid'], $username, $password, $email, $sex);
			if ($res_arr['status']) {
				$this->success($res_arr['info'],'/User/Page/login');
			} else {
				$this->error($res_arr['info']);
			}
		} else {
			$this->error($check_res['info']);
		}
	}
}