<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
	public function index(){
		$page['classcount'] = M('Class')->count();
		$page['systemcount'] = M('User')->count();
		$page['usercount'] = M('User')->count('username');

		$page['donation_cash'] = M('Donation')->query('SELECT IFNULL(SUM(d.donationcash),0) as number FROM donation_person_detail as d')[0]['number'];
		$page['donation_goods'] = M('Donation')->query('SELECT COUNT(d.donationgoods) as number FROM donation_person_detail as d WHERE d.donationcash = 0')[0]['number'];

		$page['branch_cash'] = M('Donation')->query('SELECT IFNULL(SUM(d.donationcash),0) as number FROM donation_person_detail as d WHERE (d.donation_id in (SELECT id FROM donation WHERE donation_source = 1))')[0]['number'];
		$page['branch_goods'] = M('Donation')->query('SELECT COUNT(d.donationgoods) as number FROM donation_person_detail as d WHERE d.donationcash = 0 AND (d.donation_id in (SELECT id FROM donation WHERE donation_source = 1))')[0]['number'];

		$page['person_cash'] = M('Donation')->query('SELECT IFNULL(SUM(d.donationcash),0) as number FROM donation_person_detail as d WHERE (d.donation_id in (SELECT id FROM donation WHERE donation_source = 2))')[0]['number'];
		$page['person_goods'] = M('Donation')->query('SELECT COUNT(d.donationgoods) as number FROM donation_person_detail as d WHERE d.donationcash = 0 AND (d.donation_id in (SELECT id FROM donation WHERE donation_source = 2))')[0]['number'];

		$page['company_cash'] = M('Donation')->query('SELECT IFNULL(SUM(d.donationcash),0) as number FROM donation_person_detail as d WHERE (d.donation_id in (SELECT id FROM donation WHERE donation_source = 3))')[0]['number'];
		$page['company_goods'] = M('Donation')->query('SELECT COUNT(d.donationgoods) as number FROM donation_person_detail as d WHERE d.donationcash = 0 AND (d.donation_id in (SELECT id FROM donation WHERE donation_source = 3))')[0]['number'];

		$this->assign('page',$page);
		$this->display();
	}
}