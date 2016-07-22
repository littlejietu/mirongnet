<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="ico/favicon.ico">

    <title>Rooster - Multipurpose Business Theme</title>
  
    <!-- Bootstrap core CSS -->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <?php echo _get_html_cssjs('css','style.css,font-awesome.min.css,animate.css,lightbox.css,isotope.css','css');?>
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
              <li class="active">案例展示</li>
            </ol>                      
          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div> <!-- / .Topic Header -->

      <div class="container">
		<div class="row">          
			<!-- Categories -->             
			<ul class="project-filter" id="filters">
				<li><a href="#" data-filter="*">成功案例</a></li>
				<!-- <li><a href="#" data-filter=".animation">动画</a></li>
				<li><a href="#" data-filter=".video">视频</a></li>
				<li><a href="#" data-filter=".photography">摄影</a></li>
				<li><a href="#" data-filter=".webdesign">网页设计</a></li> -->
			</ul>              
		</div> <!-- / .row -->
	  </div> <!-- / .container -->
	  <div class="container">
          <div class="row" id="isotope-container">
          <?php if(!empty($list)): ?>
            <?php foreach ($list as $key => $a): ?>
              <div class="col-xs-12 col-sm-4 col-md-3 isotope-item animation">
                <div class="portfolio-item">
                  <div class="portfolio-thumbnail" alt="<?php echo $a['content'];?>">
                    <img class="img-responsive"  src="<?php echo $a['pic'];?>"  title="<?php echo $a['content'];?>">
                    <div class="mask">
                      <p>
                        <a href="<?php echo $a['pic'];?>" data-lightbox="template_showcase"><i class="fa fa-search fa-2x"></i></a>
                        <a href="<?php echo $a['url'];?>" target="_blank"><i class="fa fa-link fa-2x"></i></a>
                      </p>
                    </div>
                  </div>
                </div> <!-- / .portfolio-item -->
              </div>
              <?php endforeach; ?>
            <?php endif; ?>
    
          </div> <!-- / .row -->        
      </div> <!-- / .container -->
    </div> <!-- / .wrapper -->

    <!-- Footer -->
    <?php include("inc/footer.php");?>
    <?php echo _get_html_cssjs('js','jquery-1.11.0.min.js,bootstrap.min.js,scrolltopcontrol.js,SmoothScroll.js','js');?>
    <?php echo _get_html_cssjs('js','lightbox-2.6.min.js,jquery.isotope.js,custom.js,portfolio.js','js');?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <!--  <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scrolltopcontrol.js"></script>
	<script src="js/SmoothScroll.js"></script>
    <script src="js/lightbox-2.6.min.js"></script>
      <script src="js/jquery.isotope.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/portfolio.js"></script> -->
  </body>
</html>