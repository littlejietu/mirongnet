
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
		  <div class="col-sm-12">            
			<div class="product_bg">
                <div class="fields-display">
                    <div class="field online-shop">
                        <div class="text-show">
                            <div class="introduction">
                                <h3>电商</h3>
                                <p class="unit-word">行业解决方案</p>
                                <p class="englisth-corresponding"></p>
                            </div>
                            <ul class="categories">
                                <li title="店铺装修满足了店主对个性特色的额外追求，无需专业培训,简单方便的可视化编辑让店铺装修轻松易上手。">商铺展示</li>
                                <li title="快速帮助企业及个人快速构建O2O（线上到线下）服务体系">O2O服务</li>
                                <li title="汇集诸多客户运营需求与多年实际开发经验，米荣电商平台打造了一套目前业内最合理完善且安全可靠的购物交易流程。">在线交易</li>
                                <li title="建立良好的会员信息，积分奖励制度以及贴心安全的购物环境是增加用户与网站黏性的好方法。">会员体系</li>
                                <li title="合理的运营模式体现了一套电子商务平台的核心价值，从结算、统计、物流、地区等各方面反应了系统标准化与成熟度。">运营分析</li>
                                <li title="促销活动是电商网站吸引客户目光、激发购买欲望的方式，平台设立促销基本规则，店铺参与商品级、店铺级促销活动，最终获得多赢。">营销活动</li>
                            </ul>
                        </div>
                        <div class="img-decoration"></div>
                    </div>
                    <!-- <div class="field im">
                        <div class="text-show">
                            <div class="introduction">
                                <h3>社交</h3>
                                <p class="unit-word">行业解决方案</p>
                                <p class="englisth-corresponding"></p>
                            </div>
                            <ul class="categories">
                                <li>即时通讯</li>
                                <li>实时语音</li>
                                <li>社区论坛</li>
                                <li>视频互动</li>
                                <li>在线客服</li>
                                <li>社交圈</li>
                            </ul>
                        </div>
                        <div class="img-decoration"></div>
                    </div> -->
                    <div class="field service">
                        <div class="text-show">
                            <div class="introduction">
                                <h3>服务</h3>
                                <p class="unit-word">行业解决方案</p>
                                <p class="englisth-corresponding"></p>
                            </div>
                            <ul class="categories">
                                <li>在线预约时间</li>
                                <li>效果预览</li>
                                <li>咨询管理</li>
                                <li>社区交流平台</li>
                                <li>地图导航</li>
                                <li>会员管理</li>
                            </ul>
                        </div>
                        <div class="img-decoration"></div>
                    </div>
                    <div class="field edu">
                        <div class="text-show">
                            <div class="introduction">
                                <h3>教育</h3>
                                <p class="unit-word">行业解决方案</p>
                                <p class="englisth-corresponding"></p>
                            </div>
                            <ul class="categories">
                                <li>课程展示</li>
                                <li>线上课件</li>
                                <li>在线答题</li>
                                <li>预约上课</li>
                                <li>学生信息管理</li>
                                <li>音视频教学</li>
                            </ul>
                        </div>
                        <div class="img-decoration"></div>
                    </div>
                    <div class="field eat">
                        <div class="text-show">
                            <div class="introduction">
                                <h3>餐饮</h3>
                                <p class="unit-word">行业解决方案</p>
                                <p class="englisth-corresponding"></p>
                            </div>
                            <ul class="categories">
                                <li>餐厅介绍</li>
                                <li>用餐点评</li>
                                <li>美食展示</li>
                                <li>优惠推送</li>
                                <li>订位点餐</li>
                                <li>手机定位</li>
                            </ul>
                        </div>
                        <div class="img-decoration"></div>
                    </div>
                    <a name="ourmodules"></a>
                    <div class="field get-more">
                        <div class="get-more-tip">
                            <!-- 更多行业解决方案请注册获取 -->
                        </div>
                    </div>
                </div>
            </div>        
          </div>
        </div> <!-- / .row -->

		
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->

    <?php include("inc/footer.php");?>

  </body>
</html>