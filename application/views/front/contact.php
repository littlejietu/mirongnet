
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
              <li class="active">联系我们</li>
            </ol>                      
          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div> <!-- / .Topic Header -->    

      <div class="container">
        <div class="row">
		
          <div class="col-sm-8">
            <h3 class="first-child"><span>让我们保持联系</span></h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            <form role="form">
			  <div class="form-group">
                <label for="name">名称</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Your Name">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Your Mail">
              </div>              
              <div class="form-group">
                <label for="message">消息</label>
                <textarea class="form-control" rows="3" id="message" placeholder="Type Message"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">上传文件</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">附加文件.</p>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Send a copy to myself
                </label>
              </div>			  
              <a href="#" type="submit" class="btn-animate btn-style btn-d btn-primary">发送请求</a>
            </form>
          </div>
          <div class="col-sm-4">
            <h3 class="second-child"><span>取得联系</span></h3>
            <p>
              杭州江干区<br />
              下沙<br />
              电话: 92 026 365 2569<br />
              传真: 92 026 365 2570<br />
              Email: <a href="mailto:#">supportcenter@mail.com</a>
            </p>           
            
            <div class="maps">
              <div id="google-maps" class="map"></div>
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
 	<script>
    window.onload = function () {
        var latlng = new google.maps.LatLng(39.690281,-100.997314);
         var styles = [{
            stylers: [{
                hue: '#2babcf'
            }, {
                saturation: -20
            }]
        }];
        var myOptions = {
            zoom: 5,
            scrollwheel: false,
            center: latlng,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },
            navigationControl: true,
            navigationControlOptions: {
                style: google.maps.NavigationControlStyle.SMALL
            },
            styles: styles
        };
        map = new google.maps.Map(document.getElementById('google-maps'), myOptions);
        var marker = new google.maps.Marker({
          position: latlng,
          map: map,
          icon: 'img/logo/mapimg.jpg'
        });
    }
</script>
  </body>
</html>