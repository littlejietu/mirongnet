
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="ico/favicon.ico">

    <title>联系我们 - 米荣网络 创新 效率 卓越</title>

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
    <?php include("inc/nav.php");?>

    <!-- Wrapper -->
    <div class="wrapper">
	
	  <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">            
            <ol class="breadcrumb hidden-xs">
              <li><a href="/">首页</a></li>
              <li class="active">联系我们</li>
            </ol>                      
          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div> <!-- / .Topic Header -->    

      <div class="container">
        <div class="row">
		
          <div class="col-sm-8">
            <h3 class="first-child"><span>留言</span></h3>
            <p style="text-align:center">把您的需求告诉我们，我们为您创造商业价值，打造移动互联的未来。</p>
            
			        <div class="form-group">
                <label for="name">您的姓名</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="请填写您的姓名">
              </div>
              <div class="form-group">
                <label for="email">联系方式</label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="请填写您的手机/QQ/邮箱">
              </div>              
              <div class="form-group">
                <label for="message">需求/建议</label>
                <textarea class="form-control" rows="3" id="message" name="content" placeholder="请填写您的需求或建议"></textarea>
              </div>
             <!--  <div class="form-group">
                <label for="exampleInputFile">上传文件</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">附加文件.</p>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Send a copy to myself
                </label>
              </div> -->			  
              <a href="javascript:;" id="btnSumbit" type="submit" class="btn-animate btn-style btn-d btn-primary">提交留言</a>
            
          </div>
          <div class="col-sm-4">
            <h3 class="second-child"><span>联系我们</span></h3>
            <p>
              QQ: &nbsp;&nbsp;&nbsp;&nbsp;<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=3517172160&amp;site=qq&amp;menu=yes" target="_blank"><img border="0" title="点击这里给我发消息" alt="点击这里给我发消息" src="<?php echo _get_cfg_path('img');?>qq_online.gif" style=" vertical-align: middle;"></a><br />
              电话: 159 6885 0531<br />
            </p>  
            <p>
              杭州经济开发区<br />
            </p>           
            
            <!-- <div class="maps">
              <div id="google-maps" class="map"></div>
            </div>	 -->
            
          </div>
		  
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->

    <?php include("inc/footer.php");?>
  <?php //echo _get_html_cssjs('js','jquery-1.11.0.min.js,bootstrap.min.js,scrolltopcontrol.js,SmoothScroll.js,custom.js','js');?>
 	<script>
    $('#btnSumbit').on('click', function() {
      var parram = {name:$('#name').val(),contact:$('#contact').val(),content:$('#message').val()};
      var result = ajaxMain("<?php echo BASE_SITE_URL.'/contact/save'?>", parram);
      if(result==1){
        alert('提交成功，谢谢您的留言');
        window.location.href='<?php echo BASE_SITE_URL?>';
      }else
        alert('请填写留言');
    });
</script>
  </body>
</html>