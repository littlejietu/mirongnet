
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="ico/favicon.ico">

    <title>服务 - 杭州米荣科技有限公司</title>

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

        <div class="row">
            <div class="pf_title_two">
                <h2>
                    PC网站开发
                    <span class="pf_plus">4</span>
                    大类
                </h2>
            </div>
            <div class="col-sm-7">
                <h3>电商/商城类网站制作</h3>
                <div class="line"></div><br/>
                <div class="activity-img">
                  电商网站就是企业、机构或者个人在互联网上建立的一个站点，是企业、机构或者个人开展电商的基础设施和信息平台，是实施电商的交互窗口，是从事电商的一种手段。用户可以在这个网站上进行选购商品。<br /><br />
                    代表性商城网站 ：<br />
                    京东、当当、唯品会、聚美优品
                </div>
            </div>
            <div class="col-sm-5">            
                <img src="<?php echo _get_cfg_path('img');?>p-pc02.png" width="300" alt="电商/商城类网站制作">         
            </div>
        </div>
        <br /><br />
        <div class="row">
            <div class="col-sm-5">

                <img src="<?php echo _get_cfg_path('img');?>p-pc03.png" width="300" alt="企业官网制作">
            </div>
            <div class="col-sm-7">            
                <h3>企业官网制作</h3>
                <div class="line"></div><br/>
                <div class="activity-img">  
                    
                        企业网站是企业在互联网上进行网络营销和形象宣传的平台，相当于企业的网络名片，不但对企业的形象是一个良好的宣传，同时可以辅助企业的销售，通过网络直接帮助企业实现产品的销售，企业可以利用网站来进行宣传、产品资讯发布、招聘等，网站制作应注重浏览者的视觉体验，加强客户服务，完善网络业务，吸引潜在客户关注。<br /><br />
                    代表性企业网站 ：<br />
                    联想官方网站，阿芙品牌官网，奔驰品牌官网
                    
                    </div>
            </div>
        </div>
        <br /><br />
        <div class="row">
            <div class="col-sm-7">
                <h3>社交网站制作</h3>
                <div class="line"></div><br/>
                <div class="activity-img">
                    全称Social Network Site，即“社交网站”或“社交网”。注意要与“社区网站”区分，两者有本质区别。社会性网络（Social
                        Networking）是指个人之间的关系网络，这种基于社会网络关系系统思想的网站就是社会性网络网站(SNS网站)。SNS的全称也可以是Social
                    Networking Services，即社会性网络服务，专指旨在帮助人们建立社会性网络的互联网应用服务。<br /><br />
                    代表性商城网站 ：<br />
                    人人网、开心网、QQ空间
                </div>
            </div>
            <div class="col-sm-5">            
                <img src="<?php echo _get_cfg_path('img');?>p-pc04.png" width="300" alt="社交网站制作">         
            </div>
        </div>
        <br /><br />
        <div class="row">
            <div class="col-sm-5">

                <img src="<?php echo _get_cfg_path('img');?>p-pc05.png" width="300" alt="行业门户网站">
            </div>
            <div class="col-sm-7">            
                <h3>行业门户网站</h3>
                <div class="line"></div><br/>
                <div class="activity-img">  
                    行业网站（Industry Web，Directindustry Web）即所谓行业门户。可以理解为“门+户+路”三者的集合体，即包含为更多行业企业设计服务的大门，丰富的资讯信息，以及强大的搜索引擎。
                    <br /><br />
                    代表性企业网站 ：<br />
                    企汇网、建材网、我的钢铁网
                    
                    </div>
            </div>
        </div><!-- / .row -->

		
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->

    <?php include("inc/footer.php");?>

  </body>
</html>