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
		$albumid = M('Album')->where('class_id = %d', $classid)->getField('id');
		if($albumid != null) {
			M('Albumphoto')->where('album_id',$albumid)->delete();
			M('Album')->where('id=%d',$albumid)->delete();
		}

		M('Alumnus')->where('class_id=%d', $classid)->delete();
		M('User')->where('`user`.id in (SELECT user_id FROM alumnus WHERE class_id = %d)', $classid)->setField('status', '2');

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