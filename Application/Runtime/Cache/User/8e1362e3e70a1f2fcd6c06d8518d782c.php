<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>登录 - <?php echo C('SITE_NAME');?></title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="/Public/resources/admin/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.bootcss.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/Public/resources/admin/images/favicon.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" type="text/css" href="/Public/resources/style/global.css">
  </head>
  <body class='login'>
    <div class='wrapper'>
      <div class='row'>
        <div class='col-lg-12'>
          <div class='brand text-center'>
            <h1>
              <div class='logo-icon login-logo'>
                <i class='icon-group'></i>
              </div>
              <?php echo C('SITE_NAME');?>
            </h1>
          </div>
        </div>
      </div>
      <div class='row'>
        <div class='col-lg-12'>
          <form id="form" method="post" action="<?php echo U('/User/Api/login');?>">
            <fieldset class='text-center'>
              <legend>登录到你的账户</legend>
              <div class='form-group'>
                <input class='form-control' placeholder='电子邮箱' name="email" type='text' required>
              </div>
              <div class='form-group'>
                <input class='form-control' placeholder='密码' name="password" type='password' required>
              </div>
              <div class='text-center'>
                <div class='checkbox'>
                  <label>
                    <input type='checkbox' checked="checked">
                    在这台电脑上记住我的账户
                  </label>
                </div>
                <button type="submit" class="btn btn-default btn-login" href="#" id="btn-login">登录</button>
                <br/>
                <label class="icon-remove label-error" id="label-error"> 密码错误</label>
                <br/>
                <a href="/forgot_password.html">忘记密码?</a>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.useso.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
    <script src="//ajax.useso.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdn.bootcss.com/modernizr/2.6.3/modernizr.min.js" type="text/javascript"></script>
    <script src="/Public/resources/admin/javascripts/application-985b892b.js" type="text/javascript"></script>
    <script src="//cdn.bootcss.com/jquery.form/3.51/jquery.form.min.js"></script>
    <!-- Google Analytics -->
    <script>
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));

      $(function(){
        $('#form').submit(function(e){
            if($(this)[0].checkValidity()) {
                    $(this).ajaxSubmit({
                        success:function(data){
                            var obj = JSON.parse(data);
                            if(obj['status']){
                                window.location.href = "/";
                            } else {
                                $('#label-error').text(' ' + obj['info']);
                                $('#label-error').show();
                            }
                        }
                    });
                }else document.forms[0].reportValidity();
            return false;
        });
      });
    </script>
  </body>
</html>