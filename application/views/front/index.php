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
                    <h1 class="first-child animated slideInDown delay-2"><strong><span class="text-blue">个性</span></strong> <small>定制</small></h1> 
                    <h4 class="animated fadeInUpBig delay-4"><span>微分销 3+3多级分佣</span></h4>
                    <h4 class="animated fadeInUpBig delay-5"><span>拼团,满减,红包,分享有礼..</span></h4>
					          <h4 class="animated fadeInUpBig delay-6"><span>360度运营朋友圈</span></h4><br/>
                    <a class="btn-animate btn-style btn-lg btn-f btn-primary animated bounceInDown delay-6" href="<?php echo base_url();?>contact" title="微分销 3+3多级分佣,拼团,满减,红包,分享有礼,360度运营朋友圈">马上了解!</a>
                  </div>
                  <div class="col-sm-6 hidden-xs">
                    <img class="img-responsive" src="<?php echo _get_cfg_path('img');?>showcase.png" alt="...">
                  </div>
                </div> <!-- / .row -->
              </div> <!-- / .container -->
            </div> <!-- / .item -->
            <!-- Slide #2 -->
            <div class="item" id="item-2" style="cursor:pointer;" onclick="window.location.href='<?php echo base_url();?>service';">
              <div class="container">
                <div class="row">
                <!--
        				  <div class="col-sm-7 hidden-xs">
          					<div class="boxshadow">
          					   <div class="video-container">
          						<iframe width="620" height="350" src="http://www.youtube.com/embed/JUkomDq73Bk" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>    
          					  </div>
          					</div>
                  </div>
                  <div class="col-sm-5">
          				    <h1 class="first-child animated fadeInUpBig delay-2"><strong><span class="text-red">Responsive</span></strong> <small><span class="text-white">Video Support</span></small></h1> 
                      <ul class="string">
          					     <li class="animated slideInDown delay-4"><span><strong>Excellent With Rooster</strong></span></li>
                                <li class="animated bounceInRight delay-6"><h2>Add You-tube Videos to your Slides easily</h2></li>                      
                      </ul>                   
                  </div>  -->                  
                </div> <!-- / .row -->
              </div> <!-- / .container -->          
            </div> <!-- / .item -->
            <!-- Slide #3 -->
            <div class="item" id="item-3" style="background: #352f44;">
              <div class="container">
                <div class="row">
				          <div class="col-sm-6 hidden-xs">
                    <img class="img-responsive animated bounceInDown" src="<?php echo _get_cfg_path('img');?>people-1.png" alt="...">
                  </div>
                  <div class="col-sm-6">
                    <h1 class="first-child animated slideInRight delay-2">微信 <strong><span class="text-blue">公众号</span></strong> <small>开发</small></h1>                    
                    <ul>
                      <li class="animated slideInRight delay-4"><i class="fa fa-star"></i> 微商城 + 微分销</li>
                      <li class="animated slideInDown delay-4"><i class="fa fa-star"></i> 微营销, 微会员 </li>
                      <li class="animated slideInRight delay-5"><i class="fa fa-star"></i> 微调研, 微支付</li>
					            <li class="animated slideInRight delay-6"><i class="fa fa-star"></i> 抽奖、红包、大转盘、投票、刮刮乐、砸金蛋..</li>
                    </ul>
                    <a class="btn-animate btn-style btn-lg btn-f btn-primary animated bounceInDown delay-6" href="<?php echo base_url();?>service/wx" title="微商城 微分销 微营销 微会员 微调研 微支付 抽奖 红包 大转盘 投票活动 刮刮乐 砸金蛋">更多&gt;&gt;</a>                 
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
              <h2 class="lead">创新 效率 卓越</h2>
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
                <div class="service-item" title="助力企业快速实现移动化战略布局">
                  <span class="icon icon-1 icon-1c" style="cursor:pointer" onclick="window.location.href='<?php echo base_url();?>service/ios'"><i class="fa fa-apple"></i></span>
                  <div class="service-desc">
                    <h4><b><a href="<?php echo base_url();?>service/ios">IOS开发</a></b></h4>
                    <p>提供一站式的IOS手机APP定制开发服务</p>
                  </div>
                </div>
              </div> <!-- / .services -->
            </div>
            <div class="col-sm-4">
              <div class="services">
                <div class="service-item">
                  <span class="icon icon-1 icon-1c" style="cursor:pointer" onclick="window.location.href='<?php echo base_url();?>service/android'"><i class="fa fa-android"></i></span>
                  <div class="service-desc">
                    <h4><b><a href="<?php echo base_url();?>service/android">Android开发</a></b></h4>
                    <p>用户量最多的移动OS，推广相对容易，系统开放性高</p>
                  </div>
                </div>
              </div> <!-- / .services -->
            </div>
            <div class="col-sm-4">
              <div class="services">
                <div class="service-item">
                  <span class="icon icon-1 icon-1c" style="cursor:pointer" onclick="window.location.href='<?php echo base_url();?>service/wx'"><i class="fa fa-comments-o"></i></span>
                  <div class="service-desc">
                    <h4><b><a href="<?php echo base_url();?>service/wx">微信公众号开发</a></b></h4>
                    <p>微商城，微分销系统，微官网，微营销，微会员，微支付等开发</p>
                  </div>
                </div>
              </div> <!-- / .services -->
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="services">
                <div class="service-item">
                  <span class="icon icon-1 icon-1c" style="cursor:pointer" onclick="window.location.href='<?php echo base_url();?>service/h5'"><i class="fa fa-tablet"></i></span>
                  <div class="service-desc">
                    <h4><b><a href="<?php echo base_url();?>service/h5">H5手机站开发</a></b></h4>
                    <p>移动体验好，推广成本低，建站速度快，建站成本低</p>
                  </div>
                </div>
              </div> <!-- / .services -->
            </div>
            <div class="col-sm-4">
              <div class="services">
                <div class="service-item">
                  <span class="icon icon-1 icon-1c" style="cursor:pointer" onclick="window.location.href='<?php echo base_url();?>service/web'"><i class="fa fa-desktop"></i></span>
                  <div class="service-desc">
                    <h4><b><a href="<?php echo base_url();?>service/web">Web网站开发</a></b></h4>
                    <p>电商/商城类，企业官网，社交，社区网站制作</p>
                  </div>
                </div>
              </div> <!-- / .services -->
            </div>
            <div class="col-sm-4">
              <div class="services">
                <div class="service-item">
                  <span class="icon icon-1 icon-1c" style="cursor:pointer" onclick="window.location.href='<?php echo base_url();?>service/shop'"><i class="fa fa-laptop"></i></span>
                  <div class="service-desc">
                    <h4><b><a href="<?php echo base_url();?>service/shop">电商APP</a></b></h4>
                    <p>专业为您提供全模式的商城APP/电商APP解决方案</p>
                  </div>
                </div>
              </div> <!-- / .services -->
            </div>
          </div>
         

        </div> <!-- / .container -->
      </div> <!-- / .main-features -->
	  <!-- Responsive Showcase -->
      <div class="responsive-showcase">
        <div class="container">
          <div class="responsive-design">
            <div class="row">
             <div class="col-md-6 col-sm-6 col-xs-12">
                <h2>全网营销平台</h2>
                <p class="lead text-muted">
                  帮助企业快速构建与移动互联网用户的全网营销平台: <br />20+营销模块灵活组合，个性化配置，App + 微信商城 + PC网站
                  打通淘宝、京东等平台，一站式管理全网营销</p>
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
                <img class="img-responsive show text-center" src="<?php echo _get_cfg_path('img');?>shop_net.png" alt="..." width="350">               
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <h2>米荣商城有哪些功能 ？</h2>
                <p class="lead text-muted">
               门店自提&nbsp;&nbsp;&nbsp;&nbsp;线下自提站<br />
频道专题&nbsp;&nbsp;&nbsp;&nbsp;在线客服<br />
平台结算&nbsp;&nbsp;&nbsp;&nbsp;预存款充值卡 <br />
微信登录、支付&nbsp;&nbsp;&nbsp;&nbsp;平台红包<br />
商品SKU&nbsp;&nbsp;&nbsp;&nbsp;店铺装修<br />
售卖区域&nbsp;&nbsp;&nbsp;&nbsp;晒单分享&nbsp;&nbsp;&nbsp;&nbsp;移动端应用<br />
<br />


                </p>
				        
				        <a class="btn-animate btn-style btn-d btn-primary" href="<?php echo base_url()?>contact">了解更多</a>
              </div>              
            </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div> <!-- / .Tag Banner -->     

      
  
      <!-- Call Action -->
	  <div class="call-actions">
	    <div class="container">
		  <div class="row">
        <div class="col-sm-12">
          <div class="platform-wrap wrap">
            <div class="app-faq">
                <div class="faq-wrap">
                  <h2 class="uline-title text-center">APP软件开发常见问题</h2>
                    <p class="title-sec">
                        FAQ
                    </p>
                    <ul>
                        <li>
                            <h3><span></span><a href="http://www.sunnsoft.com/faq-661.html" title="谁都能做app？别把app软件开发门槛想得太低">开发一个app多少钱</a></h3>
                            <p>关于“APP开发需要多少钱”的问题，已经是一个热门的话题来的了，很多需要开发app的用户都很想知道关于开发一款app需要多少钱，今天商侣小编就给大家详细的介绍一下关于手机app开发费用方面的问题。</p>
                        </li>
                        <li>
                            <h3><span></span><a href="http://www.sunnsoft.com/faq-634.html" title="如何建设一个好的网站">如何建设一个好的网站</a></h3>
                            <p>网站建设是一项复杂的工程，一个好的网站自建设过程中还要有一定的方法才能将其制作成一个好的网站，有着多年经验的广州商侣软件开发公司给大家简单地总结出如何建设一个好的网站。</p>
                        </li>
                        <li>
                            <h3><span></span><a href="http://www.sunnsoft.com/faq-635.html" title="网页设计和网站建设的区别是什么">网页设计和网站建设的区别是什么</a></h3>
                            <p>一般情况下很多人都觉得网页设计和网站建设是同一个内容，其实在字面上理解我们也会发现网页设计就是对我们平时打开的页面进行设计，其具体包括对页面的文字、声音、图片、视频动画等元素进行设计美化的一项工作。</p>
                        </li>
                    </ul>
                </div>
            </div>
          </div>

        </div>
        <!-- <div class="col-sm-6">
          <h2 class="uline-title text-center">最新点评</h2>
                    <p class=" title-sec">
                        COMMENT
                    </p>

        </div> -->
		  </div><!-- / .row -->
      </div><!-- / .container -->
	  </div><!-- / .Call Action -->
  
      <!-- 资讯 -->
	  <div class="blog-posts">
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h2 class="uline-title text-center">最新资讯</h2>
            </div>
          </div> <!-- / .row -->
          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
              <div class="blog-list blog-desc">
                <ul>
                <?php foreach($list['rows'] as $k => $v): ?>
                  <li><a href="<?php echo base_url();?>news/detail?id=<?php echo $v['id']?>"><?php echo $v['title']?></a></li>
                <?php endforeach; ?>
                </ul>
              </div>
            </div>
            <div class="col-sm-2"></div>

          </div> <!-- / .row -->
		</div> <!-- / .container -->
	  </div> <!-- / .博客 -->
	  
    </div> <!-- / .wrapper -->

  <?php include("inc/footer.php");?>
  <?php echo _get_html_cssjs('js','jquery-1.11.0.min.js,bootstrap.min.js,scrolltopcontrol.js','js');?>
  <?php echo _get_html_cssjs('js','SmoothScroll.js,lightbox-2.6.min.js,custom.js,index.js','js');?>

  </body>
</html>