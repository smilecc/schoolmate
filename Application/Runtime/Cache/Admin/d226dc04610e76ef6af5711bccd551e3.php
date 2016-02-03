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
          <a href='#'>
            <i class='icon-cog'></i>
            返回主站
          </a>
        </li>
        <li class='dropdown user'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-user'></i>
            <strong>John DOE</strong>
            <img class="img-rounded" src="http://placehold.it/20x20/ccc/777" />
            <b class='caret'></b>
          </a>
          <ul class='dropdown-menu'>
            <li>
              <a href='#'>Edit Profile</a>
            </li>
            <li class='divider'></li>
            <li>
              <a href="/">Sign out</a>
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
    
  <li class='active'><a href="#">班级</a></li>

  </ul>
  
<!-- <div id='toolbar'>
  <div class='btn-group'>
    <a class='btn' data-toggle='toolbar-tooltip' href='#' title='添加'>
      <i class='icon-building'></i>
    </a>
    <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Laptop'>
      <i class='icon-laptop'></i>
    </a>
    <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Calendar'>
      <i class='icon-calendar'></i>
      <span class='badge'>3</span>
    </a>
    <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Lemon'>
      <i class='icon-lemon'></i>
    </a>
  </div>
  <div class='label label-danger'>
    Danger
  </div>
  <div class='label label-info'>
    Info
  </div>
</div> -->

</section>
		<div id='content'>
			
<script type="text/javascript" src="/Public/resources/script/admin-class.js"></script>

<script type="text/javascript">
  var page = <?php echo ($page); ?>;

  $(function(){

  });
</script>

<!-- Create Class Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">创建班级</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="fm-addclass" method="post" action="<?php echo U('/Admin/Api/ClassCreate');?>">
          <div class="form-group">
            <label for="ipt-classname" class="col-sm-2 control-label">班级名</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="ipt-classname" name="name" placeholder="班级的名字">
            </div>
          </div>
          <div class="form-group">
            <label for="ipt-headmaster" class="col-sm-2 control-label">班主任</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="ipt-headmaster" name="headmaster" placeholder="班主任的名字">
            </div>
          </div>
          <div class="form-group">
            <label for="ipt-headmaster" class="col-sm-2 control-label">入学年份</label>
            <div class="col-sm-10">
              <select class="form-control" id="slt-attendandate" name="attendandate">
                <option value="-1">请选择...</option>
                <?php if(is_array($attendanlist)): foreach($attendanlist as $key=>$vo): ?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['attendan']); ?></option><?php endforeach; endif; ?>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" id="btn-add-submit">提交</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Class Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">提示</h4>
      </div>
      <div class="modal-body">
      是否删除该班级？
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-danger" id="btn-delete">确认</button>
      </div>
    </div>
  </div>
</div>

        <div class='panel panel-default grid'>
          <div class='panel-heading'>
            <i class='icon-table icon-large'></i>
            班级详情
            <div class='panel-tools'>
              <div class='btn-group'>
                <a class='btn' data-toggle="modal" data-target="#createModal">
                  <i class='icon-plus'> 创建班级</i>
                </a>
                <a class='btn' data-toggle='toolbar-tooltip' href='#' title='refresh' id="cls-reload">
                  <i class='icon-refresh'></i>
                </a>
              </div>
              <div class='badge'><span id="records"><?php echo ($clscount); ?></span> 条记录</div>
            </div>
          </div>
          <div class='panel-body filters'>
            <div class='row'>
              <div class='col-md-9'>
                在这里你可以对所有班级进行统一的管理。
              </div>
              <div class='col-md-3'>
                <div class='input-group'>
                  <input class='form-control' id="ipt-search" placeholder='搜索班级名或班主任...' type='text'>
                  <span class='input-group-btn'>
                    <button class='btn' type='button' id="btn-search">
                      <i class='icon-search'></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div id="class-list">
            <p style="margin: 20px">正在加载...</p>
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