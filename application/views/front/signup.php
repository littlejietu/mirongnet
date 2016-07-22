
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
              <li class="active">注册</li>
            </ol>                      
          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div> <!-- / .Topic Header -->      

      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="sign-form">
              <div class="sign-inner">
                <h3 class="first-child">创建新帐户</h3>
                <hr>
                <form role="form">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" placeholder="全名" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Enter your full name here." data-original-title="Name">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="username" placeholder="用户名" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Enter your nickname here." data-original-title="Username">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="电子邮件地址" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Enter a valid email here." data-original-title="Email">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6">
                        <input type="password" class="form-control margin-bottom-xs" id="password" placeholder="密码" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Enter a good password here." data-original-title="Password">
                      </div>
                      <div class="col-sm-6">
                        <input type="password" class="form-control" id="repeat-password" placeholder="重复密码" data-toggle="popover" data-trigger="focus" data-content="Confirm your password here." data-original-title="Repeat Password">
                      </div>
                    </div>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> 我同意 <a href="#">服务条款</a> 和 <a href="#">隐私权政策</a>
                    </label>
                  </div>
				  <a href="#" type="submit" class="btn-animate btn-style btn-d btn-primary">创建帐户</a>                  
                </form>
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

  <?php echo _get_html_cssjs('js','jquery-1.11.0.min.js,bootstrap.min.js,scrolltopcontrol.js,SmoothScroll.js,custom.js,sign-up.js','js');?>
  
  </body>
</html>