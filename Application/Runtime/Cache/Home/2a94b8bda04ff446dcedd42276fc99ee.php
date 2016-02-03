<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="/Public/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <style type="text/css">
    html,body{
        width: 100%;
    }
    </style>
</head>
<body>
<script src="/Public/resources/home/js/jquery-1.10.2.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/umeditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/umeditor/umeditor.min.js"></script>
<script type="text/javascript" src="/Public/umeditor/lang/zh-cn/zh-cn.js"></script>

<script id="container" name="content" type="text/plain" class="form-group">
                                                这里写你的初始化内容
                                        </script>
<script type="text/javascript">
    var um = UM.getEditor('container');
</script>
</body>
</html>