<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function _initialize()
    {
    	$auto_login = new \User\Api\UserApi;
    	$auto_login->AutoLogin();

    	// session _ACCESS_LIST
        $access = \Org\Util\Rbac::AccessDecision();
        if(!$access)
        {
            $this->error('对不起，您没有访问权限');
        }
    }
}