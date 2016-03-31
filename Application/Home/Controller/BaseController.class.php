<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
	public function _initialize()
	{
		$auto_login = new \User\Api\UserApi;
		if($auto_login->AutoLogin())
		{
			// session _ACCESS_LIST
			// print_r($_SESSION['_ACCESS_LIST']);
			$access = \Org\Util\Rbac::AccessDecision();
			if(!$access)
			{
				$this->error('对不起，您没有访问权限');
			}
		}
		else
		{
			$this->redirect('/User/Page/Intro');
		}
	}
}