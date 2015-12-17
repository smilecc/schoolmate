<?php
namespace Home\Model;
use Think\Model;
class TestHelloModel extends Model {
	function add_plus($value)
	{
		$arr = array('value' => $value + 1);
		return $this->add($arr);
	}
}