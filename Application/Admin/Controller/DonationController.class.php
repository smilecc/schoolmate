<?php
namespace Admin\Controller;
use Think\Controller;

class DonationController extends BaseController {
	public function index($projectid=-1){
		$db = M('Donation')->field('donation.*,donation_project.donationname as projectname,branch.branch_name,donationuser.username as donationusername,donationuser.realname as donationrealname,enderuser.realname as enderrealname')
		->join('LEFT JOIN `user` as donationuser ON donation.alumnus_id = donationuser.id')
		->join('LEFT JOIN `user` as enderuser ON donation.enter_uid = enderuser.id')
		->join('LEFT JOIN branch ON branch_id = branch.id')
		->join('LEFT JOIN donation_project ON donation_project.id = donationproject_id');

		if ($projectid == -1) {
			$arr = $db->select();
		} else {
			$arr = $db->where('donationproject_id=%d', $projectid)->select();
		}

		$proarr = M('DonationProject')->select();

		$this->assign('proid', $projectid);
		$this->assign('prolist', $proarr);
		$this->assign('donationlist', $arr);
		$this->display();
	}

	public function create_info($proid, $source) {
		if ($source == 1 && I('branchid') == -1) {
			$this->error('请选择一个分会');
		}
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
			$source_content = I('foreignname');
			break;
			default:
			$source = -1;
			break;
		}

		$this->assign('projectid', $proid);
		$this->assign('sourceid', $source);
		$this->assign('source', $source_content);
		$this->assign('companyname', I('companyname'));
		$this->display();
	}

	public function create_project($mode=0) {
		$pro_arr = M('DonationProject')->order('id desc')->select();
		$branch_arr = M('Branch')->order('id desc')->select();
		$this->assign('mode', $mode);
		$this->assign('branchlist',$branch_arr);
		$this->assign('prolist', $pro_arr);
		$this->display();
	}

	public function branch() {
		$branch_arr = M('Branch')->select();
		$this->assign('branchlist',$branch_arr);
		$this->display();
	}

	public function donation_detail($donationid) {
		$arr = M('DonationPersonDetail')->where('donation_id=%d', $donationid)->select();
		$this->assign('donationid',$donationid);
		$this->assign('detaillist', $arr);
		$this->display();
	}
}