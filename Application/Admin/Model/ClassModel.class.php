<?php
namespace Admin\Model;
use Think\Model;
class ClassModel extends Model {
	public function CreateClass($data)
	{
		$id = $this->add($data);
		$AlbumData = array(
			'class_id'  => $id,
			'albumname' => $data['classname']
			);
		M('Album')->add($AlbumData);
		return $id;
	}

	public function DeleteClass($classid)
	{
		$homeclass = new \Home\Model\ClassModel();
		$member_count = count($homeclass->GetMember($classid));

		if ($member_count != 0) {
			return -1;
		}

		if($this->where('id=%d',$classid)->delete() > 0)
		{
			return 1;
		}
		else
		{
			return 0;
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