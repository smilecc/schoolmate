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
        switch ($source) {
            case '1':
                $source_content = I('branchid');
                break;
            case '2':
                $source_content = D('User')->GetUseridByName(I('username'));
                if($source_content == false) {
                    $this->error('系统中不存在该用户名的用户');
                }
                break;
            case '3':
                $source_content = I('companyname');
            default:
                $source = -1;
                break;
        }

        $this->assign('projectid', $proid);
        $this->assign('sourceid', $source);
        $this->assign('source', $source_content);
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