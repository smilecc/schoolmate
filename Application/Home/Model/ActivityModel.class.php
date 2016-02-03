<?php
namespace Home\Model;
use Think\Model;
class ActivityModel extends Model {
	public function CreateActivity($title,$content,$classid,$options=array())
	{
		$data = array(
			'activitytitle' 	=> $title,
			'activitycontent' 	=> $content,
			'user_id' 			=> cookie('userid'),
			'class_id' 			=> $classid,
			'checkidetifier' 	=> C('ACTIVITY_CHECK_DEFAULT')
			);

		$data = array_merge($data,$options);
		$id = $this->add($data);
		return $id;
	}
}