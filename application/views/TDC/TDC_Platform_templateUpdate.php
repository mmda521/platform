<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/colorpicker.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/matrix-style2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/matrix-media.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap-wysihtml5.css" />
<link href="<?php echo base_url(); ?>webroot/TDC_Platform/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!--<link href='http://fonts.useso.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->


  <!-- 使用jquery一定
   要加载此文件
   -->
<script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js"></script>
<style>
	.control-group .controls label{
		display:inline-block;
	}
</style>
<script type="text/javascript">
$(function(){
	$(':button[name=add]').click(function(){
		insert();
	});


	$('button[name=del]').click(function(){
		$(this).parents('tr').remove();
	});
	
	
	$(':button[name=delete]').click(function(){
		if(sample.rows.length==1)
		{
			return false;
		}
		else
		{
			if(confirm('确定要删除此信息吗？'))
			{
				alert('删除成功！');
				$('.templete').remove();
			}
			return false;
		}
	});
	
});
var id='1';
function insert()
{
	
	var html='';
	html+='<tr class="templete"><td><input type="text" class="span11" placeholder="比如：商品名称" name="tpName[]"/></td>';
	html+='<td><button name="del" title="删除"><i class="icon-trash "></i></button></td></tr>';
	$('#sample').append(html);
	$('button[name=del]').click(function(){
		$(this).parents('tr').remove();
	});
	  id++;
}
</script>
</head>
<body>

<div id="content">
  <div id="content-header">
      <h1>商品信息管理</h1>
  </div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>商品信息提交</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="<?php echo site_url("Template/do_templateUpdate");?>" method="post" class="form-horizontal">
  
           
            <div class="control-group">
              <div class="controls" style="margin-left: 60px;">
			  <table id='sample'>
			  <thead>
			   <tr>
			    <th>字段名称</th>
			   </tr>
			  <?php if(isset($field)&&!empty($field))
			  {				 
				  foreach ($field as $key => $value)
				  {  
	
					  echo "<tr class='templete'><td><input type='text' class='span11'  name='tpName[]' value='$field[$key]'/></td><td><button  name='del' title='删除'><i class='icon-trash'></i></button></td></tr>";
				  }
				   echo "</thead>";
			  }
			  ?>
			  </table>
                 <input type="hidden" class="span11"  name="tpid" value="<?php echo $field_Id;?>"/>
				
              </div>
            </div>
               
            
            <div class="form-actions">
             <input type="button" class="btn btn-success" style="text-align:center" name="add" value="增加字段" title="增加字段"/>
             <input type="button" class="btn btn-success"  name="delete" value="全部删除" title="全部删除" />
			 <button type="submit" class="btn btn-success">提交</button>
			 <a href="javascript:history.go(-1);" class="btn btn-success" >返回</a>
              <!--
              <a>&nbsp;</a>
              <button type="button" class="btn btn-success"  ><a href="TDC_Platform_GT_ItemInfo" style="color:white">返回</a></button>
              -->
            </div>
            
            
          </form>
        </div>
      </div>
  </div>
</div>    
</div>
</div>

<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/bootstrap-colorpicker.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/bootstrap-datepicker.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.toggle.buttons.html"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/masked.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.form_common.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/wysihtml5-0.3.0.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.peity.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/bootstrap-wysihtml5.js"></script> 
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
