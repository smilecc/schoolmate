<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model {
	public function AddUser($data_list) {
		foreach ($data_list as $key => $value) {
			$data = array(
				'userstatus'	 => 0,
				'realname'		 => $data['name'],
				'sex'			 => $data['sex'],
				'IDcardNo'		 => $data['id']
				);
			$this->create($data);
			
		}

	}
}