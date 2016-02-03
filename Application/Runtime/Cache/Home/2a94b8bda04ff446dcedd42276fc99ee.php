<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<?php  ?>
<html>
<head>
	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

<title><?php echo C('SITE_NAME');?></title>

<!-- Bootstrap -->
<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/bootstrap/css/bootstrap-theme.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
 
	<div id="space_height">

		<!-- 头部 -->
		

<header>
    <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?php echo C('SITE_NAME');?></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
<!--           <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Link</a></li> -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">我的班级 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">班级活动</a></li>
              <li><a href="#">班级相册</a></li>
              <li><a href="#">班级通讯录</a></li>
            </ul>
          </li>
          <li><a href="#">物品捐赠</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户名 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">用户信息</a></li>
              <li><a href="#">信息修改</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">注销</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav>
</header>


		<!-- /头部 -->
		<div class="container">
			
	123

		</div>
	
	</div>
	<!-- /主体 -->

	<!-- 底部 -->
	<footer>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
</footer>
	<!-- /底部 -->
</div>
</body>
</html>