<?php
namespace Admin\Model;
use Think\Model;
class AttendandateModel extends Model {
	public function _initialize()
	{
		$toyear = M('Attendandate')->where('attendan=%d', date('Y'))->count();
		if($toyear == 0) {
			M('Attendandate')->add(array(
				'attendan' => date('Y')
				));
		}
	}

	public function DisposeClass(&$class) {
		$alist = $this->select();
		foreach ($alist as $key => $value) {
			$kvarr[$value['id']] = $value['attendan'];
		}

		foreach ($class as $key => &$value) {
			$value['attendan'] = $kvarr[$value['attendandate_id']];
		}
	}

	// 获取映射列表 年份 -> ID $map[年份]
	public function GetMap() {
		$alist = $this->select();
		$map = array();

		foreach ($alist as $key => $value) {
			$map[$value['attendan']] = $value['id'];
		}
		return $map;
	}
}