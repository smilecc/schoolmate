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

	public function ChangeClass($data)
	{
		return $this->save($data);
	}

	public function GetAll()
	{
		return $this->query("SELECT class.id,attendandate.attendan,class.classname FROM class,attendandate WHERE(attendandate.id = class.attendandate_id)");
	}
}