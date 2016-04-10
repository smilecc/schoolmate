<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model {

	public function AddUser($data_list) {
		$alumnus = M('Alumnus');
		$roleuser = M('ThinkRoleUser');
		foreach ($data_list as $key => $value) {
			$data = array(
				'userstatus'	 => 0,
				'realname'		 => $value['name'],
				'sex'			 => $value['sex'],
				'IDcardNo'		 => $value['id']
				);

			$resid = $this->add($data);
			$alumnus->add(array(
					'class_id' => $value['classid'],
					'user_id'  => $resid
				));

			$roleuser->add(array(
					'role_id' => 1,
					'user_id' => $resid
				));
		}
	}

	public function GetUseridByName($username) {
		$count = $this->where("username='%s'", $username)->count();
		if($count == 1) {
			return $this->where("username='%s'", $username)->getField('id');
		} else {
			return false;
		}
	}
}