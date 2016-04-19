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

			$roleid = $value['roleid'];
			if ($roleid == 4) {
				$data['username'] = $value['username'];
			}

			$resid = $this->add($data);

			if ($roleid == 4) {
				$user = new \User\Model\UserModel();
				$user->RegisterRandom($resid);
				$user->ResetPwd($resid);
			}

			
			$roleuser->add(array(
					'role_id' => $roleid,
					'user_id' => $resid
				));

			if($roleid != 4) {
				$alumnus->add(array(
					'class_id' => $value['classid'],
					'user_id'  => $resid
				));
			}
		}
	}

	public function DeleteUser($userid)
	{
		if(M('Alumnus')->where('user_id=%d', $userid)->delete())
		{
			if (M('User')->where('id=%d', $userid)->delete()) {
				return true;
			} else return false;
		} else return false;

	}

	public function GetUseridByName($username) {
		$count = $this->where("username='%s'", $username)->count();
		if($count == 1) {
			return $this->where("username='%s'", $username)->getField('id');
		} else {
			return false;
		}
	}

	public function FindUser($classid, $realname)
	{
		return $this->join("alumnus ON alumnus.class_id = ".$classid." AND `user`.id = alumnus.user_id")->where("realname = '%s'", $realname)->count();
	}

	public function FindTeacher($realname)
	{
		return $this->join('JOIN think_role_user ON `user`.id = think_role_user.user_id AND think_role_user.role_id = 4')->where("realname='%s'", $realname)->count();
	}

	public function GetTeacher()
	{
		return $this->join('JOIN think_role_user ON `user`.id = think_role_user.user_id AND think_role_user.role_id = 4')->select();
	}

	public function FindUsername($username)
	{
		$res = $this->where("username='%s'", $username)->count();
		if ($res == 1) {
			return true;
		} else return false;
	}
}