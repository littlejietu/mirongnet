
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="ico/favicon.ico">

    <title>关于米荣 - 米荣科技 创新 效率 卓越</title>

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
              <li><a href="<?php echo base_url();?>">首页</a></li>
              <li class="active"><?php echo $nav['page_title']?></li>
            </ol>                      
          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div> <!-- / .Topic Header -->     

      <div class="container">

        <div class="row">
          <div class="col-sm-7">
            <h3 class="first-child"><span>杭州米荣科技有限公司</span></h3>
            <p>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;专注于App开发、微信开发等移动互联网相关领域，通过严格管理规范和专业化服务为客户提供优质的手机App研发服务。公司由多位移动互联网资深从业精英创立，多年的技术沉淀，丰富的行业经验打造了一支技术实力雄厚的开发团队，为合作伙伴提供优质的定制服务。
            </p>
            <a class="btn-animate btn-style btn-d btn-primary" href="<?php echo base_url()?>contact">联系我们</a>
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
        <div class="row">
          <div class="maxapps-develop-server">
            <div class="maxapps-develop-server-content">
              <div class="develop-server-left">
                <h1>我们的服务</h1>
                <img class="star_big" src="<?php echo _get_cfg_path('img');?>maxapps_09-10.png" alt=""><img class="star_little" src="<?php echo _get_cfg_path('img');?>maxapps_27.png" alt="">
                <p class="server-info">
                  我们提供专业的 APP 开发服务
                </p>
                <p class="server-info">
                  从前期的需求梳理到各类应用商城的软件上架
                </p>
                <p class="server-info">
                  提供一站式移动 APP 开发解决方案
                </p>
                <div class="server-icons">
                  <img src="<?php echo _get_cfg_path('img');?>maxapps-icons-1.png" alt=""><img src="<?php echo _get_cfg_path('img');?>maxapps-icons-2.png" alt=""><img src="<?php echo _get_cfg_path('img');?>maxapps-icons-3.png" alt=""><img src="<?php echo _get_cfg_path('img');?>maxapps-icons-4.png" alt=""><img src="<?php echo _get_cfg_path('img');?>maxapps-icons-5.png" alt="">
                </div>
              </div>
              <div class="develop-server-center">
                <ul>
                  <li class="develop-server-center-h">流程</li>
                  <li class="center-icons"><img src="<?php echo _get_cfg_path('img');?>maxapps_Process.png" alt=""></li>
                  <li class="center-icons"><img src="<?php echo _get_cfg_path('img');?>maxapps_Process.png" alt=""></li>
                  <li class="center-icons"><img src="<?php echo _get_cfg_path('img');?>maxapps_Process.png" alt=""></li>
                  <li class="center-icons"><img src="<?php echo _get_cfg_path('img');?>maxapps_Process.png" alt=""></li>
                  <li class="center-icons"><img src="<?php echo _get_cfg_path('img');?>maxapps_Process.png" alt=""></li>
                  <li class="center-icons"><img src="<?php echo _get_cfg_path('img');?>maxapps_Process.png" alt=""></li>
                  <li class="center-icons"><img src="<?php echo _get_cfg_path('img');?>maxapps_Process.png" alt=""></li>
                  <li class="center-icons"><img src="<?php echo _get_cfg_path('img');?>maxapps_Process.png" alt=""></li>
                </ul>
              </div>
              <div class="develop-server-right">
                <ul class="develop-server-right-icons">
                  <li><img src="<?php echo _get_cfg_path('img');?>maxapps_Process-1.png" alt="">
                  <div class="Process-info">
                    <h4><b>确认需求</b></h4>
                    <p>
                      有专案经理与您沟通整理 APP 功能需求
                    </p>
                  </div>
                  </li>
                  <li><img src="<?php echo _get_cfg_path('img');?>maxapps_Process-2.png" alt="">
                  <div class="Process-info">
                    <h4>报价签约</h4>
                    <p>
                      签署保密 NDA ,保证您的信息安全
                    </p>
                  </div>
                  </li>
                  <li><img src="<?php echo _get_cfg_path('img');?>maxapps_Process-3.png" alt="">
                  <div class="Process-info">
                    <h4>UI 设计</h4>
                    <p>
                      专业团队参与设计,修改到您满意为止
                    </p>
                  </div>
                  </li>
                  <li><img src="<?php echo _get_cfg_path('img');?>maxapps_Process-4.png" alt="">
                  <div class="Process-info">
                    <h4>软件开发</h4>
                    <p>
                      依据需求复杂程度开发 APP
                    </p>
                  </div>
                  </li>
                  <li><img src="<?php echo _get_cfg_path('img');?>maxapps_Process-5.png" alt="">
                  <div class="Process-info">
                    <h4>期中报告</h4>
                    <p>
                      项目进度汇报,让您实时掌握进度
                    </p>
                  </div>
                  </li>
                  <li><img src="<?php echo _get_cfg_path('img');?>maxapps_Process-6.png" alt="">
                  <div class="Process-info">
                    <h4>测试修正</h4>
                    <p>
                      正面、压力测试,保证 APP 正常使用
                    </p>
                  </div>
                  </li>
                  <li><img src="<?php echo _get_cfg_path('img');?>maxapps_Process-7.png" alt="">
                  <div class="Process-info">
                    <h4>结案阶段</h4>
                    <p>
                      交付客户产品及源码
                    </p>
                  </div>
                  </li>
                  <li><img src="<?php echo _get_cfg_path('img');?>maxapps_Process-8.png" alt="">
                  <div class="Process-info">
                    <h4>APP 上线</h4>
                    <p>
                      保障您的APP在苹果、安卓等市场上线
                    </p>
                  </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div> <!-- / .row -->

      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->

  <?php include("inc/footer.php");?>
    
  <?php //echo _get_html_cssjs('js','jquery-1.11.0.min.js,bootstrap.min.js,scrolltopcontrol.js,SmoothScroll.js,custom.js','js');?>

  </body>
</html>