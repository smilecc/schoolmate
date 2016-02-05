<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<?php  ?>
<html>
<head>
	<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Bootstrap Styles-->
<link href="/Public/resources/home/css/bootstrap.css" rel="stylesheet" />
<!-- FontAwesome Styles-->
<link href="/Public/resources/home/css/font-awesome.css" rel="stylesheet" />
<!-- Morris Chart Styles-->
<link href="/Public/resources/home/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
<!-- Custom Styles-->
<link href="/Public/resources/home/css/custom-styles.css" rel="stylesheet" />
<!-- Google Fonts-->
<link href='http://fonts.useso.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<link href="/Public/resources/style/home.css" rel="stylesheet" />

<link href="/Public/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <link href="/Public/timer/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script src="/Public/resources/home/js/jquery-1.10.2.js"></script>
<link href="/Public/resources/home/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<title>班级通讯录 - <?php echo C('SITE_NAME');?></title>

</head>
<body>

		<div id="wrapper">
			<!-- 头部 -->
			
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
<header>
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">校友会</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">28% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                                            <span class="sr-only">28% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">85% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                            <span class="sr-only">85% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> 我的主页</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> 用户设置</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('/User/Api/logout');?>"><i class="fa fa-sign-out fa-fw"></i> 退出登录</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li id="li-class">
                        <a href="#"><i class="fa fa-users"></i> 我的班级<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo U('/Home/Class');?>">班级概述</a>
                            </li>
                            <li>
                                <a href="<?php echo U('/Home/Class/activity');?>">班级活动</a>
                            </li>
                            <li>
                                <a href="#">班级相册</a>
                            </li>
                            <li>
                                <a href="<?php echo U('/Home/Class/member');?>">班级通讯录</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="ui-elements.html"><i class="fa fa-desktop"></i> UI Elements</a>
                    </li>
          <li>
                        <a href="chart.html"><i class="fa fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tab-panel.html"><i class="fa fa-qrcode"></i> Tabs & Panels</a>
                    </li>
                    
                    <li>
                        <a href="table.html"><i class="fa fa-table"></i> Responsive Tables</a>
                    </li>
                    <li>
                        <a href="form.html"><i class="fa fa-edit"></i> Forms </a>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="empty.html"><i class="fa fa-fw fa-file"></i> Empty Page</a>
                    </li>
                </ul>

            </div>

        </nav>
</header>


			<!-- /头部 -->
	        <div id="page-wrapper">
	            <div id="page-inner">

	                <div class="row">
	                    <div class="col-md-12">
	                        <h1 class="page-header">
	                            班级通讯录 <small>我的同学们</small>
	                        </h1>
	                    </div>
	                </div>
	                <!-- /. ROW  -->
					
<script type="text/javascript">$('#li-class').addClass('active')</script>
<div class="panel panel-default">
    <div class="panel-heading">
         活动列表
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-activity">
                <thead>
                    <tr>
                        <th>姓名</th>
                        <th>性别</th>
                        <th>电话</th>
                        <th>邮箱</th>
                        <th>生日</th>
                    </tr>
                </thead>
                <tbody>
                	<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class="odd gradeX">
	                        <td><?php echo ($vo["realname"]); ?></td>
	                        <td>
                    			<?php switch($vo['sex']): case "1": ?>男<?php break;?>
	                        		<?php case "2": ?>女<?php break;?>
	                        	<?php default: ?>未填<?php endswitch;?>
	                        </td>
	                        <td><?php echo $vo['phone']==null?'未填':$vo['phone'];?></td>
	                        <td><?php echo $vo['email'];?></td>
	                        <td><?php echo $vo['birthday']=='0000-00-00 00:00:00'?'未填':substr($vo['birthday'],0,10);?></td>
	                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>

    <script src="//cdn.bootcss.com/datatables/1.10.10/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.bootcss.com/datatables/1.10.10/js/dataTables.bootstrap.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-activity').dataTable({
                	order: [[ 0, 'desc' ]],
				    language: {
					    "sProcessing":   "处理中...",
					    "sLengthMenu":   "显示 _MENU_ 项结果",
					    "sZeroRecords":  "没有匹配结果",
					    "sInfo":         "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
					    "sInfoEmpty":    "显示第 0 至 0 项结果，共 0 项",
					    "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
					    "sInfoPostFix":  "",
					    "sSearch":       "搜索 ",
					    "sUrl":          "",
					    "sEmptyTable":     "表中数据为空",
					    "sLoadingRecords": "载入中...",
					    "sInfoThousands":  ",",
					    "oPaginate": {
					        "sFirst":    "首页",
					        "sPrevious": "上页",
					        "sNext":     "下页",
					        "sLast":     "末页"
					    },
					    "oAria": {
					        "sSortAscending":  ": 以升序排列此列",
					        "sSortDescending": ": 以降序排列此列"
					    }
					}
				});
			});
    </script>

				</div>
			</div>
		</div>

	<!-- /主体 -->

	<!-- 底部 -->
	<!-- Bootstrap Js -->
<script src="/Public/resources/home/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="/Public/resources/home/js/jquery.metisMenu.js"></script>
<!-- Morris Chart Js -->
<script src="/Public/resources/home/js/morris/raphael-2.1.0.min.js"></script>
<script src="/Public/resources/home/js/morris/morris.js"></script>
<!-- Custom Js -->
<script src="/Public/resources/home/js/custom-scripts.js"></script>
<script src="/Public/resources/script/global.js"></script>
<script src="//cdn.bootcss.com/jquery.form/3.51/jquery.form.min.js"></script>
	<!-- /底部 -->
</div>
</body>
</html>