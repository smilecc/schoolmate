<?php
namespace Admin\Controller;
use Think\Controller;
class ApiController extends BaseController {
	public function index(){ }

	public function ClassCreate(){
		if(IS_POST)
		{
			$data = array(
				'classname' => I('name'),
				'headmaster' => I('headmaster'),
				'attendandate_id' => I('attendandate')
				);

            // 判断是否存在空字段
			if(CheckFieldNotNull($data) == false)
			{
				echo GetResult(false,'有字段为空');
				return;
			}

            // 入库
			$id = D('Class')->CreateClass($data);

			if($id > 0)
			{
				echo GetResult(true,'操作成功',array('id' => $id));
			}
			else
			{
				echo GetResult(false,'系统错误');
			}
		}
	}

	public function ClassDelete($id){
		if(IS_POST){
			if(D('Class')->DeleteClass($id)){
				echo GetResult();
			}else{
				echo GetResult(false);
			}
		}
	}

	public function ClassChange(){
		if(IS_POST)
		{
			$data = array(
				'id' => I('id'),
				'classname' => I('name'),
				'headmaster' => I('headmaster'),
				'attendandate_id' => I('attendandate')
				);

            // 判断是否存在空字段
			if(CheckFieldNotNull($data) == false)
			{
				echo GetResult(false,'有字段为空');
				return;
			}

            // 入库
			$id = D('Class')->ChangeClass($data);

			if($id > 0)
			{
				echo GetResult();
			}
			else
			{
				echo GetResult(false,'操作失败，数据未修改或系统繁忙');
			}
		}
	}

	public function op_user_role($user_id=null, $role_id, $type, $mode='form') {
		if(IS_POST)
		{
			if($user_id == null)
			{
				if(null == I('username'))
				{
					$this->error('出问题了');
					exit();
				} else {
					$username = I('username');
					$user_id = M('User')->where("username='%s'",$username)->getField('id');

					if($user_id == null)
					{
							$this->error('用户名不存在');
							exit();
					}
				}
			}

			$data = array(
				'user_id' => $user_id,
				'role_id' => $role_id
				);
			if($type == 'add')
			{
				$res = M('ThinkRoleUser')->add($data);
			}
			else
			{
				$res = M('ThinkRoleUser')->where('user_id=%d', $user_id)->setField('role_id', $role_id);
			}

			if($res > 0)
			{
				$res_arr = array('status' => true);
			} 
			else
			{
				$res_arr = array('status' => false);
			}
			if($mode == 'ajax')
			{
				echo json_encode($res_arr);
			}
			else
			{
				if($res_arr['status'])
				{
					$this->success('操作成功');
				}
				else
				{
					$this->error('操作失败');
				}
			}	
		}
	}

	public function delete_role_user($user_id, $role_id) {
		if($role_id == 4) {
			M('ThinkRoleUser')->where('user_id=%d AND role_id=%d',$user_id, $role_id)->delete();
			if(M('User')->where('id=%d', $user_id)->delete())
			{
				$this->success('删除成功');
			}
			else
			{
				$this->error('删除失败');
			}
		} else {
			if(M('ThinkRoleUser')->where('user_id=%d AND role_id=%d',$user_id, $role_id)->setField('role_id', '1') > 0)
			{
				$this->success('删除成功');
			}
			else
			{
				$this->error('删除失败');
			}
		}
	}

	public function get_class($attendandate_id)
	{
		$res_arr = M('Class')->where('attendandate_id=%d',$attendandate_id)->select();
		echo json_encode($res_arr);
	}


	public function get_student($class_id)
	{
		$res_arr = M('Alumnus')->field('alumnus.*,user.username,user.realname')->table('alumnus alumnus,user user')
		->where('alumnus.class_id=%d AND alumnus.user_id = user.id',$class_id)->select();
		echo json_encode($res_arr);
	}

	public function donation_project_create($pro_name)
	{
		$resid = M('DonationProject')->add(array(
			'donationname' => $pro_name
			));
		$this->success('创建成功', '/Admin/Donation/create_project?time='.time());
	}

	public function donation_project_delete($proid)
	{
		M('DonationPersonDetail')->where('donation_id in (SELECT id FROM donation WHERE donationproject_id = %d)', $proid)->delete();
		M('Donation')->where('donationproject_id = %d', $proid)->delete();
		if(M('DonationProject')->where('id=%d', $proid)->delete())
		{
			$this->success('删除成功', '/Admin/Donation/create_project?time='.time());
		}
		else
		{
			$this->error('删除失败');
		}
	}

	public function donation_create($projectid, $sourceid, $source, $count)
	{
		if($sourceid == -1 || $projectid == -1) {
			$this->error('系统错误');
		} else {
			$donation_data = array(
				'donationproject_id' => $projectid,
				'enter_uid'			 => session('id'),
				'donation_source'	 => $sourceid,
				'donationcompany'	 => I('companyname')
				);
			if ($source == -1 || $source == '') {
				$this->error('存在无效的数据');
			}

			// 处理捐赠数据
			$property_arr = array();
			for ($i = 0; $i < $count; $i++) { 
				$property_content = I('property'.$i);
				if ($property_content == null || $property_content == '') {
					continue;
				}

				// 分类捐赠的是现金还是物品
				if (is_numeric($property_content)) {
					$property_arr[] = array(
						'donationcash' => $property_content,
						'donationgoods'=> ''
						);
				} else {
					$property_arr[] = array(
						'donationcash'  => 0,
						'donationgoods' => $property_content
						);
				}
			}

			if (count($property_arr) == 0) {
				$this->error('不能提交空的明细列表');
			}

			// 分类捐赠来源
			switch ($sourceid) {
				case '1':
					$donation_data['branch_id'] = $source;
					break;
				case '2':
					$donation_data['alumnus_id'] = $source;
					break;
				case '3':
					$donation_data['foreign_name'] = $source;
					break;
				default:
					$this->error('存在无效的数据');
					break;
			}

			$donation_id = M('Donation')->add($donation_data);

			foreach ($property_arr as $key => &$value) {
				$value['donation_id'] = $donation_id;
			}
			M('DonationPersonDetail')->addAll($property_arr);
			$this->success('提交成功', '/Admin/Donation?time='.time());
		}
	}

	public function donation_delete($donationid)
	{
		M('DonationPersonDetail')->where('donation_id=%d', $donationid)->delete();
		if(M('Donation')->where('id=%d', $donationid)->delete())
		{
			$this->success('删除成功', '/Admin/Donation/?time='.time());
		}
		else
		{
			$this->error('删除失败');
		}
	}

	public function branch_create($name)
	{
		M('Branch')->add(array(
			'branch_name' => $name
			));
		$this->success('创建成功', '/Admin/Donation/branch?time='.time());
	}

	public function branch_change($id, $name)
	{
		$data = array(
			'branch_name' => $name
			);

		if(M('Branch')->where('id=%d', $id)->save($data))
		{
			$this->success('修改成功', '/Admin/Donation/branch?time='.time());
		}
		else
		{
			$this->error('修改失败，未修改或系统错误');
		}
	}

	public function branch_delete($branchid)
	{
		M('DonationPersonDetail')->where('donation_id in (SELECT id FROM donation WHERE branch_id = %d)', $branchid)->delete();
		M('Donation')->where('branch_id = %d', $branchid)->delete();
		if(M('Branch')->where('id=%d', $branchid)->delete())
		{
			$this->success('删除成功', '/Admin/Donation/branch?time='.time());
		}
		else
		{
			$this->error('删除失败');
		}
	}

	public function save_user()
	{
		if (IS_POST) {
			$data = array(
				'realname' 	=> I('realname'),
				'sex' 		=> I('sex'),
				'phone'		=> I('phone'),
				'email'		=> I('email'),
				'birthday'	=> I('birthday'),
				'username'	=> I('username')
				);

			if(M('User')->where('id=%d', I('id'))->save($data))
			{
				$this->success('修改成功');
			}
			else
			{
				$this->error('修改失败，未修改或系统错误');
			}
		}
	}

	public function add_user($realname, $sex, $classid, $isteacher=0)
	{
		if (IS_POST) {
			$data[] = array(
				'name'		=> $realname,
				'sex'		=> $sex,
				'classid'	=> $classid,
				'id'		=> ''
				);

			if ($isteacher == 1) {
				$data[0]['roleid'] = 4;
				$data[0]['username'] = I('username');

				if ($data[0]['username'] == null || $data[0]['username'] == '') {
					$this->error('工号不能为空');
				}
			}

			D('User')->AddUser($data);
			$this->success('操作成功');
		}
	}

	public function delete_user($userid)
	{
		if (IS_POST) {
			if (D('User')->DeleteUser($userid)) {
				$this->success('操作成功');
			} else $this->success('操作失败，系统繁忙');
		}
	}

	public function reset_pwd()
	{
		if (IS_POST) {
			$user = new \User\Model\UserModel();
			if ($user->ResetPwd(I('userid'))) {
				$this->success('重置成功');
			} else {
				$this->error('重置失败，用户未注册或系统错误');
			}
		}
	}

	public function create_donation_detail($donation_id, $value)
	{
		// 分类捐赠的是现金还是物品
		if (is_numeric($value)) {
			$data = array(
				'donationcash' => $value,
				'donationgoods'=> ''
				);
		} else {
			$data = array(
				'donationcash'  => 0,
				'donationgoods' => $value
				);
		}
		$data['donation_id'] = $donation_id;
		if (M('DonationPersonDetail')->add($data)) {
			$res = array('status' => true);
		} else {
			$res = array('status' => false);
		}
		echo json_encode($res);
	}

	public function change_donation_detail($did, $value)
	{
		// 分类捐赠的是现金还是物品
		if (is_numeric($value)) {
			$data = array(
				'donationcash' => $value,
				'donationgoods'=> ''
				);
		} else {
			$data = array(
				'donationcash'  => 0,
				'donationgoods' => $value
				);
		}
		if (M('DonationPersonDetail')->where('id=%d', $did)->save($data)) {
			$res = array('status' => true);
		} else {
			$res = array('status' => false);
		}
		echo json_encode($res);
	}

	public function delete_donation_detail($did)
	{
		if(M('DonationPersonDetail')->where('id=%d', $did)->delete()) {
			$res = array('status' => true);
		} else {
			$res = array('status' => false);
		}
		echo json_encode($res);
	}
}