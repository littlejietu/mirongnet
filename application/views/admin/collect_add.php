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
      <h3>添加采集项</h3>
      <ul class="tab-base">
        <li><a href="<?php echo ADMIN_SITE_URL.'/collect'?>"><span>采集管理</span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span>添加采集项</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <div class="item-title">
      <ul class="tab-base" id="tab_menu">
        <li><a href="JavaScript:void(0);" class="current" ntype="table_0"><span>基本信息</span></a></li>
        <li><a href="JavaScript:void(0);" ntype="table_1"><span>网址规则</span></a></li>
        <li><a href="javascript:void(0);" ntype="table_2"><span>内容规则</span></a></li>
        <li><a href="javascript:void(0);" ntype="table_3"><span>导入规则</span></a></li>
      </ul>
    </div>
  <form method="post" id="settingForm" action="<?php echo ADMIN_SITE_URL.'/collect/save'?>" >
    <input type="hidden" name="id" value="<?php echo !empty($info)?$info['id']:0; ?>" />
    <table class="table tb-type2" id="table_0">
      <tbody>
        <tr class="noborder">
          <td colspan="4"><b>&raquo;基本信息</b></td>
        </tr>
        <tr>
          <td class="w200" class="required"><label class="validation" for="txt_name">采集项目名:</label></td>
          <td class="vatop">
            <input type="text" class="w200" name="name" id="txt_name" value="<?php echo !empty($info)?$info['name']:''; ?>"/>
          </td>
          <td>目标页面编码:</td>
          <td class="vatop  ">
            <input type="radio" name="charset"  id="charset" value="1" <?php if (isset($info['charset']) && $info['charset'] == 1){?>checked="checked"<?php }?>>GB2312　
            <input type="radio" name="charset"  id="charset" value="2" <?php if (isset($info['charset']) && $info['charset'] == 2){?>checked="checked"<?php }?>>UTF8
            <input type="radio" name="charset"  id="charset" value="3" <?php if (isset($info['charset']) && $info['charset'] == 3){?>checked="checked"<?php }?>>BIG5
          </td>
        </tr>
        <tr class="noborder">
          <td>所属分类:</td>
          <td class="vatop onoff" colspan="3">
            <select name="class_id">
              <option value="all">全部</option>
              <?php foreach($list['data'] as $v):?>
                <?php if( in_array($v['id'],$list['children'][0]) ):?>
                  <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                  <?php 
                        if(!empty($list['children'][$v['id']])):
                          foreach ($list['data'] as $vv):
                            if(in_array( $vv['id'] ,$list['children'][$v['id']] )):?>
                            <option value="<?php echo $vv['id']?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vv['name']?></option>
                        <?php endif;
                          endforeach;
                        endif;?>
                <?php endif;?>
              <?php endforeach;?>
            </select>
          </td>
        </tr>
        <tr class="noborder">
          <td class="w200">状态:</td>
          <td class="vatop" colspan="3">
            <input type="radio" name="status" value="1" <?php if (empty($info['status']) || $info['status'] == 1) echo 'checked="checked"';?>>开启　
            <input type="radio" name="status" value="2" <?php if (isset($info['status']) && $info['status'] == 2) echo 'checked="checked"';?>>关闭
          </td>
        </tr>
      </tbody>

    </table>
    <table class="table tb-type2" id="table_1" style="display:none">
      <tbody>
        <tr class="noborder">
          <td colspan="4"><b>&raquo;网址获取规则</b></td>
        </tr>
        <tr>
          <td class="w200">网址类型:</td>
          <td class="vatop" colspan="3">
            <input type="radio" name="attribute" value="1" <?php if (empty($info['attribute']) || $info['attribute'] == 1) echo 'checked="checked"';?> >序列网址　
            <input type="radio" name="attribute" value="2" <?php if (isset($info['attribute']) && $info['attribute'] == 2) echo 'checked="checked"';?> >手工指定
            
          </td>
        </tr>
        <tr class="noborder" id="tb_attribute_1">
          <td>批量生成地址设置:</td>
          <td class="vatop" colspan="3">
            <table>
            <tr class="noborder">
              <td>
                匹配网址：<input type="text" class="w200" name="batch_match_url" value="<?php echo !empty($info)?$info['batch_match_url']:''; ?>"/>&nbsp;&nbsp;<input type="button" value="测试" />
              </td>
            </tr>
            <tr class="noborder">
              <td>
                (如：http://www.dedecms.com/html/test/list_(*).html，如果不能匹配所有网址，可以在手工指定网址的地方输入要追加的网址)
              </td>
            </tr>
            <tr class="noborder">
              <td>
                (*)从&nbsp;&nbsp;<input type="text" style="width:30px" name="batch_start_num" value="<?php if(!empty($info)) echo $info['batch_start_num'];?>"/>&nbsp;&nbsp;
                到&nbsp;&nbsp;<input type="text" style="width:30px" name="batch_end_num" value="<?php if(!empty($info)) echo $info['batch_end_num'];?>"/>&nbsp;&nbsp;(填写页码或规律递增数字)
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;每页递增：&nbsp;&nbsp;<input type="text" style="width:30px" name="batch_per_num" value="<?php echo !empty($info)?$info['batch_per_num']:'';?>"/>
              </td>
            </tr>
            </table>
          </td>
        </tr>

        <tr class="noborder" id="tb_attribute_2" style="display:none">
          <td>手工指定网址:
            <br />
            <span>在指定了通配规则后有些不能匹配的网址也可以在这里指定。</span>
          </td>
          <td class="vatop">
            <textarea name="manual_url" id="manual_url" cols="45" rows="5" style="width:80%;height:160px"><?php echo !empty($info)?$info['manual_url']:'';?></textarea>
          </td>
        </tr>
        <tr>
          <td colspan="4"><b>&raquo;文章网址匹配规则</b></td>
        </tr>
       
        <tr class="noborder">
          <td class="w200">获取网址规则:</td>
          <td class="vatop" colspan="3">
            <textarea name="url_rule" id="url_rule" cols="45" rows="5" style="width:50%;height:70px"><?php echo !empty($info)?$info['url_rule']:'';?></textarea>
          </td>
        </tr>
        <tr class="noborder">
          <td class="w200">网址配置:</td>
          <td class="vatop" colspan="3">
            网址中必须包含&nbsp;&nbsp;<input type="text" class="w200" name="url_must_contain" value="<?php echo !empty($info)?$info['url_must_contain']:'';?>" />&nbsp;&nbsp;
            网址中不得包含&nbsp;&nbsp;<input type="text" class="w200" name="url_not_contain" value="<?php echo !empty($info)?$info['url_not_contain']:'';?>" />
          </td>
        </tr>
      </tbody>
      <table class="table tb-type2" id="table_2" style="display:none">
      <tbody>
        <tr class="noborder">
          <td colspan="4"><b>&raquo;内容匹配规则</b></td>
        </tr>
        <tr>
          <td class="w200">标题规则:</td>
          <td class="vatop">
            <textarea name="title_rule" id="title_rule" cols="45" rows="5" style="width:50%;height:70px"><?php echo !empty($info)?$info['title_rule']:'';?></textarea>
          </td>
          <td>过滤选项:</td>
          <td class="vatop  ">
            <textarea name="title_filter" id="title_filter" cols="45" rows="5" style="width:50%;height:70px"><?php echo !empty($info)?$info['title_filter']:'';?></textarea>
          </td>
        </tr>
        <tr class="noborder">
          <td>内容规则:</td>
          <td class="vatop">
            <textarea name="content_rule" id="content_rule" cols="45" rows="5" style="width:50%;height:70px"><?php echo !empty($info)?$info['content_rule']:'';?></textarea>
          </td>
          <td>过滤选项:</td>
          <td class="vatop">
            <textarea name="content_filter" id="content_filter" cols="45" rows="5" style="width:50%;height:70px"><?php echo !empty($info)?$info['content_filter']:'';?></textarea>
          </td>
        </tr>
        <tr class="noborder">
          <td>时间规则:</td>
          <td class="vatop">
            <textarea name="time_rule" id="time_rule" cols="45" rows="5" style="width:50%;height:70px"><?php echo !empty($info)?$info['time_rule']:'';?></textarea>
          </td>
          <td>过滤选项:</td>
          <td class="vatop">
            <textarea name="time_filter" id="time_filter" cols="45" rows="5" style="width:50%;height:70px"><?php echo !empty($info)?$info['time_filter']:'';?></textarea>
          </td>
        </tr>
        <tr class="noborder">
          <td>来源规则:</td>
          <td class="vatop">
            <textarea name="from_ruie" id="from_ruie" cols="45" rows="5" style="width:50%;height:70px"><?php echo !empty($info)?$info['from_ruie']:'';?></textarea>
          </td>
          <td>过滤选项:</td>
          <td class="vatop">
            <textarea name="from_filter" id="from_filter" cols="45" rows="5" style="width:50%;height:70px"><?php echo !empty($info)?$info['from_filter']:'';?></textarea>
          </td>
        </tr>
      </tbody>
    </table>
    <table class="table tb-type2" id="table_3" style="display:none">
      <tbody>
        <tr class="noborder">
          <td colspan="4"><b>&raquo;导入规则</b></td>
        </tr>
        <tr>
          <td class="w200">下载图片:</td>
          <td class="vatop">
            <input type="radio" name="is_download_img"  id="is_download_img" value="1" <?php if (isset($info['is_download_img']) && $info['is_download_img'] == 1){?>checked="checked"<?php }?>>是　
            <input type="radio" name="is_download_img"  id="is_download_img" value="2" <?php if (isset($info['is_download_img']) && $info['is_download_img'] == 2){?>checked="checked"<?php }?>>否
          </td>
        </tr>
        <tr class="noborder">
          <td>图片水印:</td>
          <td class="vatop">
            <input type="radio" name="is_watermark"  id="is_watermark" value="1" <?php if (isset($info['is_watermark']) && $info['is_watermark'] == 1){?>checked="checked"<?php }?>>是　
            <input type="radio" name="is_watermark"  id="is_watermark" value="2" <?php if (isset($info['is_watermark']) && $info['is_watermark'] == 2){?>checked="checked"<?php }?>>否
          </td>
        </tr>
        <tr class="noborder">
          <td>时间规则:</td>
          <td class="vatop">
            <input type="radio" name="is_import_order"  id="is_import_order" value="1" <?php if (isset($info['is_import_order']) && $info['is_import_order'] == 1){?>checked="checked"<?php }?>>与目标站相同　
            <input type="radio" name="is_import_order"  id="is_import_order" value="2" <?php if (isset($info['is_import_order']) && $info['is_import_order'] == 2){?>checked="checked"<?php }?>>与目标站相反
          </td>
        </tr>
      </tbody>
    </table>
    <table>
      <tfoot>
        <tr>
          <td colspan="3" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span>提交</span></a></td>
        </tr>
      </tfoot>
    </table>

  </form>
</div>


<script src="<?php echo _get_cfg_path('lib')?>uploadify/jquery.uploadify.min.js" type="text/javascript"></script>


<script>

$(function(){

  $("#submitBtn").click(function(){
    if($("#settingForm").valid()){
     $("#settingForm").submit();
    }
  });

  $("#tab_menu li").click(function(){
    $(this).siblings().children('a').removeClass('current');

    $(this).children('a').addClass('current');

    var tb = $(this).children('a').attr('ntype');
    for(var i=0;i<=3;i++)
      $('#table_'+i).hide();
    $('#'+tb).show();
  });

  $("input[name=attribute]").click(function(){
    $('#tb_attribute_1').hide();
    $('#tb_attribute_2').hide();

    $('#tb_attribute_'+$(this).val()).show();
  });



});
//
$(document).ready(function(){
  $("#settingForm").validate({
    errorPlacement: function(error, element){
      error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
          name : {
              required : true
            },
          charset : {
              required : true
          }
        },
        messages : {
          name : {
                required : '请填写采集项目名'
            },
          charset : {
              required : '请选择编码'
          }
        }
  });
});
</script>
</body>
</html>