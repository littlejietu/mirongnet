<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="ico/favicon.ico">

    <title>杭州米荣网络科技有限公司</title>
  
    <!-- Bootstrap core CSS -->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <?php echo _get_html_cssjs('css','style.css,font-awesome.min.css,animate.css,lightbox.css','css');?>
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

      <!-- Home Slider -->
      <div class="home-slider">
        <!-- Carousel -->
        <div id="home-slider" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#home-slider" data-slide-to="0" class="active"></li>
            <li data-target="#home-slider" data-slide-to="1"></li>
            <li data-target="#home-slider" data-slide-to="2"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <!-- Slide #1 -->
            <div class="item active" id="item-1">
              <div class="container">
                <div class="row">
                  <div class="col-sm-6">
                    <h1 class="first-child animated slideInDown delay-2"><strong><span class="text-blue">Powerful</span></strong> <small>Multipurpose Theme</small></h1> 
                    <h4 class="animated fadeInUpBig delay-4"><span>Built with Bootstrap 3x</span></h4>
                    <h4 class="animated fadeInUpBig delay-5"><span>20+ HTML Templates</span></h4>
					          <h4 class="animated fadeInUpBig delay-6"><span>Isotope Gallery</span></h4><br/>
                    <a class="btn-animate btn-style btn-lg btn-f btn-primary animated bounceInDown delay-6" href="#">Get Started Now!</a>
                  </div>
                  <div class="col-sm-6 hidden-xs">
                    <img class="img-responsive" src="<?php echo _get_cfg_path('img');?>showcase.png" alt="...">
                  </div>
                </div> <!-- / .row -->
              </div> <!-- / .container -->
            </div> <!-- / .item -->
            <!-- Slide #2 -->
            <div class="item" id="item-2">
              <div class="container">
                <div class="row">
				  <div class="col-sm-7 hidden-xs">
					<div class="boxshadow">
					  <!-- <div class="video-container">
						<iframe width="620" height="350" src="http://www.youtube.com/embed/JUkomDq73Bk" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>    
					  </div> -->
					</div>
                  </div>
                  <div class="col-sm-5">
				    <h1 class="first-child animated fadeInUpBig delay-2"><strong><span class="text-red">Responsive</span></strong> <small><span class="text-white">Video Support</span></small></h1> 
                    <ul class="string">
					  <li class="animated slideInDown delay-4"><span><strong>Excellent With Rooster</strong></span></li>
                      <li class="animated bounceInRight delay-6"><h2>Add You-tube Videos to your Slides easily</h2></li>                      
                    </ul>                    
                  </div>                  
                </div> <!-- / .row -->
              </div> <!-- / .container -->          
            </div> <!-- / .item -->
            <!-- Slide #3 -->
            <div class="item" id="item-3">
              <div class="container">
                <div class="row">
				          <div class="col-sm-6 hidden-xs">
                    <img class="img-responsive animated bounceInDown" src="<?php echo _get_cfg_path('img');?>people-1.png" alt="...">
                  </div>
                  <div class="col-sm-6">
                    <h1 class="first-child animated slideInRight delay-2">Introducing <strong><span class="text-blue">Beautiful</span></strong> <small>Featured</small></h1>                    
                    <ul>
                      <li class="animated slideInRight delay-4"><i class="fa fa-star"></i> Multi-Purpose Template</li>
                      <li class="animated slideInDown delay-4"><i class="fa fa-star"></i> Fully Responsive</li>
                      <li class="animated slideInRight delay-5"><i class="fa fa-star"></i> Easy to Customize</li>
					            <li class="animated slideInRight delay-6"><i class="fa fa-star"></i> Font Awesome Support</li>
                    </ul>                    
                  </div>                 
                </div> <!-- / .row -->
              </div> <!-- / .container -->            
            </div> <!-- / .item -->
          </div> <!-- / .carousel -->
          <!-- Controls -->
          <a class="carousel-arrow carousel-arrow-prev hidden-xs hidden-sm" href="#home-slider" data-slide="prev">
            <i class="fa fa-angle-left fa-2x"></i>
          </a>
          <a class="carousel-arrow carousel-arrow-next hidden-xs hidden-sm" href="#home-slider" data-slide="next">
            <i class="fa fa-angle-right fa-2x"></i>
          </a>
        </div>
      </div> <!-- / .home-slider -->	  

      <!-- Services -->
      <div class="home-services">
        <div class="container">
          <div class="row">
			<div class="col-md-12">
              <h2 class="lead">Bring goodness in your website</h2>
            </div>						
          </div> <!-- / .row -->
        </div> <!-- / .container -->		
   	  </div> <!-- / .services -->
	  
	  <!-- Divider Shadow -->
	  <div class="divider-shadow">
		<img src="<?php echo _get_cfg_path('img');?>divider-shadow1.png" alt="devider" class="responsive-img"/>
	  </div><!-- /.Divider Shadow -->

      <!-- Main Services -->
      <div class="main-services">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="services">
                <div class="service-item">
                  <span class="icon icon-1 icon-1c"><i class="fa fa-shield"></i></span>
                  <div class="service-desc">
                    <h4>安全支付解决方案</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>
              </div> <!-- / .services -->
            </div>
            <div class="col-sm-4">
              <div class="services">
                <div class="service-item">
                  <span class="icon icon-1 icon-1c"><i class="fa fa-refresh"></i></span>
                  <div class="service-desc">
                    <h4>提供退货政策</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>
              </div> <!-- / .services -->
            </div>
            <div class="col-sm-4">
              <div class="services">
                <div class="service-item">
                  <span class="icon icon-1 icon-1c"><i class="fa fa-plane"></i></span>
                  <div class="service-desc">
                    <h4>免费送货</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>
              </div> <!-- / .services -->
            </div>
          </div>
          <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
          <div class="row">
            <div class="col-sm-4">
              <div class="services">
                <div class="service-item">
                  <span class="icon icon-1 icon-1c"><i class="fa fa-rocket"></i></span>
                  <div class="service-desc">
                    <h4>在时钟支持</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>
              </div> <!-- / .services -->
            </div>
            <div class="col-sm-4">
              <div class="services">
                <div class="service-item">
                  <span class="icon icon-1 icon-1c"><i class="fa fa-truck"></i></span>
                  <div class="service-desc">
                    <h4>准时交货</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>
              </div> <!-- / .services -->
            </div>
            <div class="col-sm-4">
              <div class="services">
                <div class="service-item">
                  <span class="icon icon-1 icon-1c"><i class="fa fa-money"></i></span>
                  <div class="service-desc">
                    <h4>金钱担保</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>
              </div> <!-- / .services -->
            </div>
          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div> <!-- / .main-features -->
	  <!-- Responsive Showcase -->
      <div class="responsive-showcase">
        <div class="container">
          <div class="responsive-design">
            <div class="row">
             <div class="col-md-6 col-sm-6 col-xs-12">
                <h2>充分响应设计</h2>
                <p class="lead text-muted">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget turpis pulvinar, tempor odio sed, adipiscing dolor. Donec nisi velit, malesuada id dolor non, elementum auctor arcu. Cras consectetur sapien et purus posuere, ac amel hendrerit nunc luctus.
                </p>
                <ul class="col-md-12 col-sm-12 col-xs-12 list-inline">
                  <li><i class="fa fa-mobile text-blue inactive" data-device="#iphone"></i></li>
                  <li><i class="fa fa-tablet text-blue inactive" data-device="#ipad"></i></li>
                  <li><i class="fa fa-laptop text-blue" data-device="#laptop"></i></li>
                  <li><i class="fa fa-desktop text-blue inactive" data-device="#desktop"></i></li>
                </ul>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <img class="img-responsive show" src="<?php echo _get_cfg_path('img');?>laptop.png" alt="..." id="laptop">
                <img class="img-responsive hidden" src="<?php echo _get_cfg_path('img');?>desktop.png" alt="..." id="desktop">
                <img class="img-responsive hidden" src="<?php echo _get_cfg_path('img');?>ipad.png" alt="..." id="ipad">
                <img class="img-responsive hidden" src="<?php echo _get_cfg_path('img');?>iphone.png" alt="..." id="iphone">
              </div>
            </div> <!-- / .row -->
          </div> <!-- / .template-thumbnails -->
        </div> <!-- / .container -->
      </div> <!-- / .template-showcase -->
	  
	  <!-- Tag Banner -->
      <div class="responsive-tag-banner">
        <div class="container">
            <div class="row">
			  <div class="col-md-6 col-sm-6 col-xs-12">
                <img class="img-responsive show text-center" src="<?php echo _get_cfg_path('img');?>article-girl.png" alt="..." style="height:100%;width:100%">               
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <h2>米荣是你的网站一个很好的选择</h2>
                <p class="lead text-muted">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget turpis pulvinar, tempor odio sed, adipiscing dolor. Donec nisi velit, malesuada id dolor non, elementum auctor arcu. Cras consectetur sapien et purus posuere, ac amel hendrerit nunc luctus.
                </p>
				        <p class="lead text-muted">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget turpis pulvinar, tempor odio sed, adipiscing dolor. Donec nisi velit, malesuada id dolor non, elementum auctor arcu.
                </p>
				        <a class="btn-animate btn-style btn-d btn-primary" href="#">Learn more</a>
              </div>              
            </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div> <!-- / .Tag Banner -->     

      <!-- Feedback -->
      <div class="feedbacks">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h2 class="uline-title text-center">顾客在说什么?</h2>
            </div>
          </div> <!-- / .row -->
          <div class="row">			
			      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="feedback">
				        <img class="img-responsive" src="<?php echo _get_cfg_path('img');?>avatar.jpg" style="width:60px;height:60px;" alt="...">                
                <span><a href="#">John Smith</a></span>
				        <div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed magna vel velit dignissim luctus eu in urna.
                  </p>
                </div>
              </div>
            </div>
			      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="feedback">
				        <img class="img-responsive" src="<?php echo _get_cfg_path('img');?>avatar.jpg" style="width:60px;height:60px;" alt="...">                
                <span><a href="#">John Smith</a></span>
				        <div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed magna vel velit dignissim luctus eu in urna.
                  </p>
                </div>
              </div>
            </div>
			      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="feedback">
				        <img class="img-responsive" src="<?php echo _get_cfg_path('img');?>avatar.jpg" style="width:60px;height:60px;" alt="...">                
                <span><a href="#">John Smith</a></span>
				        <div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed magna vel velit dignissim luctus eu in urna.
                  </p>
                </div>
              </div>
            </div>
			     <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="feedback">
				        <img class="img-responsive" src="<?php echo _get_cfg_path('img');?>avatar.jpg" style="width:60px;height:60px;" alt="...">                
                <span><a href="#">John Smith</a></span>
				        <div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed magna vel velit dignissim luctus eu in urna.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="feedback">
				        <img class="img-responsive" src="<?php echo _get_cfg_path('img');?>avatar.jpg" style="width:60px;height:60px;" alt="...">                
                <span><a href="#">John Smith</a></span>
				      <div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed magna vel velit dignissim luctus eu in urna. Dapibus egestas tuerpis.
                  </p>
                </div>
              </div>
            </div>			
             <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="feedback">
                <img class="img-responsive" src="<?php echo _get_cfg_path('img');?>avatar.jpg" style="width:60px;height:60px;" alt="...">
                <span><a href="#">John Smith</a></span>
				      <div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed magna vel velit dignissim luctus eu in urna. Dapibus egestas tuerpis.
                  </p>
                </div>
              </div>
            </div>
             <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="feedback">
                <img class="img-responsive" src="<?php echo _get_cfg_path('img');?>avatar.jpg" style="width:60px;height:60px;" alt="...">
                <span><a href="#">John Smith</a></span>
				        <div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed magna vel velit dignissim luctus eu in urna. Dapibus egestas tuerpis.
                  </p>
                </div>
              </div>
            </div>            
          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div> <!-- / .feedback -->
  
      <!-- Call Action -->
	  <div class="call-actions">
	    <div class="container">
		  <div class="row">
            <div class="col-sm-12">
              <h2 class="uline-title text-center">你喜欢你所看到的吗?</h2>
            </div>
          </div> <!-- / .row -->
		  <div class="row">
		    <div class="call-action text-center">
		      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget turpis pulvinar, tempor odio sed, adipiscing dolor. Donec nisi velit, malesuada id dolor non, elementum auctor arcu. Cras consectetur sapien et purus posuere, ac amel hendrerit nunc luctus. Donec nisi velit, malesuada id dolor non, elementum auctor arcu. Cras consectetur sapien et purus posuere, ac amel hendrerit nunc luctus.</p>
              <br />
			  <a class="btn-animate btn-style btn-lg btn-e btn-primary" href="pricing-table.html">Purchase Now</a>
		    </div><br /><br /><br />
		  </div><!-- / .row -->
        </div><!-- / .container -->
	  </div><!-- / .Call Action -->
  
      <!-- 博客 -->
	  <div class="blog-posts">
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h2 class="uline-title text-center">博客</h2>
            </div>
          </div> <!-- / .row -->
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="blog">
                <img src="<?php echo _get_cfg_path('img');?>avatar.jpg" alt="...">
                <div class="blog-desc">
                  <h3>
                    <a href="blog-post.html">At vero eos et accu samus et iusto odio dignis simos ducimus qui bland itiis prae sentium voluptatum.</a>
                  </h3>
                  <hr>
                  <p class="text-muted">by John smith</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed magna vel velit dignissim luctus eu in urna. Dapibus egestas tuerpis.....</p>
                  <a class="btn-animate btn-style btn-d btn-primary" href="blog-post.html">Read More...</a>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="blog">
                <img src="<?php echo _get_cfg_path('img');?>avatar.jpg" alt="...">
                <div class="blog-desc">
                  <h3>
                    <a href="blog-post.html">At vero eos et accu samus et iusto odio dignis simos ducimus qui bland itiis prae sentium voluptatum.</a>
                  </h3>
                  <hr>
                  <p class="text-muted">by John smith</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed magna vel velit dignissim luctus eu in urna. Dapibus egestas tuerpis.....</p>
                  <a class="btn-animate btn-style btn-d btn-primary" href="blog-post.html">Read More...</a>
                </div>
              </div>
            </div>
			      <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="blog">
                <img src="<?php echo _get_cfg_path('img');?>avatar.jpg" alt="...">
                <div class="blog-desc">
                  <h3>
                    <a href="blog-post.html">At vero eos et accu samus et iusto odio dignis simos ducimus qui bland itiis prae sentium voluptatum.</a>
                  </h3>
                  <hr>
                  <p class="text-muted">by John smith</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed magna vel velit dignissim luctus eu in urna. Dapibus egestas tuerpis.....</p>
                  <a class="btn-animate btn-style btn-d btn-primary" href="blog-post.html">Read More...</a>
                </div>
              </div>
            </div>
          </div> <!-- / .row -->
		</div> <!-- / .container -->
	  </div> <!-- / .博客 -->
	  
    </div> <!-- / .wrapper -->

  <?php include("inc/footer.php");?>
  <?php echo _get_html_cssjs('js','jquery-1.11.0.min.js,bootstrap.min.js,scrolltopcontrol.js','js');?>
  <?php echo _get_html_cssjs('js','SmoothScroll.js,lightbox-2.6.min.js,custom.js,index.js','js');?>

  </body>
</html>