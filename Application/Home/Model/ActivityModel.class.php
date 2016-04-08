<?php
namespace Home\Model;
use Think\Model;
class ActivityModel extends Model {
	public function CreateActivity($title, $content, $classid, $aid, $options=array())
	{
		$data = array(
			'activitytitle' 	=> $title,
			'activitycontent' 	=> $content,
			'user_id' 			=> session('id'),
			'class_id' 			=> $classid,
			'checkidetifier' 	=> C('ACTIVITY_CHECK_DEFAULT')
			);

		trace($data);
		if(CheckFieldNotNull($data) == false)
		{
			return GetResult(false,'存在未填字段');
		}

		$data = array_merge($data,$options);
		if($aid == -1) {
			$id = $this->add($data);
		} else {
			$this->where('id=%d', $aid)->save($data);
			$id = $aid;
		}
		
		if($id > 0)
		{
			return GetResult(true,'操作成功',array('id' => $id));
		}
		else
		{
			return GetResult(false);
		}
	}

	public function GetClassAll($classid){
		return M('Activity')->field('activity.*,user.realname')->table('activity activity,user user')
        ->where('class_id=%d AND user_id=user.id',$classid)->order('id desc')->select();
	}

	public function GetClassList($num,$classid){
		return M('Activity')->field('activity.*,user.realname')->table('activity activity,user user')
        ->where('class_id=%d AND user_id=user.id',$classid)->order('id desc')->limit($num)->select();
	}
}