<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>big city</title>
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
      <h3>分类管理</h3>
      <ul class="tab-base">
        <li><a href="<?php echo ADMIN_SITE_URL.'/first_category';?>"><span>分类列表</span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php  if (isset($_GET['id'])){echo '编辑分类';}else{echo '新增分类';}?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="adv_form" method="post" action="<?php echo ADMIN_SITE_URL.'/first_category/save'?>">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="list_url"  value="<?php echo $list_url;?>" />
    <input type="hidden" name="id" value="<?php echo !empty($id)?$id:'' ?>" />
    <table class="table tb-type2" id="main_table">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="adv_name">分类别名:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="adv_name" id="adv_name" class="txt" value="<?php  if (!empty($info['name'])){echo $info['name'];}?>"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="ap_id">选择分类:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <select name="category_id" id="category_id">
              <option value="0">分类</option>
              <?php foreach ($catalist as $k => $v):?>
              <option value="<?=$v['id']?>" <?php echo (!empty($info['category_id']) && $v['id'] == $info['category_id'])?'selected="selected"':'' ?>><?=$v['name']?></option>
              <?php endforeach?>
            </select>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
        <tr>
          <td colspan="2" class="required"><label for="icon_touch">选中时的图标:</label></td>
        </tr>
        <tr class="noborder">
        <td class="vatop rowform">
            <div class="upload_block">
              <span class="type-file-show"><img class="show_image" src="<?php echo _get_cfg_path('admin_images');?>preview.png">
                <div class="type-file-preview"><img id="preview_icon_touch" src="<?php  if (!empty($info['icon_touch'])){echo '/'.$info['icon_touch'];}?>" onload="javascript:DrawImage(this,500,500);"></div>
              </span>
              <div class="f_note">
                  <input type="hidden"  name="icon_touch" id="icon_touch" value="<?php  if (!empty($info['icon_touch'])){echo $info['icon_touch'];}?>">
                  <em><i class="icoPro16"></i></em>
                  <div class="file_but">
                        <input id="icon_touch_upload" name="icon_touch_upload" value="<?php echo lang('adv_upload_img')?>" type="file" >
                  </div>
              </div>
            </div>
          </td>
          <td class="vatop tips"><span class="vatop rowform">图片最佳显示尺寸为43*43像素，png格式</span></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="icon_untouch">未选中时的图标:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <div class="upload_block">
              <span class="type-file-show"><img class="show_image" src="<?php echo _get_cfg_path('admin_images');?>preview.png">
                <div class="type-file-preview"><img id="preview_icon_untouch" src="<?php  if (!empty($info['icon_untouch'])){echo '/'.$info['icon_untouch'];}?>" onload="javascript:DrawImage(this,500,500);"></div>
              </span>
              <div class="f_note">
                  <input type="hidden"  name="icon_untouch" id="icon_untouch" value="<?php  if (!empty($info['icon_untouch'])){echo $info['icon_untouch'];}?>">
                  <em><i class="icoPro16"></i></em>
                  <div class="file_but">
                        <input id="icon_untouch_upload" name="icon_untouch_upload" value="<?php echo lang('adv_upload_img')?>" type="file" >
                  </div>
              </div>
            </div>
          </td>
          <td class="vatop tips"><span class="vatop rowform">图片最佳显示尺寸为43*43像素，png格式</span></td>
        </tr>
      <tbody id="adv_sort">
        <tr>
          <td colspan="2" class="required"><label for="type_content">分类排序: </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform" ><input type="text" name="sort" value="<?php  if (!empty($info['sort'])){ echo $info['sort'];}?>" />
          <td class="vatop tips">0-255 数值较小的排在前面</td>
        </tr>
      </tbody>
        <tbody id="title_status">
        <tr>
          <td colspan="2" class="required"><label for="status">分类状态: </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="radio" name="status"  id="type_status" value="1" <?php if (isset($info['status']) && $info['status'] == 1){?>checked="checked"<?php }?>>启用　<input type="radio" name="status"  id="type_status" value="2" <?php if (isset($info['status']) && $info['status'] == 2){?>checked="checked"<?php }?>>禁用</td>
          <td class="vatop tips"></td>
        </tr>
      </tbody> 
      <tfoot>
        <tr class="tfoot">
          <td colspan="15" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo lang('nc_submit');?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<?php echo _get_html_cssjs('lib','jquery-ui/themes/ui-lightness/jquery.ui.css','css');?>
<?php echo _get_html_cssjs('lib','jquery-ui/jquery.ui.js','js');?>
<script type="text/javascript">
$(function(){
    $('#effect_time').datepicker({dateFormat: 'yy-mm-dd'});
    $('#expire_time').datepicker({dateFormat: 'yy-mm-dd'});
});

//按钮先执行验证再提交表单
$(function(){$("#submitBtn").click(function(){
  if($("#adv_form").valid()){
    $("#adv_form").submit();
  }
});
});
</script>
  <script src="<?php echo _get_cfg_path('lib')?>uploadify/jquery.uploadify.min.js" type="text/javascript"></script>

<script type="text/javascript">
<?php $timestamp = time();?>
$(function() {
	  upload_file('icon_untouch','icon_untouch','<?php echo $timestamp?>','<?php echo md5($this->config->item('encryption_key') . $timestamp );?>');
	  upload_file('icon_touch','icon_touch','<?php echo $timestamp?>','<?php echo md5($this->config->item('encryption_key') . $timestamp );?>');
});
</script>
</body>
</html>