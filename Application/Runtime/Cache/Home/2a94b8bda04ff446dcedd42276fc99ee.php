<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php if(is_array($data)): foreach($data as $key=>$vo): ?><P><?php echo ($vo["value"]); ?></P><?php endforeach; endif; ?>

</body>
</html>