<?php
namespace Admin\Model;
use Think\Model;
class AttendandateModel extends Model {
	function DisposeClass(&$class){
		$alist = $this->select();
		foreach ($alist as $key => $value) {
			$kvarr[$value['id']] = $value['attendan'];
		}

		foreach ($class as $key => &$value) {
			$value['attendan'] = $kvarr[$value['attendandate_id']];
		}
	}
}