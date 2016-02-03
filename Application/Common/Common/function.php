<?php
function GetResult($status=true, $info='操作成功',$append=array())
{
	$out = array(
			'status' => $status,
			'info' => $info
		);
	$out = array_merge($out,$append);

	return json_encode($out);
}

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