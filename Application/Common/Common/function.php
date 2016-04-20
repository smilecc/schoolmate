<?php
// 输出信息
function GetResult($status=true, $info='操作成功',$append=array())
{
	if(false == $status && $info == '操作成功'){
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
	trace($array);
	foreach ($array as $key => $value) {
		if(strlen($value) == 0)
		{
			return false;
		}
	}
	return true;
}

function getbrowser(){
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 9.0')){ 
	    return 'Internet Explorer 9.0'; 
	} 
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 8.0')){ 
	    return 'IELOW'; 
	} 
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 7.0')){ 
	    return 'IELOW'; 
	} 
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0')){ 
	    return 'IELOW'; 
	} 
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Firefox')){ 
	    return 'Firefox'; 
	} 
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Chrome')){ 
	    return 'Chrome'; 
	} 
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Safari')){ 
	    return 'Safari'; 
	} 
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Opera')){ 
	    return 'Opera'; 
	} 
	if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'360SE')){ 
	    return '360SE'; 
	}
}