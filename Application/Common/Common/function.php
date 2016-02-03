<?php
// 输出信息
function GetResult($status=true, $info='操作成功',$append=array())
{
	if(false == $status){
		$info = '系统繁忙，操作失败';
	}

	$out = array(
			'status' => $status,
			'info' => $info
		);
	$out = array_merge($out,$append);

	return json_encode($out);
}

// 检查数组内空字段
function CheckFieldNotNull($array)
{
	foreach ($array as $key => $value) {
		if(strlen($value) == 0)
		{
			return false;
		}
	}
	return true;
}