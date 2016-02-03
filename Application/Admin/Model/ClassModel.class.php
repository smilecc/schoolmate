<?php
namespace Admin\Model;
use Think\Model;
class ClassModel extends Model {
	public function CreateClass($data)
	{
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