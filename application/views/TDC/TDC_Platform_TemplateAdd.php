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
<!--<link href='http://fonts.useso.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.min.js"></script> 
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
	html+='<tr class="templete"><td style="padding-left: 27px;"><input type="text" class="span11" placeholder="比如：商品名称" name="data[]"/></td>';
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
      <h1>商品信息模板管理</h1>
  </div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>商品信息模板提交</h5>
        </div>
        <div class="widget-content nopadding" >
          <form action="<?php echo site_url('Template/do_add_template'); ?>" method="post" class="form-horizontal">
            <table  id="sample">
			<thead>
			<tr>
			<th>字段名称</th>
			</tr>
			<tr class="templete">
			<td class="controls" style="padding-left: 27px;" > <input type="text" autofocus="autofocus" class="span11" placeholder="比如：商品名称" name="data[]"/></td>
			<!--<td ><button name="del" title="删除" >删除</button></td>-->
			<td style="width: 100px;"><button  name="del" title="删除"><i class="icon-trash "></i></button></td>
			</tr>
		   </thead>
           </table>
            <div class="form-actions" >
             <input type="button" class="btn btn-success" name="add" value="增加字段" title="增加字段"/>
			 <input type="button" class="btn btn-success" name="delete" value="全部删除" title="全部删除"/>
           
              <!--<button name="add" title="增加字段"><i class="icon-plus"></i></button>
			  &nbsp;&nbsp;&nbsp;&nbsp;<button name="delete" title="全部删除"><i class="icon-trash"></i></button>-->
		   </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">提交</button>
            </div>
           
            
          </form>
      </div>      
     </div>
	</div>
  </div>
</div>

<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
