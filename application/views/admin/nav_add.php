
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
<?php echo _get_html_cssjs('lib','uploadify/uploadify.css','css');?>

<!--[if IE 7]>
  <?php echo _get_html_cssjs('admin',TPL_ADMIN_NAME.'css/font-awesome-ie7.min.css','css');?>
<![endif]-->
<?php echo _get_html_cssjs('admin_js','perfect-scrollbar.min.js','js');?>

</head>
<body>


<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
       <h3>导航</h3>
      <ul class="tab-base">
        
        <li><a href="<?php echo ADMIN_SITE_URL.'/nav/';?>" ><span>导航列表</span></a></li>
        <li><a href="<?php echo ADMIN_SITE_URL.'/nav/add';?>" class="current"><span><?php echo empty($info['id'])?'添加':'修改';?>导航</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
 <form id="form1" method="post" action="<?php echo ADMIN_SITE_URL.'/nav/save'?>">
    <input type="hidden" name="id" value="<?php echo empty($info['id'])?0:$info['id'];?>" />
    <table class="table tb-type2" id="main_table">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="txt_title">名称:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo !empty($info['name'])?$info['name']:'' ;?>" name="title" id="txt_title" class="txt"></td>
          <td class="vatop tips">合作伙伴的名称</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="txt_path">站内路径:</label></td>

        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo !empty($info['path'])?$info['path']:'';?>" name="path" id="txt_path" class="txt"></td>
          <td class="vatop tips">站内路径</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="txt_sort">排序:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo !empty($info['sort'])?$info['sort']:0 ;?>" name="sort" id="txt_sort" class="txt"></td>
          <td class="vatop tips">倒序，数字越大越靠前</td>
        </tr>
        <tr>
            <td colspan="2" class="required"><label>新窗口:</label></td>
        </tr>
        <tr class="noborder">
          <td align="left" class="padL5" colspan="2">
              <input type="radio" name="is_blank" value="1" <?php if( !empty($info['is_blank']) && $info['is_blank']==1 ) echo ' checked' ?> />弹出
              <input type="radio" name="is_blank" value="0" <?php if( empty($info['is_blank']) ) echo ' checked' ?> />不弹出
            </td>
        </tr>
        <tr>
            <td colspan="2" class="required"><label>状态:</label></td>
        </tr>
        <tr class="noborder">
          <td align="left" class="padL5" colspan="2">
              <input type="radio" name="status" value="1" <?php if( !empty($info['status']) && $info['status']==1 ) echo ' checked' ?> />审核通过
              <input type="radio" name="status" value="2" <?php if( !empty($info['status']) && $info['status']==2 ) echo ' checked' ?> />审核不通过
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

<script>
//按钮先执行验证再提交表单
$(function(){$("#submitBtn").click(function(){
    if($("#form1").valid()){
     $("#form1").submit();
	}
	});
});
//
$(document).ready(function(){
	$('#form1').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
        	title : {
                required : true
            },
            path : {
                required : true
            },
            sort : {
                required : true
            }
        },
        messages : {
        	title : {
                required : '请填写栏目标题'
            },
            path : {
                required : '请填写站内路径'
            },
            sort : {
                required : '请填写排序'
            }
        }
    });
});
</script>

</body>
</html>