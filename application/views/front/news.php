
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
              <li><a href="<?php echo base_url();?>">首页</a></li>
              <li class="active"><?php echo $nav['page_title'];?></li>
            </ol>                      
          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div> <!-- / .Topic Header -->
      <div class="container">
        <div class="row">		  
          <div class="col-sm-9">
            <!-- Blog Post #1 -->
            <?php foreach($list['rows'] as $k => $v): ?>
            <div class="blog">
              <img src="<?php echo _get_cfg_path('img');?>avatar.jpg" alt="...">
              <div class="blog-desc">
                <h3>
                  <a href="<?php echo base_url();?>news/detail?id=<?php echo $v['id']?>"><?php echo $v['title']?></a>
                </h3>
                <hr>
                <p class="text-muted"><?php echo date('Y-m-d H:i',$v['addtime']); ?></p>
			           <a href=""><img class="img-responsive" src="<?php echo base_url().$v['pic'];?>" alt="..."></a>
                <p><?php echo $v['content'];?></p>
                <a class="btn-animate btn-style btn-d btn-primary" href="<?php echo base_url();?>news/detail?id=<?php echo $v['id']?>">阅读更多...</a>               
              </div>
            </div>
            <?php endforeach; ?>
            <!-- Pagination -->
            <ul class="pagination pull-right">
              <li><a href="#">&laquo;</a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&raquo;</a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
		      <div class="col-sm-3">
            <!-- Search -->
            <form role="form" method="post">              
              <div class="row">
                <div class="col-sm-12">
                  <div class="input-group">
                    <input type="text" class="form-control" name="txtKey" placeholder="搜索">
                    <span class="input-group-btn">					  
                      <button class="btn btn-style btn-k btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                  </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
              </div><!-- /.row -->              
            </form><br /><br />
            <!-- Categories -->			
		        <div class="panel-heading">
              <strong>资讯分类</strong>
            </div>    
            <div class="panel">              
              <div class="panel-body">
              <?php foreach($list_class as $k => $v): ?>
                <ul>
                  <li><a href="<?php echo base_url();?>news?class_id=<?php echo $v['id']?>"><?php echo $v['name'];?></a></li>
                </ul>
                <?php endforeach; ?>
              </div>
            </div>
			<!-- Accordion -->			
			      <!-- <div class="panel-heading">
              <strong>Accordion</strong>
			      </div>           
            <div class="panel-group" id="help-nav">
              <div class="panel">
                <div class="panel-heading blue">
                  <a data-toggle="collapse" data-parent="#help-nav" href="#help-nav-one">
                    Web Design
                  </a>
                </div>
                <div id="help-nav-one" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget turpis pulvinar, tempor odio sed, adipiscing dolor. Donec nisi velit, malesuada id dolor non, elementum auctor arcu.
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel">
                <div class="panel-heading blue">
                  <a data-toggle="collapse" data-parent="#help-nav" href="#help-nav-two" class="collapsed">
                    Management System
                  </a>
                </div>
                <div id="help-nav-two" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget turpis pulvinar, tempor odio sed, adipiscing dolor. Donec nisi velit, malesuada id dolor non, elementum auctor arcu.
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel">
                <div class="panel-heading blue">
                  <a data-toggle="collapse" data-parent="#help-nav" href="#help-nav-three" class="collapsed">
                    Web Development
                  </a>
                </div>
                <div id="help-nav-three" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget turpis pulvinar, tempor odio sed, adipiscing dolor. Donec nisi velit, malesuada id dolor non, elementum auctor arcu.
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel">
                <div class="panel-heading blue">
                  <a data-toggle="collapse" data-parent="#help-nav" href="#help-nav-four" class="collapsed">
                    E-Commerce
                  </a>
                </div>
                <div id="help-nav-four" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget turpis pulvinar, tempor odio sed, adipiscing dolor. Donec nisi velit, malesuada id dolor non, elementum auctor arcu.
                    </p>
                  </div>
                </div>
              </div>
              <div class="panel">
                <div class="panel-heading blue">
                  <a data-toggle="collapse" data-parent="#help-nav" href="#help-nav-five" class="collapsed">
                    User Setting
                  </a>
                </div>
                <div id="help-nav-five" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget turpis pulvinar, tempor odio sed, adipiscing dolor. Donec nisi velit, malesuada id dolor non, elementum auctor arcu.
                    </p>
                  </div>
                </div>
              </div>
            </div> -->
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
  </body>
</html>