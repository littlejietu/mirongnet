
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="ico/favicon.ico">

    <title>Rooster - Multipurpose Business Theme</title>

    <!-- Bootstrap core CSS -->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
  
    <?php echo _get_html_cssjs('css','style.css,font-awesome.min.css,animate.css','css');?>
    <?php echo _get_html_cssjs('font','PT+Sans+Narrow/pt.css','css');?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <?php echo _get_html_cssjs('js','html5shiv.js,respond.min.js','js');?>
    <![endif]-->
  </head>

  <body>

   <?php include("inc/header.php");?>

    <!-- Wrapper -->
    <div class="wrapper">
	
	  <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">            
            <ol class="breadcrumb hidden-xs">
              <li><a href="/">首页</a></li>
              <li class="active">登录</li>
            </ol>                      
          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div> <!-- / .Topic Header -->      

      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="sign-form">
              <div class="sign-inner">
                <h3 class="first-child">登录</h3>
                <hr>
                <form role="form">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="email" class="form-control" id="email" placeholder="电子邮件地址" data-original-title="" title="">
                  </div>
                  <br />
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" placeholder="密码" data-original-title="" title="">
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> 记得我
                    </label>
                  </div>
				            <a href="#" type="submit" class="btn-animate btn-style btn-d btn-primary">提交</a>                  
                  <hr>
                </form>
                <p>没有注册? <a href="sign-up.html">创建一个帐户</a></p>
                <div class="pwd-lost">
                  <div class="pwd-lost-q show">丢失了你的密码? <a href="#">点击这里恢复</a></div>
                  <div class="pwd-lost-f hidden">
                    <p class="text-muted">请输入您的电子邮件地址，我们将给你一个链接来重置你的密码.</p>
                    <form class="form-inline" role="form">
                      <div class="form-group">
                        <label class="sr-only" for="email-pwd">Email address</label>
                        <input type="email" class="form-control" id="email-pwd" placeholder="输入你的邮件">						
                      </div>
					            <button type="submit" class="btn btn-style btn-k">发送</button>
                    </form>					
                  </div>
                </div> <!-- / .pwd-lost -->
              </div>
            </div>
          </div>
        </div> <!-- / .row -->      
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->

   <?php include("inc/footer.php");?>
	
	<!-- Copyright -->
	<div class="copyrights">
		<div class="container">
		  <div class="row">
			<div class="col-sm-12">
			  <div class="copyright">
				<small>Copyright &copy; 2015.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></small>
			  </div>
			</div>
		  </div> <!-- / .row -->
		</div> <!-- / .container --> 
	</div><!-- / .Copyright -->

  <?php echo _get_html_cssjs('js','jquery-1.11.0.min.js,bootstrap.min.js,scrolltopcontrol.js,SmoothScroll.js,custom.js','js');?>
   
  </body>
</html>