
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="ico/favicon.ico">

    <title>开发服务 - 米荣科技 创新 效率 卓越</title>

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
            <div class="col-sm-4">
              <div class="services">
                <div class="service-item" title="助力企业快速实现移动化战略布局">
                  <span class="icon icon-1 icon-1c" style="cursor:pointer" onclick="window.location.href='<?php echo base_url();?>service/ios'"><i class="fa fa-apple"></i></span>
                  <div class="service-desc">
                    <h4><b><a href="<?php echo get_html_url('service/ios');?>">iOS开发</a></b></h4>
                    <p>提供一站式的iOS手机APP定制开发服务</p>
                  </div>
                </div>
              </div> <!-- / .services -->
            </div>
            <div class="col-sm-4">
              <div class="services">
                <div class="service-item">
                  <span class="icon icon-1 icon-1c" style="cursor:pointer" onclick="window.location.href='<?php echo base_url();?>service/android'"><i class="fa fa-android"></i></span>
                  <div class="service-desc">
                    <h4><b><a href="<?php echo get_html_url('service/android');?>">Android开发</a></b></h4>
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
                    <h4><b><a href="<?php echo get_html_url('service/wx');?>">微信公众号开发</a></b></h4>
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
                    <h4><b><a href="<?php echo get_html_url('service/h5');?>">H5手机站开发</a></b></h4>
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
                    <h4><b><a href="<?php echo get_html_url('service/web');?>">Web网站开发</a></b></h4>
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
                    <h4><b><a href="<?php echo get_html_url('service/shop');?>">电商APP</a></b></h4>
                    <p>专业为您提供全模式的商城APP/电商APP解决方案</p>
                  </div>
                </div>
              </div> <!-- / .services -->
            </div>
          </div> <!-- / .row -->

        <div class="row">
          <div class="col-sm-12">            
            <div class="platform-wrap wrap">
                <div class="app-faq">
                    <div class="faq-wrap">
                        <h3 class="title">
                            <a>
                                APP软件开发常见问题
                            </a>
                        </h3>
                        <p class="title-sec">
                            FAQ
                        </p>
                        <ul>
                            <li>
                                <h3><span></span><a href="<?php echo base_url();?>news/detail?id=28" title="谁都能做app？别把app软件开发门槛想得太低">谁都能做app？别把app软件开发门槛想得太低</a></h3>
                                <p>随着app制作公司和app自助开发平台的增多，很多人都宣扬现在是“app开发无门槛”“人人都可以开发软件app”的年代。真的是谁都能做app吗？是不是只要有自己的想法就可以实现呢？NO！【米荣科技】小编提醒大家，不要把app软件开发的门槛想得太低了。</p>
                            </li>
                            <li>
                                <h3><span></span><a href="<?php echo base_url();?>news/detail?id=40" title="电商企业开发手机商城app注意点有哪些">电商企业开发手机商城app注意点有哪些</a></h3>
                                <p>移动互联时代随着智能终端快速发展，移动购物的便利性越来越突出，淘宝、京东、苏宁等主流电子商务营销逐渐从PC端延伸至移动端。</p>
                            </li>
                            <li>
                                <h3><span></span><a href="<?php echo base_url();?>news/detail?id=41" title="IOS APP推广渠道有哪些">IOS APP推广渠道有哪些</a></h3>
                                <p>我们已经开发了IOS APP应用软件了，但是不知道怎么去推广，现在想了解一下关于IOS App目前主流的推广渠道有那些，尝试一下自己去推广。</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="title-top">
                    <div class="title-con">
                        <h2>
                            5大主流软件开发平台&nbsp;
                            <span>
                                对比
                            </span>
                        </h2>
                        <p>
                            DEVELOPMENT PLATFORM
                        </p>
                    </div>
                    <p>
                    我们提供超过5种主流开发服务，iOS开发、android开发，微信开发、html5开发、商城开发。
                    </p>

                </div>
                <div class="platform-list">
                    <table>
                        <tbody>
                            <tr class="top">
                                <td class="first">
                                </td>
                                <td class="top-td ios">
                                    <img src="<?php echo _get_cfg_path('img');?>ios-icon.png">
                                    <p>
                                        iOS平台
                                    </p>
                                </td>
                                <td class="top-td android">
                                    <img src="<?php echo _get_cfg_path('img');?>android-icon.png">
                                    <p>
                                        Android平台
                                    </p>
                                </td>
                                <td class="top-td wp">
                                    <img src="<?php echo _get_cfg_path('img');?>wp-icon.png">
                                    <p>
                                        WP平台
                                    </p>
                                </td>
                                <td class="top-td phone">
                                    <img src="<?php echo _get_cfg_path('img');?>phone-icon.png">
                                    <p>
                                        手机Wap应用
                                    </p>
                                </td>
                                <td class="top-td pc">
                                    <img src="<?php echo _get_cfg_path('img');?>pc-icon.png">
                                    <p>
                                        PC Web 应用
                                    </p>
                                </td>
                            </tr>
                            <tr class="content-tr">
                                <td class="first one">
                                    开发语言
                                </td>
                                <td>
                                    object-c、swift
                                </td>
                                <td>
                                    JAVA、C++等
                                </td>
                                <td>
                                    C、C++、C#等
                                </td>
                                <td>
                                    HTML、HTML5、
                                    <br>
                                    CSS、JS、PHP、
                                    <br>
                                    Ruby、ASP等
                                </td>
                                <td class="last">
                                    HTML、HTML5、
                                    <br>
                                    CSS、JS、PHP、
                                    <br>
                                    Ruby、ASP等
                                </td>
                            </tr>
                            <tr class="content-tr sec">
                                <td class="first">
                                    安装包
                                    <br>
                                    文件格式
                                </td>
                                <td>
                                    .ipa
                                </td>
                                <td>
                                    .apk
                                </td>
                                <td>
                                    .xap
                                </td>
                                <td>
                                    \
                                </td>
                                <td class="last">
                                    \
                                </td>
                            </tr>
                            <tr class="content-tr three">
                                <td class="first">
                                    应用安装
                                </td>
                                <td>
                                    需要在客户端下载安装
                                </td>
                                <td>
                                    需要在客户端下载安装
                                </td>
                                <td>
                                    需要在客户端下载安装
                                </td>
                                <td>
                                    无需安装,用浏览器打
                                    <br>
                                    开
                                </td>
                                <td class="last">
                                    无需安装,用浏览器打
                                    <br>
                                    开
                                </td>
                            </tr>
                            <tr class="content-tr four">
                                <td class="first">
                                    应用升级
                                </td>
                                <td>
                                    需要在客户端下载升级
                                </td>
                                <td>
                                    需要在客户端下载升级
                                </td>
                                <td>
                                    需要在客户端下载升级
                                </td>
                                <td>
                                    在服务器端升级即可
                                </td>
                                <td class="last">
                                    在服务器端升级即可
                                </td>
                            </tr>
                            <tr class="content-tr five">
                                <td class="first">
                                    上架要求
                                </td>
                                <td>
                                    需要注册开发者账号并
                                    <br>
                                    支付年费
                                </td>
                                <td>
                                    可直接下载安装包安装
                                    <br>
                                    ，很多市场可免费上架
                                </td>
                                <td>
                                    需要注册开发者帐号并
                                    <br>
                                    支付费用
                                </td>
                                <td>
                                    \
                                </td>
                                <td class="last">
                                    \
                                </td>
                            </tr>
                            <tr class="content-tr six">
                                <td class="first">
                                    开发成本
                                </td>
                                <td>
                                    较高
                                </td>
                                <td>
                                    较高
                                </td>
                                <td>
                                    较高
                                </td>
                                <td>
                                    一般
                                </td>
                                <td class="last">
                                    一般
                                </td>
                            </tr>
                            <tr class="content-tr seven">
                                <td class="first">
                                    LBS功能
                                    <br>
                                    （GPS定位）
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td class="last">
                                    <img src="<?php echo _get_cfg_path('img');?>error-icon.png">
                                </td>
                            </tr>
                            <tr class="content-tr seven">
                                <td class="first">
                                    获取摄像头
                                    <br>
                                    （如拍照）
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td class="last">
                                    <img src="<?php echo _get_cfg_path('img');?>error-icon.png">
                                </td>
                            </tr>
                            <tr class="content-tr four">
                                <td class="first">
                                    播放FLASH
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>error-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td class="last">
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                            </tr>
                            <tr class="content-tr seven">
                                <td class="first">
                                    获取麦克
                                    <br>
                                    （录音功能）
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td class="last">
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                            </tr>
                            <tr class="content-tr eight">
                                <td class="first">
                                    重力感应（如
                                    <br>
                                    横屏切换，摇
                                    <br>
                                    一摇，赛车类
                                    <br>
                                    游戏等）
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td class="last">
                                    <img src="<?php echo _get_cfg_path('img');?>error-icon.png">
                                </td>
                            </tr>
                            <tr class="content-tr eight">
                                <td class="first">
                                    距离感应（如
                                    <br>
                                    手机通话时靠
                                    <br>
                                    近耳边自动关
                                    <br>
                                    闭屏幕）
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td class="last">
                                    <img src="<?php echo _get_cfg_path('img');?>error-icon.png">
                                </td>
                            </tr>
                            <tr class="content-tr four">
                                <td class="first">
                                    陀螺仪
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td class="last">
                                    <img src="<?php echo _get_cfg_path('img');?>error-icon.png">
                                </td>
                            </tr>
                            <tr class="content-tr eight">
                                <td class="first">
                                    磁力传感器（
                                    <br>
                                    如指南针，地
                                    <br>
                                    图方向等）
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td class="last">
                                    <img src="<?php echo _get_cfg_path('img');?>error-icon.png">
                                </td>
                            </tr>
                            <tr class="content-tr four">
                                <td class="first">
                                    图片压缩
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td class="last">
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                            </tr>
                            <tr class="content-tr four">
                                <td class="first">
                                    图片裁剪
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td class="last">
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                            </tr>
                            <tr class="content-tr nine">
                                <td class="first one">
                                    推送功能
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>true-icon.png">
                                </td>
                                <td>
                                    <img src="<?php echo _get_cfg_path('img');?>error-icon.png">
                                </td>
                                <td class="last">
                                    <img src="<?php echo _get_cfg_path('img');?>error-icon.png">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                
                
            </div>          
          </div>
        </div> <!-- / .row -->

        
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->

    <?php include("inc/footer.php");?>

  </body>
</html>