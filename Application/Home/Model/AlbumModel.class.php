<?php
namespace Home\Model;
use Think\Model;
class AlbumModel extends Model {
	public function GetIdByUserid($userid) {
		$classid = M('Alumnus')->where('user_id=%d',$userid)->getField('class_id');
		$id = $this->where('class_id=%d',$classid)->getField('id');
		return $id;
		// if($id > 0) return $id;
		// else {
		// 	return $this->add(array(
		// 		'class_id' => $classid,

		// 		));
		// }
	}
}