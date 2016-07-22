
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
       <h3>案例分类</h3>
      <ul class="tab-base">
        
        <li><a href="<?php echo ADMIN_SITE_URL.'/case_class/';?>" ><span>管理<?php echo lang('adv_manage');?></span></a></li>
        <li><a href="<?php echo ADMIN_SITE_URL.'/case_class/add';?>" class="current"><span>添加</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
 <form id="adv_form" method="post" action="<?php echo ADMIN_SITE_URL.'/case_class/save'?>">
   
    
    
    <?php  if (isset($_GET['id'])){?>
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
    <?php }?>
    <table class="table tb-type2" id="main_table">
    
    
    
    
    <!--<table class="table tb-type2 nobdb">-->
      <tbody>

        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="name">分类名:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php if (isset($_GET['id'])){ echo $info['name'];}?>" name="name" id="name" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        


        <!-- <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="case_class_title">标题:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php //if (isset($_GET['id'])){ echo $info['title'];}?>" name="title" id="case_class_title" class="txt"></td>
        </tr> -->

        

        
        <!-- <tr>
          <td colspan="2" ><label>内容:</label></td>
        </tr>
        <tr class="noborder">
              <td class="vatop rowform">
                <textarea name="article_content" rows="6" class="tarea"><?php //if (!empty($info)){echo $info['content'];}?></textarea>
              </td>
              <td class="vatop tips"></td>
        </tr> -->

        <!-- <tr>
          <td colspan="2" class="required"><label for="case_class_pic">图片:</label></td>
        </tr>

        <tr class="noborder">
          <td class="vatop rowform">
          
          
            <div class="upload_block">
              <span class="type-file-show"><img class="show_image" src="<?php //echo _get_cfg_path('admin_images');?>preview.png">
                <div class="type-file-preview"><img id="preview_img" src="<?php //if (isset($_GET['id'])) echo $info['pic'];?>" onload="javascript:DrawImage(this,500,500);"></div>
              </span>
              <div class="f_note">
                  <input type="hidden" name="img" id="img" value="<?php //if( !empty($info['img']) ) echo $info['img']; else echo ''; ?>">
                  <em><i class="icoPro16"></i></em>
                  <div class="file_but">
                      <input type="hidden" name="orig_img" value="<?php //if( !empty($info['pic']) ) echo $info['pic']?>"><input id="img_upload" name="img_upload" value="<?php //echo lang('adv_upload_img')?>" type="file" >
                  </div>
              </div>
            </div>
          </td>
          <td class="vatop tips"><?php //echo lang('adv_edit_support');?>gif,jpg,jpeg,png</td>
        </tr> -->

 

        <!-- <tr class="noborder">
          <td colspan="2" class="required"><label for="case_class_url">网址:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php //if (isset($_GET['id'])){ echo $info['url'];}else{echo 'http://';}?>" name="url" id="case_class_url" class="txt"></td>
        </tr> -->
        
        
        <tr>
            <td colspan="2" class="required"><label for="case_class_sort">状态:</label></td>
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
<script src="<?php echo _get_cfg_path('lib')?>uploadify/jquery.uploadify.min.js" type="text/javascript"></script>

<script type="text/javascript">
<?php $timestamp = time();?>
$(function() {
  upload_file('img','img','<?php echo $timestamp?>','<?php echo md5($this->config->item('encryption_key') . $timestamp );?>');
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
// $(document).ready(function(){
// 	$('#adv_form').validate({
//         errorPlacement: function(error, element){
// 			error.appendTo(element.parent().parent().prev().find('td:first'));
//         },
//         rules : {
//         	title : {
//                 required : true
//             }
            
            
           
//         },
//         messages : {
//         	title : {
//                 required : '111'
//             },
//         }
//     });
// });
</script>

<script type="text/javascript">
$(function(){
  var textButton="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />"
    $(textButton).insertBefore("#file_adv_pic");
    $("#file_adv_pic").change(function(){
  $("#textfield1").val($("#file_adv_pic").val());
    });
});
</script>



</body>
</html>