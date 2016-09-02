
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
        
        <li><a href="<?php echo ADMIN_SITE_URL.'/collect/';?>"><span>采集列表<?php echo lang('adv_manage');?></span></a></li>
        <li><a href="<?php echo ADMIN_SITE_URL.'/collect/add';?>"><span >添加采集项</span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span >临时内容</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <table cellpadding="0" cellspacing="0" bordercolor="#eee" border="0" style="margin-top:2px" width="100%">
		<tr>
            <td height="32">
                <form id="search_form" class="form-horizontal" role="form" method="post">
                  <select name="is_import">
                    <option value="0"<?php echo (isset($arrParam['is_import'])&&$arrParam['is_import']==0)?' selected':'';?>>未导入</option>
                    <option value="1"<?php echo !empty($arrParam['is_import']) && $arrParam['is_import']==1?' selected':'';?>>已导入</option>
                  </select>
                  <span>名称　</span><input type="text" name="txtKey" value="<?php if (isset($arrParam['txtKey'])){echo $arrParam['txtKey'];}?>" class="w150">
                  <a href="javascript:void(0);" class="btn" onclick="$('#search_form').submit();"><span>查  询</span></a>
                  </form>
            </td>
        </tr>
    </table>
  <form method="post" id="store_form" action="<?php echo ADMIN_SITE_URL.'/collect/detail_del'?>">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th></th>
          <th>ID</th>
          <th>标题</th>
          <th class="align-center">采集时间</th>
          <th class="align-center">网址</th>
          <th class="align-center">是否导入</th>
          <th class="align-center">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($list['rows']) && is_array($list['rows'])){ ?>
        <?php foreach($list['rows'] as $k => $v){ ?>
        <tr class="hover">
          <td class="w24"><input type="checkbox" class="checkitem" name="ids[]" value="<?php echo $v['id']; ?>" /></td>
          <td><?php echo $v['id']; ?></td>
          <td><?php echo $v['title']; ?></td>
          <td class="align-center nowrap"><?php echo date('Y-m-d H:i:s',$v['detail_time']); ?></td>
          <td class="align-center nowrap"><a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['url'];?></td>
          <td class="align-center"><?php if($v['is_import']==1):?>
              已导入
            <?php else:?>
              未导入
            <?php endif;?></td>
          <td class="align-center">
            <a href="javascript:;" onclick="show_hide('content_<?php echo $v['id'];?>',this);">查看内容</a>
          </td>
        </tr>
        <tr id="content_<?php echo $v['id'];?>" style="display:none">
          <td colspan="6" class="align-center">
            <textarea style="width:98%;height:300px;"><?php echo $v['content']?></textarea>
          </td>
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
            </span>&nbsp;&nbsp;<a href="javascript:void(0);" class="btn" id="btnDel"><span>删除</span></a>&nbsp;&nbsp;
            <a href="javascript:void(0);" class="btn" id="btnImport"><span>导入</span></a>
            <div class="pagination"> <?php echo $list['pages'];?> </div>
            </td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<?php echo _get_html_cssjs('lib','jquery-ui/themes/ui-lightness/jquery.ui.css','css');?>
<?php echo _get_html_cssjs('lib','jquery-ui/jquery.ui.js','js');?>
<script type="text/javascript">
  
  function show_hide(divId, obj){
    if($('#'+divId).is(":hidden")){
      $('#'+divId).show();

      $(obj).text('隐藏内容');
    }else{
      $('#'+divId).hide();
      $(obj).text('查看内容');
    }
  }

  $("#btnDel").click(function(){
    if(confirm('您确定要删除选中信息吗？')){
      $('#store_form').attr('action',"<?php echo ADMIN_SITE_URL.'/collect/detail_del'?>");
      $('#store_form').submit();
    }
  });

  $("#btnImport").click(function(){
    $('#store_form').attr('action',"<?php echo ADMIN_SITE_URL.'/collect/detail_import'?>");
    $('#store_form').submit();
  });

</script>
</body>
</html>
