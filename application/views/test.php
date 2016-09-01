<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>商家管理中心登录</title>
    <?php echo _get_html_cssjs('seller_js','jquery.js,jquery.validation.min.js','js');?>
    <?php echo _get_html_cssjs('seller_css','base.css,seller_center.css,font-awesome.min.css','css');?>
</head>
<body>
<div id="loginBG01" class="ncsc-login-bg">
    <p class="pngFix"></p>
</div>
<div id="loginBG02" class="ncsc-login-bg">
    <p class="pngFix"></p>
</div>
<div class="ncsc-login-container">
    
    <form id="form_login" action="/home/test2" method="post" >
        网址: <input type="text" name="url" style="width:300px" value="http://news.ifeng.com/listpage/11502/0/1/rtlist.shtml"><br />

        包含:<input type="text" name="include_path" style="width:300px" value="http://news.ifeng.com/a/"><br />
        不包含:<input type="text" name="not_include_path"><br />
        网址规则:<input type="text" name="rules" style="width:300px" value=".newsList li a" ><br /><br />
        
        <input type="submit" class="login-submit" value="获取">
        

    </form>
    
</div>
<br /><br />
<div class="ncsc-login-container">
    
    <form id="form_login" action="/home/test3" method="post" >
        网址: <input type="text" name="detail_url" style="width:300px" value="http://news.ifeng.com/a/20160831/49870211_0.shtml"><br />
        <!--正文规则:<input type="text" name="body_rule" style="width:300px" value="#artical">-->

        标题规则:<textarea name="title_rule" style="width:300px">.yc_main .yc_tit h1</textarea>
        过滤选项:<textarea name="title_filter" style="width:300px"></textarea><br />
        内容规则:<textarea name="content_rules" style="width:300px" >.yc_con_l .yc_con_txt</textarea>
        过滤选项:<textarea name="content_filter" style="width:300px">.yc_con_l .ifengLogo</textarea><br />
        时间规则:<textarea name="time_rules" style="width:300px">.yc_main .yc_tit p span</textarea>
        过滤选项:<textarea name="time_filter" style="width:300px"></textarea><br />
        来源规则:<textarea name="from_rules" style="width:300px">.yc_main .yc_tit a</textarea>
        过滤选项:<textarea name="from_filter" style="width:300px"></textarea><br />
        <br /><br /><br />

        导入时规则:<br />
        下载图片:<input type="radio" name="is_download_img" value="1">是 <input type="radio" name="is_download_img" value="2">否<br />
        图片水印:<input type="radio" name="is_watermark" value="1">是 <input type="radio" name="is_watermark" value="2">否<br />
        导入顺序:<input type="radio" name="is_import_order" value="1">与目标站相同 <input type="radio" name="is_import_order" value="2">与目标站相反<br />

        <input type="submit" class="login-submit" value="获取">
        

    </form>
    
</div>
</body>
</html>
