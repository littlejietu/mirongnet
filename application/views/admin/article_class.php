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

<!--[if IE 7]>
  <?php echo _get_html_cssjs('admin',TPL_ADMIN_NAME.'css/font-awesome-ie7.min.css','css');?>
<![endif]-->
<?php echo _get_html_cssjs('admin_js','perfect-scrollbar.min.js','js');?>

<script type="text/javascript">
SITEURL = 'http://www.jshgwsc.com/shop';
RESOURCE_SITE_URL = '<?php echo BASE_SITE_URL.'/res/admin';?>';
ADMIN_SITE_URL = '<?php echo BASE_SITE_URL.'/admin';?>';
ADMIN_TEMPLATES_URL = '<?php echo BASE_SITE_URL.'/res/admin';?>';
LOADING_IMAGE = '<?php echo BASE_SITE_URL.'/admin/templates/default/images/loading.gif';?>';
//换肤
</script>

</head>
<body>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo lang('article_class_index_class');?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo lang('nc_manage');?></span></a></li>
        <li><a href="<?php echo ADMIN_SITE_URL.'/article_class/add'?>" ><span><?php echo lang('nc_new');?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th class="nobg" colspan="12"><div class="title">
            <h5><?php echo lang('nc_prompts');?></h5>
            <span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td>
          <ul>
            <li><?php echo lang('article_class_index_help1');?></li>
            <li><?php echo lang('article_class_index_help2');?></li>
          </ul>
        </td>
      </tr>
    </tbody>
  </table>
  <form method='post' action="<?php echo ADMIN_SITE_URL.'/article_class/del'?>">
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th class="w48"></th>
          <th class="w48"><?php echo lang('nc_sort');?></th>
          <th><?php echo lang('article_class_index_name');?></th>
          <th class="w96 align-center"><?php echo lang('nc_handle');?></th>
        </tr>
      </thead>
      <tbody id="treet1">
        <?php if(!empty($list) && is_array($list)){ ?>
        <?php foreach($list as $k => $v){ ?>
        <tr class="hover edit">
          <td><?php if($v['parent_id'] != 0){ ?>
            <input type="checkbox" name='check_ac_id[]' value="<?php echo $v['id'];?>" class="checkitem">
            <?php }else{ ?>
            <input name="" type="checkbox" disabled="disabled" value="" />
            <?php }?>
            <?php if($v['have_child'] == '1'){ ?>
            <img src="<?php echo RES_SITE_URL;?>admin/images/tv-expandable.gif" fieldid="<?php echo $v['id'];?>" status="open" nc_type="flex">
            <?php }else{ ?>
            <img fieldid="<?php echo $v['id'];?>" status="close" nc_type="flex" src="<?php echo RES_SITE_URL;?>admin/templates/default/images/tv-item.gif">
            <?php } ?></td>
          <td class="sort"><span title="<?php echo lang('nc_editable');?>" ajax_branch='article_class_sort' datatype="number" fieldid="<?php echo $v['id'];?>" fieldname="ac_sort" nc_type="inline_edit" class="editable"><?php echo $v['sort'];?></span></td>
          <td class="name"><span title="<?php echo lang('nc_editable');?>" required="1" fieldid="<?php echo $v['id'];?>" ajax_branch='article_class_name' fieldname="ac_name" nc_type="inline_edit" class="editable "><?php echo $v['name'];?></span> <a class='btn-add-nofloat marginleft' href="<?php echo ADMIN_SITE_URL.'/article_class/add?parent_id='.$v['id'];?>"><span><?php echo lang('nc_add_sub_class');?></span></a></td>
          <td class="align-center"><a href="<?php echo ADMIN_SITE_URL.'/article_class/edit?id='.$v['id'];?>"><?php echo lang('nc_edit');?></a>
            <?php if($v['parent_id'] != 0){?>
            | <a href="javascript:if(confirm('<?php echo lang('article_class_index_ensure_del');?>'))window.location = '<?php echo ADMIN_SITE_URL.'/article_class/del?id='.$v['id'];?>';"><?php echo lang('nc_del');?></a>
            <?php }?></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo lang('nc_no_record');?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <?php if(!empty($list) && is_array($list)){ ?>
        <tr>
          <td><label for="checkall1">
              <input type="checkbox" class="checkall" id="checkall_2">
            </label></td>
          <td colspan="16"><label for="checkall_2"><?php echo lang('nc_select_all');?></label>
            &nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn" onclick="if(confirm('<?php echo lang('article_class_index_ensure_del');?>')){$('form:first').submit();}"><span><?php echo lang('nc_del');?></span></a></td>
        </tr>
        <?php } ?>
      </tfoot>
    </table>
  </form>
</div>
<script  type="text/javascript" src="<?php echo _get_cfg_path('admin_js');?>jquery.edit.js" charset="utf-8"></script>
<script  type="text/javascript" src="<?php echo _get_cfg_path('admin_js');?>jquery.article_class.js"  charset="utf-8"></script>
</body>
</html>
