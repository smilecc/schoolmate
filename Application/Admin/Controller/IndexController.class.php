<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
	public function index(){
		$page['classcount'] = M('Class')->count();
		$page['systemcount'] = M('User')->count();
		$page['usercount'] = M('User')->where('userstatus=1')->count();

		$page['donation_cash'] = M('Donation')->query('SELECT IFNULL(SUM(d.donationcash),0) as number FROM donation_person_detail as d')[0]['number'];
		$page['donation_goods'] = M('Donation')->query('SELECT COUNT(d.donationgoods) as number FROM donation_person_detail as d WHERE d.donationcash = 0')[0]['number'];

		$page['branch_cash'] = M('Donation')->query('SELECT IFNULL(SUM(d.donationcash),0) as number FROM donation_person_detail as d WHERE (d.donation_id in (SELECT id FROM donation WHERE donation_source = 1))')[0]['number'];
		$page['branch_goods'] = M('Donation')->query('SELECT COUNT(d.donationgoods) as number FROM donation_person_detail as d WHERE d.donationcash = 0 AND (d.donation_id in (SELECT id FROM donation WHERE donation_source = 1))')[0]['number'];

		$page['person_cash'] = M('Donation')->query('SELECT IFNULL(SUM(d.donationcash),0) as number FROM donation_person_detail as d WHERE (d.donation_id in (SELECT id FROM donation WHERE donation_source = 2))')[0]['number'];
		$page['person_goods'] = M('Donation')->query('SELECT COUNT(d.donationgoods) as number FROM donation_person_detail as d WHERE d.donationcash = 0 AND (d.donation_id in (SELECT id FROM donation WHERE donation_source = 2))')[0]['number'];

		$page['company_cash'] = M('Donation')->query('SELECT IFNULL(SUM(d.donationcash),0) as number FROM donation_person_detail as d WHERE (d.donation_id in (SELECT id FROM donation WHERE donation_source = 3))')[0]['number'];
		$page['company_goods'] = M('Donation')->query('SELECT COUNT(d.donationgoods) as number FROM donation_person_detail as d WHERE d.donationcash = 0 AND (d.donation_id in (SELECT id FROM donation WHERE donation_source = 3))')[0]['number'];

		$year = date('Y');
		$donation = M('Donation');
		$dprop = M('DonationProject');
		for ($i = $year; $i >= 2015 ; $i--) { 
			$count = $donation->where("donation.id in (SELECT donation_person_detail.donation_id FROM donation_person_detail WHERE YEAR(donation_person_detail.createdtime)=$i)")->count();
			if ($count != 0) {


				$prolist = M('DonationProject')->select();
				foreach ($prolist as $key => &$value) {
					$value['cash'] = M('Donation')->query('SELECT IFNULL(SUM(d.donationcash),0) as number FROM donation_person_detail as d WHERE (YEAR(d.createdtime) = '.$i.' AND d.donation_id in (SELECT donation.id FROM donation JOIN donation_project ON donation_project.id = donation.donationproject_id AND donation_project.id = '.$value['id'].'))')[0]['number'];
					$value['goods'] = M('Donation')->query('SELECT COUNT(d.donationgoods) as number FROM donation_person_detail as d WHERE (YEAR(d.createdtime) = '.$i.' AND d.donationcash = 0 AND d.donation_id in (SELECT donation.id FROM donation JOIN donation_project ON donation_project.id = donation.donationproject_id AND donation_project.id = '.$value['id'].'))')[0]['number'];
				}

				$d_arr[] = array(
					'year' 		=> $i,
					'prolist'	=> $prolist
					);
			}
		}

		$this->assign('donationlist',$d_arr);
		$this->assign('page',$page);
		$this->display();
	}
}