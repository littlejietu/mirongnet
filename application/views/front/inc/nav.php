
    <!-- Navigation -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">mirongnet</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">米荣网络</a>
        </div>
        <div class="collapse navbar-collapse">        
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown<?php if($nav['page']=='home') echo ' active'; ?>">
              <a href="<?php echo base_url();?>">首页</a>
            </li>
            <li class="dropdown <?php if($nav['page']=='service') echo ' active'; ?>">
              <a href="<?php echo base_url();?>service">APP开发服务</a>
            </li>
            <li class="dropdown<?php if($nav['page']=='solution') echo ' active'; ?>">
              <a href="<?php echo base_url();?>solution">APP解决方案</a>
            </li>
            <li class="dropdown<?php if($nav['page']=='cases') echo ' active'; ?>">
              <a href="<?php echo base_url();?>cases">APP开发案例</a>
            </li>
            <li class="dropdown<?php if($nav['page']=='news') echo ' active'; ?>">
              <a href="<?php echo base_url();?>news">APP开发资讯</a>
            </li>
            <li class="dropdown<?php if($nav['page']=='about') echo ' active'; ?>">
              <a href="<?php echo base_url();?>about">关于米荣</a>
            </li>
            <!-- Navbar Search -->
            <li class="hidden-xs" id="navbar-search">
              <a href="#">
                <i class="fa fa-search"></i>
              </a>
              <form role="form" method="post" action="<?php echo BASE_SITE_URL.'/news'?>">
              <div class="hidden" id="navbar-search-box">
                <div class="input-group">
                  <input type="text" class="form-control" name="txtKey" placeholder="搜索">
                  <span class="input-group-btn">
                    <button class="btn btn-style btn-k btn-primary" type="submit">Go!</button>
                  </span>
                </div>
              </div>
              </form>
              
            </li>
          </ul>
          <!-- Mobile Search -->
          <form class="navbar-form navbar-right visible-xs" role="search" action="<?php echo BASE_SITE_URL.'/news'?>">
            <div class="input-group">
              <input type="text" class="form-control" name="txtKey" placeholder="搜索">
              <span class="input-group-btn">
                <button class="btn btn-blue" type="submit">Go!</button>
              </span>
            </div>
          </form>          
        </div><!--/.nav-collapse -->
      </div>
    </div> <!-- / .navigation -->
  <span id="header_shadow" style="width: 100%; top: 30px;"></span>