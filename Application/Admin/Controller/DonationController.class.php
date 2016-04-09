<?php
namespace Admin\Controller;
use Think\Controller;
class DonationController extends Controller {
    public function index(){
        $this->display();
    }

    public function create_info($proid, $source) {
    	if($proid == -1 || $source == -1) {
    		$this->error('非法提交');
    	}
    	$this->display();
    }

    public function create_project() {
    	$pro_arr = M('DonationProject')->order('id desc')->select();
    	$branch_arr = M('Branch')->order('id desc')->select();
    	$this->assign('branchlist',$branch_arr);
    	$this->assign('prolist', $pro_arr);
    	$this->display();
    }

    public function branch() {
    	$branch_arr = M('Branch')->select();
    	$this->assign('branchlist',$branch_arr);
    	$this->display();
    }
}