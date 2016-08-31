
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

</head>
<body>


<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo lang('adv_index_manage');?>采集管理</h3>
      <ul class="tab-base">
        
        <li><a href="JavaScript:void(0);" class="current"><span>采集列表<?php echo lang('adv_manage');?></span></a></li>
        <li><a href="<?php echo ADMIN_SITE_URL.'/collect/add';?>"><span >添加采集项</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <table cellpadding="0" cellspacing="0" bordercolor="#eee" border="0" style="margin-top:2px" width="100%">
		<tr>
            <td height="32">
                <form class="form-horizontal" role="form" method="post">
                    <span>名称　</span><input type="text" name="txtKey" value="<?php if (isset($arrParam['txtKey'])){echo $arrParam['txtKey'];}?>" class="w150">
                    <button type="submit" class="btn">查  询</button>
                  </form>
            </td>
        </tr>
    </table>
  <form method="post" id="store_form" action="<?php echo ADMIN_SITE_URL.'/collect/del'?>">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th></th>
          <th>ID</th>
          <th>名称</th>
          <th class="align-center">最后采集时间</th>
          <th class="align-center">状态</th>
          <th class="align-center" width="10%">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($list['rows']) && is_array($list['rows'])){ ?>
        <?php foreach($list['rows'] as $k => $v){ ?>
        <tr class="hover">
          <td class="w24"><input type="checkbox" class="checkitem" name="del_id[]" value="<?php echo $v['id']; ?>" /></td>
          <td><?php echo $v['id']; ?></td>
          <td><?php echo $v['name']; ?></td>
          <td class="align-center nowrap"><?php echo date('Y-m-d H:i:s',$v['collect_time']); ?></td>
          <td class="align-center nowrap"><?php if($v['status'] ==1 ) echo '开启'; elseif ($v['status'] ==2) echo '关闭';?></td>
          <td class="w72 align-center">
          <a href="<?php echo ADMIN_SITE_URL.'/collect/add?id='.$v['id'];?>">编辑</a>&nbsp;|&nbsp;
          <a href="<?php echo ADMIN_SITE_URL.'/collect/del?id='.$v['id'];?>">删除</a></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="15"><?php echo lang('nc_no_record');?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td><input type="checkbox" class="checkall" id="checkall"/></td>
          <td id="batchAction" colspan="15"><span class="all_checkbox">
            <label for="checkall">全选<?php echo lang('nc_select_all');?></label>
            </span>&nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn" onclick="if(confirm('您确定要删除选中信息吗？')){$('#store_form').submit();}"><span>删除<?php echo lang('nc_del');?></span></a>
            <div class="pagination"> <?php echo $list['pages'];?> </div>
            </td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<?php echo _get_html_cssjs('lib','jquery-ui/themes/ui-lightness/jquery.ui.css','css');?>
<?php echo _get_html_cssjs('lib','jquery-ui/jquery.ui.js','js');?>


</body>
</html>
