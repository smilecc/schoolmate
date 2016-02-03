<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<?php  ?>
<html>
<head>
	<title><?php echo C('SITE_NAME');?>管理平台</title>
<meta charset='utf-8'>
<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
<title>Dashboard</title>
<meta content='Can' name='author'>
<link href="/Public/resources/admin/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
<link href="//cdn.bootcss.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="/Public/resources/admin/images/favicon.ico" rel="icon" type="image/ico" />
<link rel="stylesheet" type="text/css" href="/Public/resources/style/global.css">
<script src="//ajax.useso.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>
 

	<!-- 头部 -->
	
    <div class='navbar navbar-default' id='navbar'>
      <a class='navbar-brand' href='#'>
        <i class='icon-beer'></i>
        <?php echo C('SITE_NAME');?>管理平台
      </a>
      <ul class='nav navbar-nav pull-right'>
<!--         <li class='dropdown'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-envelope'></i>
            Messages
            <span class='badge'>5</span>
            <b class='caret'></b>
          </a>
          <ul class='dropdown-menu'>
            <li>
              <a href='#'>New message</a>
            </li>
            <li>
              <a href='#'>Inbox</a>
            </li>
            <li>
              <a href='#'>Outbox</a>
            </li>
            <li>
              <a href='#'>Trash</a>
            </li>
          </ul>
        </li> -->
        <li>
          <a href='/'>
            <i class='icon-signout'></i>
            返回主站
          </a>
        </li>
        <li class='dropdown user'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-user'></i>
            <strong>John DOE</strong>
            <b class='caret'></b>
          </a>
          <ul class='dropdown-menu'>
            <li>
              <a href='#'>Edit Profile</a>
            </li>
            <li class='divider'></li>
            <li>
              <a href="/">注销</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>

<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">提示</h4>
      </div>
      <div class="modal-body" id="msg-text">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>

	<!-- /头部 -->

	<div id='wrapper'>
		<!-- Sidebar -->
<section id='sidebar'>
  <i class='icon-align-justify icon-large' id='toggle'></i>
  <ul id='dock'>
    <li class='launcher' id="sb-dashboard">
      <i class='icon-dashboard'></i>
      <a href="<?php echo U('/Admin/Index');?>">概述</a>
    </li>
    <li class='launcher' id="sb-class">
      <i class='icon-sitemap'></i>
      <a href="<?php echo U('/Admin/Class');?>">班级</a>
    </li>
    <li class='launcher' id="sb-solicit">
      <i class='icon-money'></i>
      <a href="/tables.html">募捐</a>
    </li>
    <li class='launcher dropdown hover' id="sb-user">
      <i class='icon-user'></i>
      <a href='#'>用户</a>
      <ul class='dropdown-menu'>
        <li class='dropdown-header'>用户管理</li>
        <li>
          <a href='#'>用户列表</a>
        </li>
        <li>
          <a href='#'>权限管理</a>
        </li>
      </ul>
    </li>
    <li class='launcher dropdown hover' id="sb-work">
      <i class='icon-leaf'></i>
      <a href='#'>就业</a>
      <ul class='dropdown-menu'>
        <li class='dropdown-header'>就业服务管理</li>
        <li>
          <a href='#'>调查发起</a>
        </li>
        <li>
          <a href='#'>调查统计</a>
        </li>
      </ul>
    </li>
  </ul>
  <div data-toggle='tooltip' id='beaker' title='Made by Can'></div>
</section>
<!-- Tools -->
<section id='tools'>
  <ul class='breadcrumb' id='breadcrumb'>
    <li class='title'>管理平台</li>
    
  <li class='active'><a href="#">概述</a></li>

  </ul>
  

  
</section>
		<div id='content'>
			
<script type="text/javascript">$('#sb-dashboard').addClass('active')</script>
	<div class='panel panel-default'>
	  <div class='panel-heading'>
	    <i class='icon-beer icon-large'></i>
	    Hierapolis Rocks!
	    <div class='panel-tools'>
	      <div class='btn-group'>
	        <a class='btn' href='#'>
	          <i class='icon-refresh'></i>
	          Refresh statics
	        </a>
	        <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Toggle'>
	          <i class='icon-chevron-down'></i>
	        </a>
	      </div>
	    </div>
	  </div>
	  <div class='panel-body'>
	    <div class='page-header'>
	      <h4>System usage</h4>
	    </div>
	    <div class='progress'>
	      <div class='progress-bar progress-bar-success' style='width: 35%'></div>
	      <div class='progress-bar progress-bar-warning' style='width: 20%'></div>
	      <div class='progress-bar progress-bar-danger' style='width: 10%'></div>
	    </div>
	    <div class='page-header'>
	      <h4>User statics</h4>
	    </div>
	    <div class='row text-center'>
	      <div class='col-md-3'>
	        <input class='knob second' data-bgcolor='#d4ecfd' data-fgcolor='#30a1ec' data-height='140' data-inputcolor='#333' data-thickness='.3' data-width='140' type='text' value='50'>
	      </div>
	      <div class='col-md-3'>
	        <input class='knob second' data-bgcolor='#c4e9aa' data-fgcolor='#8ac368' data-height='140' data-inputcolor='#333' data-thickness='.3' data-width='140' type='text' value='75'>
	      </div>
	      <div class='col-md-3'>
	        <input class='knob second' data-bgcolor='#cef3f5' data-fgcolor='#5ba0a3' data-height='140' data-inputcolor='#333' data-thickness='.3' data-width='140' type='text' value='35'>
	      </div>
	      <div class='col-md-3'>
	        <input class='knob second' data-bgcolor='#f8d2e0' data-fgcolor='#b85e80' data-height='140' data-inputcolor='#333' data-thickness='.3' data-width='140' type='text' value='85'>
	      </div>
	    </div>
	  </div>
	</div>

		</div>
	</div>
	
	<!-- /主体 -->

	<!-- 底部 -->
	<footer>
    <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.useso.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdn.bootcss.com/jquery.form/3.51/jquery.form.min.js"></script>
    <script src="//cdn.bootcss.com/modernizr/2.6.3/modernizr.min.js" type="text/javascript"></script>
    <script src="/Public/resources/admin/javascripts/application-985b892b.js" type="text/javascript"></script>
    <script src="/Public/resources/script/global.js" type="text/javascript"></script>
    <!-- Google Analytics -->
    <script>
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</footer>
	<!-- /底部 -->
</div>
</body>
</html>