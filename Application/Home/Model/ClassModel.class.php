<?php
namespace Home\Model;
use Think\Model;
class ClassModel extends Model {
	public function GetMember($classid,$num=-1){
		$db = M('User')->where('class_id=%d',$classid)->join('alumnus ON user.id = alumnus.user_id');
		if($num != -1){
			$db->limit($num);
		}
		return $db->select();
	}
}