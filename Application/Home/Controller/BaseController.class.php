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
			// print_r($_SESSION);
			if(session('user_role') == 3 || session('user_role') == 4)
			{
				$this->redirect('/User/Page/intro');
				return;
			}

			$access = \Org\Util\Rbac::AccessDecision();
			if(!$access)
			{
				$this->error('对不起，您没有访问权限');
			}
		}
		else
		{
			$this->error('对不起，你没有登录', '/User/Page/intro');
		}
	}
}