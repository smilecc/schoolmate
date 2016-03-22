<?php
namespace User\Controller;
use Think\Controller;
class PageController extends Controller {
    public function index(){}

    public function login()
    {
    	$this->display();
    }

    public function register()
    {
    	$attendan_list = M('Attendandate')->order('attendan desc')->select();
    	$this->assign('attendan',$attendan_list);
    	$this->display();
    }
}