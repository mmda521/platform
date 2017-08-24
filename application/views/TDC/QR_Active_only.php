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

<style>
	.control-group .controls label{
		display:inline-block;
	}
</style>
<script type="text/javascript">
function getshow()
 {
	 var url = "<?php echo site_url("Qr_Code/qr_active_only_get_goodsdata");?>";
	 var data = 
	{
		'template_id':$('#template_id').val(),    
	};

	//var data="field_Id="+get('template').value;  text.replace(/[^0-9]/ig,""); 
	$.ajax({
		type:"POST",
		url:url,
		data:data,
		dataType:"json",
		cache:false,    //cache为true，会缓存ajax结果，第二次及更多次的调用会用缓存中的结果（不需要重新到服务器获取）
		success:function(msg)
		{
			var goods_data = msg.errmsg;
			var goods_Id = msg.data;
			var field_Id = msg.goods_Id;
			if(msg.resultcode<=0)
			{
				 alert('没有权限执行此操作');
			}
			else
			{
				get('goodsName').length = 1;
				for(var i in goods_data)
				{
					var selfOption = document.createElement("option");
					 var str='';
					 str+=goods_Id[i]+"^";
					for(var j in goods_data[i])
					{
						if(j == (goods_data[i].length-1))
						{
							str+=goods_data[i][j];
						}
						else
						{
							str+=goods_data[i][j]+"^";
						}
						
					}					
					selfOption.value = str;					
					selfOption.innerText = str;					
					get('goodsName').appendChild(selfOption);
				}
			}
		},
		error:function()
		{
		  alert("服务器繁忙",'error');	
		}
	})
	
 }
 
 
 function get(id)
 {
	 return document.getElementById(id);
 }
 
 
 function haoduan()
 {
	 var url = "<?php echo site_url("Qr_Code/do_qr_active_only_get_goodsdata");?>";
	 var data = 
	{
		'goodsName':$('#goodsName').val(),
        'startNo':$('#startNo').val(), 		
	    'endNo':$('#endNo').val(), 
	};

	$.ajax({
		type:"POST",
		url:url,
		data:data,
		dataType:"json",
		cache:false,    //cache为true，会缓存ajax结果，第二次及更多次的调用会用缓存中的结果（不需要重新到服务器获取）
		success:function(msg)
		{
			var goods_data = msg.errmsg;
			if(msg.resultcode<=0)
			{
				get('fuzhi').value=goods_data;
			}
			else
			{
				window.location.href="<?php echo site_url("Qr_Code/qr_Active_Result_only");?>";
			}
		},
		error:function()
		{
		  alert("服务器繁忙",'error');	
		}
	})
	
 }
</script>
</head>
<body>

<div id="content">
  <div id="content-header">
      <h1>二维码管理</h1>
  </div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>二维码激活</h5>
        </div>
        <div class="widget-content nopadding">
          <form  method="post" class="form-horizontal">            
           <?php 
			if(isset($info)&&!empty($info))
			{?>
		      <div class="control-group">
			    <label class="control-label">选择模板：</label>
				 <div class="controls">
					<select id="template_id" name="template_id" onchange="getshow();">
					<option value="">--请选择--</option>
					<?php foreach ($info as $value)
				{?>
				<option value="<?php echo $value['field_Id']; ?>" >模板<?php echo $value['field_Id']; ?></option>
				<?php } ?>
				  </select>
				</div>
			</div>
			<?php } ?>

		   <div class="control-group">
              <label class="control-label">起始号段：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写需要激活的起始号段" name="startNo" id="startNo"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">结束号段：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写需要激活的结束号段" name="endNo" id="endNo"/>
              </div>
            </div>
           <div class="control-group">
              <label class="control-label">商品名称</label>
              <div class="controls">
                <select name="goodsName" id="goodsName">
                 <option value="">--请选择--</option>
                </select>
              </div>
            </div>
			        
              <div class="controls">
                <input type="text" style="border-width:0;color:red;width:250px" name="endNo" id="fuzhi"/>
              </div>
           
            <div class="form-actions">
              <button type="button" class="btn btn-success" onclick="haoduan();">激活</button>
              <!--<a href="QR_Export">abc</a>-->
            </div>
          </form>
        </div>
      </div>
   </div></div>   
</div></div>

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
