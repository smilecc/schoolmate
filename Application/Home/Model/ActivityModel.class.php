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

		trace($data);
		if(CheckFieldNotNull($data) == false)
		{
			return GetResult(false,'存在未填字段');
		}

		$data = array_merge($data,$options);
		$id = $this->add($data);
		
		if($id > 0)
		{
			return GetResult(true,'操作成功',array('id' => $id));
		}
		else
		{
			return GetResult(false);
		}
	}
}