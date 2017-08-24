<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/matrix-style2.css" />
<link href="<?php echo base_url(); ?>webroot/TDC_Platform/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>webroot/TDC_Platform/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/datepicker.css" />
<style>
	.control-group .controls label{
		display:inline-block;
	}

</style>
 <script type="text/javascript" src="<?php echo base_url();?>/webroot/TDC_Platform/js/DatePicker.js"></script>
 
<script type="text/javascript">
 function getdata()
 {
    //$.getScript('<?php echo base_url();?>/webroot/TDC_Platform/js/DatePicker.js');	
	var url="<?php echo site_url("Goods_add/getdata");?>";
	var data="field_Id="+get('template').value;
	//alert(data);
	$.ajax({
		type:"POST",
		url:url,
		data:data,
		cache:false,
		dataType:"json",
		async: false,
		success:function(msg){	
			var shtml = '';
			var list = msg.errmsg;	
          
			if(msg.resultcode<=0)
			{
				alert('没有权限执行此操作');
			}
			else
			{
				for(var i in list)
				{
					//alert(list[0]);
					//alert(list[1]);
					//alert(list[i].indexOf("日期"));
					if(list[i].indexOf("日期")>=0)
					{
					  shtml+='<tr>';
					  shtml+='<td>'+list[i]+':&nbsp;&nbsp;</td>';
					  shtml+='<td><input type="text" name="data[]" onfocus="setday(this)"/></td>';
					  shtml+='</tr>';
					}
					else if(list[i].indexOf("保质")>=0)
					{
					  shtml+='<tr>';
					  shtml+='<td>'+list[i]+':&nbsp;&nbsp;</td>';
					  shtml+='<td><input type="text" name="data[]"/>天</td>';
					  shtml+='</tr>';
					}
					else
					{
					  shtml+='<tr>';
					  shtml+='<td>'+list[i]+':&nbsp;&nbsp;</td>';
					  shtml+='<td><input type="text" name="data[]"/></td>';
					  shtml+='</tr>';
					}
					
				}
				//alert(shtml);
				$("#result").html(shtml);
				//$('#result').append(shtml);
			}
		},
		beforeSend:function()
		{
			$("#result").html("<?php echo base_url();?>webroot/TDC_Platform/js/DatePicker.js");
		},
		error:function(){
			alert('服务器繁忙');
		}
		
	});
 }
 
/* function hanshu()
{
		  $.getScript("<?php echo base_url();?>/webroot/TDC_Platform/js/jquery.min.js");
		  $.getScript("<?php echo base_url();?>/webroot/TDC_Platform/js/jquery.ui.custom.js");
		  $.getScript("<?php echo base_url();?>/webroot/TDC_Platform/js/bootstrap.min.js");
		  $.getScript("<?php echo base_url();?>/webroot/TDC_Platform/js/bootstrap-colorpicker.js");
		  $.getScript("<?php echo base_url();?>/webroot/TDC_Platform/js/bootstrap-datepicker.js");
		  $.getScript("<?php echo base_url();?>/webroot/TDC_Platform/js/jquery.uniform.js");
		  $.getScript("<?php echo base_url();?>/webroot/TDC_Platform/js/select2.min.js");
		  $.getScript("<?php echo base_url();?>/webroot/TDC_Platform/js/matrix.js");
		  $.getScript("<?php echo base_url();?>/webroot/TDC_Platform/js/matrix.form_common.js");
         //alert('ert');
} */
 
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
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>商品信息提交</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="<?php echo site_url('Goods_add/do_getdata'); ?>" method="post" class="form-horizontal">
            <?php 
			/* if(isset($info)&&!empty($info))
			{
				
					echo "<select id='template' onchange='getdata();'>
					<option value=''>--请选择--</option>";
					foreach ($info as $value)
				{
				echo "<option value=".$value['field_Id'].">模板".$value['field_Id']."</option>";
				}
				echo "</select>";
				
				
			} */
			?>
			
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
			
           <table>
		   <tbody id="result">
		   </tbody>
          </table>
		<!--<input  type="text" onfocus="setday(this)" />-->
            <div class="form-actions">
              <button type="submit" class="btn btn-success">提交</button>
            </div>                       
          </form>
        </div>
      </div>
    </div>
   </div>     
  </div>
</div>

<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.form_common.js"></script> 


</body>
</html>
