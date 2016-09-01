<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo C('site_name')?></title>
<?php echo _get_html_cssjs('admin_js','jquery.js,jquery.validation.min.js,admincp.js,jquery.cookie.js,common.js','js');?>
<link href="<?php echo _get_cfg_path('admin').TPL_ADMIN_NAME;?>css/skin_0.css" type="text/css" rel="stylesheet" id="cssfile" />
<?php echo _get_html_cssjs('admin_css','perfect-scrollbar.min.css','css');?>
<?php echo _get_html_cssjs('lib','uploadify/uploadify.css','css');?>

<?php echo _get_html_cssjs('admin',TPL_ADMIN_NAME.'css/font-awesome.min.css','css');?>

<!--[if IE 7]>
  <?php echo _get_html_cssjs('admin',TPL_ADMIN_NAME.'css/font-awesome-ie7.min.css','css');?>
<![endif]-->
<?php echo _get_html_cssjs('admin_js','perfect-scrollbar.min.js','js');?>

</head>
<body>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>更新栏目</h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span>更新栏目</span></a></li>
        <li><a href="<?php echo ADMIN_SITE_URL.'/html_page/news_list';?>"><span>更新文章列表</span></a></li>
        <li><a href="<?php echo ADMIN_SITE_URL.'/html_page/news_detail';?>"><span>更新文章详情</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" name="settingForm" id="settingForm" action="<?php echo ADMIN_SITE_URL.'/html_page/make_nav'?>" target="resultIframe">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td>选择栏目:</td>
          <td class="vatop rowform onoff">
            <select name="path">
              <option value="all">全部</option>
              <?php foreach($list as $v):?>
                <option value="<?php echo $v['path']?>"><?php echo $v['name']?></option>
              <?php endforeach;?>
            </select>
          </td>
          <td class="vatop tips"></td>
        </tr>

      </tbody>
      <tfoot>
        <tr>
          <td colspan="3" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo lang('nc_submit');?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
  <iframe name="resultIframe" src="" width="600" height="300" frameborder="0"></iframe>
</div>


<script src="<?php echo _get_cfg_path('lib')?>uploadify/jquery.uploadify.min.js" type="text/javascript"></script>


<script>

$(function(){$("#submitBtn").click(function(){
    if($("#settingForm").valid()){
     $("#settingForm").submit();
  }
  });
});
//
$(document).ready(function(){
  $("#settingForm").validate({
    errorPlacement: function(error, element){
      error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
        },
        messages : {
        }
  });
});
</script>
</body>
</html>