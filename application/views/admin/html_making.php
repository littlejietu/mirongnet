<html>
<head>
<title>提示信息</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" /><base target='_self'/>
<style>div{line-height:160%;}</style></head>
<script type="text/javascript">
  var is_done=0;
  function JumpUrl(){
    if(is_done==0){ location="<?php echo ADMIN_SITE_URL;?>/html_page/make_nav?path=<?php echo $path?>&page=<?php echo $page+1;?>"; is_done=1; }
  }
</script>
<body leftmargin='0' topmargin='0' bgcolor='#FFFFFF'>
<center>
<div style='width:450px;padding:0px;border:1px solid #DADADA;'><div style='padding:6px;font-size:12px;border-bottom:1px solid #DADADA;background-color:#daf3fd'><b>提示信息！</b></div>
  <br />
  <div style='height:130px;font-size:10pt;background:#ffffff'><br />
    <div style='width:200;height:15;border:1px solid #898989;text-align:left'>
      <div style='width:<?php echo round($num/$total,2)*200;?>;height:15;background-color:#77cdf0'></div>
    </div>
    <br/>
    <?php if($num == $total):?>
      完成所有创建任务！生成文件：<?php echo $num?>个
    <?php else:?>
      本次用时：<?php echo round($second/60,2); ?>分，到达位置：<?php echo $num;?><br/>完成创建文件总数的：<?php echo round($num/$total*100,2);?> %，继续执行任务...
      <br /><a href="<?php echo ADMIN_SITE_URL;?>/html_page/make_nav?path=<?php echo $path?>&page=<?php echo $page+1;?>">如果你的浏览器没反应，请点击这里...</a><br/>
    <?php endif?>
  </div>
</div>
<?php if($num < $total):?>
<script>setTimeout('JumpUrl()',1000);</script>
<?php endif?>
</center>
</body>
</html>
