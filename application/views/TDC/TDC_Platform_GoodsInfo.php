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

<style>
	.control-group .controls label{
		display:inline-block;
	}
</style>
<script type="text/javascript">
 function getdata()
 {
	var url="<?php echo site_url("Goods_add/data_show_goods");?>";
	var data="field_Id="+get('template').value;
	//alert(data);
	$.ajax({
		type:"POST",
		url:url,
		data:data,
		cache:false,
		dataType:"json",
		success:function(msg){
			var shtml = '';
			var list = msg.errmsg;	
            var data = msg.data;
            var goods_Id = msg.goods_Id;
            var template_Id = msg.field_Id;			
			if(msg.resultcode<=0)
			{
				//alert('没有权限执行此操作');
				$("#result").empty();
				alert(list);
			}
			else
			{
				shtml+='<tr>';
				for(var i in list)
				{  
					  shtml+='<th>'+list[i]+'</th>';
				}
				shtml+='<th>操作</th>';
				shtml+='</tr>';
				
				for(var i in data)
				{
					shtml+='<tr>';
					for(var j in data[i])
					{
						 shtml+='<td>'+data[i][j]+'</td>';
					}
					
					shtml+='<td><a style="color:blue" href="<?php echo site_url('Goods_add/update');?>?goods_Id='+goods_Id[i]+'&&template_id='+template_Id+'" >编辑</a>&nbsp;&nbsp;<a style="color:blue" href="<?php echo site_url('Goods_add/delete');?>?goods_Id='+goods_Id[i]+'" >删除</a></td>';
					
					
					shtml+='</tr>';
				}
				
				$("#result").html(shtml);
			}
		},
		beforeSend:function()
		{
			$("#result").html('<img src="<?php echo base_url();?>webroot/TDC_Platform/img/spinner.gif">');
		},
		error:function(){
			alert('服务器繁忙');
		}
		
	});
 }
 
 

 
 function get(id)
 {
	 return document.getElementById(id);
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
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>商品信息展示</h5>
        </div>
        <div class="widget-content nopadding">
        
           
			 <?php 
			if(isset($info)&&!empty($info))
			{?>
					<select id="template" name="template_id" onchange="getdata();">
					<option value="">--请选择--</option>
					<?php foreach ($info as $value)
				{?>
				<option value="<?php echo $value['field_Id']; ?>" >模板<?php echo $value['field_Id']; ?></option>
				<?php } ?>
				</select>
				
			<?php } ?>
			
           <table class="table table-bordered data-table">
		   <tbody id="result">
		   </tbody>
          </table>                      

        </div>
      </div>
    </div>
   </div>     
  </div>
</div>

<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/select2.min.js"></script>  
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.form_common.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.tables.js"></script>

</body>
</html>
