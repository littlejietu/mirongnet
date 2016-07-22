
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>big city</title>
<?php echo _get_html_cssjs('admin_js','jquery.js,jquery.validation.min.js,admincp.js,jquery.cookie.js,common.js','js');?>
<link href="<?php echo _get_cfg_path('admin').TPL_ADMIN_NAME;?>css/skin_0.css" type="text/css" rel="stylesheet" id="cssfile" />
<?php echo _get_html_cssjs('admin_css','perfect-scrollbar.min.css','css');?>

<?php echo _get_html_cssjs('admin',TPL_ADMIN_NAME.'css/font-awesome.min.css','css');?>
<?php echo _get_html_cssjs('lib','uploadify/uploadify.css','css');?> <!!--添加图片的样式-->

<!--[if IE 7]>
  <?php echo _get_html_cssjs('admin',TPL_ADMIN_NAME.'css/font-awesome-ie7.min.css','css');?>
<![endif]-->
<?php echo _get_html_cssjs('admin_js','perfect-scrollbar.min.js','js');?>
<?php echo _get_html_cssjs('lib','kindeditor/kindeditor-min.js,kindeditor/lang/zh_CN.js','js');?>

</head>
<body>


<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
       <h3>页面管理</h3>
      <ul class="tab-base">
        
        <li><a href="<?php echo ADMIN_SITE_URL.'/page/';?>" ><span>页面列表<?php echo lang('adv_manage');?></span></a></li>
        <li><a href="<?php echo ADMIN_SITE_URL.'/page/add';?>" class="current"><span>添加页面</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
 <form id="adv_form" method="post" action="<?php echo ADMIN_SITE_URL.'/page/save'?>">
   
    
    
    <?php  if (isset($_GET['id'])){?>
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
    <?php }?>
    <table class="table tb-type2" id="main_table">
    
    
    
    
    <!--<table class="table tb-type2 nobdb">-->
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="page_title">标题:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php if (isset($_GET['id'])){ echo $info['title'];}?>" name="title" id="page_title" class="txt"></td>
          <td class="vatop tips">合作伙伴的名称</td>
        </tr>
        
        <tr>
          <td colspan="2" ><label>内容:</label></td>
        </tr>
        <tr class="noborder">
              <td class="vatop rowform">
                <textarea name="article_content" rows="6" class="tarea"><?php if (!empty($info)){echo $info['content'];}?></textarea>
              </td>
              <td class="vatop tips"></td>
        </tr>
        
        
        <tr>
            <td colspan="2" class="required"><label for="page_sort">状态:</label></td>
        </tr>
        <tr class="noborder">
          <td align="left" class="padL5" colspan="2">
              <input type="radio" name="status" value="1" <?php if( !empty($info['status']) && $info['status']==1 ) echo ' checked' ?> />显示
              <input type="radio" name="status" value="2" <?php if( !empty($info['status']) && $info['status']==2 ) echo ' checked' ?> />不显示
            </td>
        </tr>
      </tbody>   

      <tfoot>
        <tr class="tfoot">
          <td colspan="15" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo lang('nc_submit');?>提交</span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>





<?php echo _get_html_cssjs('lib','jquery-ui/themes/ui-lightness/jquery.ui.css','css');?>
<?php echo _get_html_cssjs('lib','jquery-ui/jquery.ui.js','js');?>

<script>
$(function(){

    getKindEditor_small('textarea[name="article_content"]');

});
</script>



<script>
//按钮先执行验证再提交表单
$(function(){$("#submitBtn").click(function(){
    if($("#adv_form").valid()){
     $("#adv_form").submit();
	}
	});
});
//
$(document).ready(function(){
	$('#adv_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
        	title : {
                required : true
            }
            
            
           
        },
        messages : {
        	title : {
                required : '111'
            },
        }
    });
});
</script>





</body>
</html>