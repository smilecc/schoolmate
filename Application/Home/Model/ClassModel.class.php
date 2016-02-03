<?php
namespace Home\Model;
use Think\Model;
class ClassModel extends Model {
	public function CreateClass($classname,$attendandate_id=null,$headmaster=null)
	{
		$data = array(
			'classname' => $classname,
			'attendandate_id' => $attendandate_id,
			'headmaster' => $headmaster
			);

		$id = $this->add($data);
		return $id;
	}

	public function DeleteClass($classid)
	{
		if($this->where('id=%d',$classid)->delete() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function Change()
	{
		
	}
}