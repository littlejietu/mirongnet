
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="ico/favicon.ico">

    <title>服务 - 杭州米荣网络科技有限公司</title>

    <?php echo _get_html_cssjs('css','style.css,font-awesome.min.css,animate.css','css');?>
    <?php echo _get_html_cssjs('font','PT+Sans+Narrow/pt.css','css');?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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

        <div class="e-supplier-wrap wrap">
            <div class="e-supplier-title">
                <h1>
                    专业为您提供全模式的商城APP/电商APP解决方案
                </h1>
                <p>
                    PROFESSIONAL TO PROVIDE YOU FULL MODE MALL SOLUTIONS
                </p>
                <div class="title-line">
                </div>
            </div>

            <div class="e-supplier-content">
                <div class="e-supplie-list">
                    <ul class="clearfix">
                        <li class="left">
                            <div class="con-line">
                            </div>
                            <h3>
                                B2C商城APP开发
                            </h3>
                            <p>
                                B2C商城又称为单商模式，B2C商城的特点就是单一的企业/公司向个人销售产品。
                            </p>
                        </li>
                        <li class="right">
                            <div class="con-line">
                            </div>
                            <h3>
                                B2B2C APP商城开发
                            </h3>
                            <p>
                                B2B2C商城又称为多商模式，B2B2C商城就是平台方自己可以销售产品 ，同时也能引入商家销售。
                            </p>
                        </li>
                    </ul>
                    <ul>
                        <li class="left bottom">
                            <div class="con-line">
                            </div>
                            <h3>
                                
                                    B2B APP商城开发
                               
                            </h3>
                            <p>
                                B2B商城又称为批发商城，B2B电商模式，即为企业对企业的电子商务模式。
                            </p>
                        </li>
                        <li class="right bottom">
                            <div class="con-line">
                            </div>
                            <h3>
                                
                                    O2O商城APP开发

                            </h3>
                            <p>
                                O2O商城又称为本地社区商城，O2O即Online To Offline，Online2Offline模式（线上到线下，简称O2O），将线下商务的机会与互联网结合在一起，让互联网成为线下交易的前台。
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- / .row -->

		
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->

    <?php include("inc/footer.php");?>

  </body>
</html>