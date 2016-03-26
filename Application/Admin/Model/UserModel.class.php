<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model {

	public function AddUser($data_list) {
		$alumnus = M('Alumnus');
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
		}
	}
}