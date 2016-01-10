<?php
namespace User\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function _initialize()
    {
        $access = \Org\Util\Rbac::AccessDecision();
        if(!$access)
        {
            $this->error('你没有权限');
        }
    }

    public function index()
    {}
}