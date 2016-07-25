
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
    <?php include("inc/nav.php");?>

    <!-- Wrapper -->
    <div class="wrapper">
      
      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">            
            <ol class="breadcrumb hidden-xs">
              <li><a href="/">首页</a></li>
              <li class="active"><?php echo $nav['page_title'];?></li>
            </ol>                      
          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div> <!-- / .Topic Header -->     

      <div class="container">

        <div class="row">
          <div class="col-sm-7">
            <h3 class="first-child"><span>关于米荣公司</span></h3>
            <p>
              米荣科技公司 
              <br /><br />
              米荣科技公司
              <br /><br />
              米荣科技公司
              <br /><br />
            </p>
            <a class="btn-animate btn-style btn-d btn-primary" href="contact-us.html">联系我们</a>
            <br /><br />
          </div>
          <div class="col-sm-5">
            <div id="portfolio-slideshow" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="<?php echo _get_cfg_path('img');?>image1.jpg" class="img-responsive" alt="...">
                </div>
                <div class="item">
                  <img src="<?php echo _get_cfg_path('img');?>image2.jpg" class="img-responsive" alt="...">
                </div>
                <div class="item">
                  <img src="<?php echo _get_cfg_path('img');?>image3.jpg" class="img-responsive" alt="...">
                </div>                  
              </div>
              <!-- Controls -->
              <a class="carousel-arrow carousel-arrow-prev" href="#portfolio-slideshow" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="carousel-arrow carousel-arrow-next" href="#portfolio-slideshow" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
            </div>
          </div>
        </div> <!-- / .row -->
        <div class="row our-team-p">
          <div class="col-sm-12">
            <h3 class="headline"><span>我们的团队</span></h3>
            <div class="row">
              <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="team-member text-center">
                  <img class="img-responsive center-block" src="<?php echo _get_cfg_path('img');?>team/team1.jpg" alt="...">
                  <div class="info">
                    <h3><strong>John Doe</strong></h3>
                    <p class="text-muted">CEO / Founder</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed magna vel velit dignissim luctus eu in urna.</p>
                    <ul class="list-inline text-muted">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>           
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>               
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="#"><i class="fa fa-skype"></i></a></li>              
                    </ul>
                  </div>                  
                </div>
              </div>
              <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="team-member text-center">
                  <img class="img-responsive center-block" src="<?php echo _get_cfg_path('img');?>team/team2.jpg" alt="...">
                  <div class="info">
                    <h3><strong>Betty</strong></h3>
                    <p class="text-muted">Developer</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed magna vel velit dignissim luctus eu in urna.</p>
                    <ul class="list-inline">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>           
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>               
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="#"><i class="fa fa-skype"></i></a></li>              
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="team-member text-center">
                  <img class="img-responsive center-block" src="<?php echo _get_cfg_path('img');?>team/team3.jpg" alt="...">
                  <div class="info">
                    <h3><strong>Martin</strong></h3>
                    <p class="text-muted">Photographer</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed magna vel velit dignissim luctus eu in urna.</p>
                    <ul class="list-inline">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>           
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>               
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="#"><i class="fa fa-skype"></i></a></li>              
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="team-member text-center">
                  <img class="img-responsive center-block" src="<?php echo _get_cfg_path('img');?>team/team4.jpg" alt="...">
                  <div class="info">
                    <h3><strong>Alex</strong></h3>
                    <p class="text-muted">Web Designer</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed magna vel velit dignissim luctus eu in urna.</p>
                    <ul class="list-inline">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>           
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>               
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="#"><i class="fa fa-skype"></i></a></li>              
                    </ul>
                  </div>
                </div>
              </div>              
            </div> <!-- / .row -->
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


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scrolltopcontrol.js"></script>
    <script src="js/SmoothScroll.js"></script>
    <script src="js/custom.js"></script> -->
  </body>
</html>