<?php set_time_limit(0);?>
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
     <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/window.css" />
<style>
	.control-group .controls label{
		display:inline-block;
	}
</style>
<script type="text/javascript">
function chufa()
{
	var url = "<?php echo site_url("Qr_Code/do_qr_add");?>";
	var data={
	'qr_num':$("#qr_num").val(),
    'qrtype':$("#qrtype").val(),	
	'TDC_id':$("#TDC_id").val(),
	'functiontype':$("#functiontype").val(),
	};
	$.ajax({
		type:"POST",
		url:url,
		data:data,
		dataType:"json",
		cache:false,
		success:function(msg)
		{
		 var num =msg.errmsg;
		 var StartNo = msg.data;
		 var EndNo = msg.goods_Id;
		 var template_name = msg.field_Id;
		 if(msg.resultcode<=0)
		 {
			alert('没有权限执行此操作');
		 }
		else
		{
			document.getElementById("startNo").value=StartNo;
			document.getElementById("endNo").value=EndNo;
			get('template').length = 1;
			//创建新的元素option
			for(var i = 0; i<template_name.length;i++)
			{
				var myOption = document.createElement("option");
			    myOption.value ="模板"+template_name[i]['field_Id'];
			    myOption.innerText ="模板"+template_name[i]['field_Id'];
				get('template').appendChild(myOption);
			}
			
			
			
			
			document.getElementById("chuanzhi").innerHTML=num;
			ShowDiv('batch','fade');
		}
			
		},
		 error:function(){
         alert("服务器繁忙",'error');
       }
		
	})
	
}


 //弹出隐藏层
        function ShowDiv(show_div, bg_div) {
            document.getElementById(show_div).style.display = 'block';  
            document.getElementById(bg_div).style.display = 'block';			
        };
        //关闭弹出层
        function CloseDiv(show_div, bg_div) {
            document.getElementById(show_div).style.display = 'none';
			document.getElementById(bg_div).style.display = 'none';
        };
		
		
	function queding()
	{
	  $('#batch').css('display','none');
	  $('#fade').css('display','none');
	}
     
function get(id)
 {
	 return document.getElementById(id);
 }
 
 function change()
 {
	 var url = "<?php echo site_url("Qr_Code/qr_active");?>";
	 var data = 
	{
		'template_id':($('#template').val()).replace(/[^0-9]/ig,""),    //匹配出数字
		'startNo':$('#startNo').val(),
		'endNo':$('#endNo').val(),
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
			//alert(goods_data);
			var goods_Id = msg.data;
			var field_Id = msg.goods_Id;
			if(msg.resultcode<=0)
			{
				 alert('没有权限执行此操作');
			}
			else
			{
				get('itemName').length = 1;
				if(goods_data!=null)
				{
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
					get('itemName').appendChild(selfOption);
				  }
				}
				
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
<div id="fade" class="black_overlay"></div>
<div id="batch" class="dialog1" >
<div class="dialog_content"> <span class="del_right" onclick="CloseDiv('batch','fade')" >×</span> </div>
<div class="center">
<div class="canshu" id="chuanzhi"></div>
<input type="button" value="确定"  id="close1" onclick="queding();" class="btn btn-success"/>
</div>
</div>
<div id="content">
  <div id="content-header">
      <h1>二维码管理</h1>
  </div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>二维码生成</h5>
        </div>
        <div class="widget-content nopadding">
          <form  method="post" class="form-horizontal">
            <div class="control-group" style="width:98.7%;">
              <label class="control-label">生成数量：</label>
              <div class="controls" >
                <input type="text" class="span11" placeholder="请填写需要生成的二维码数量" name="qr_num" id="qr_num"/>
              </div>
            </div>  
            <div class="control-group">
              <label class="control-label">二维码类型：</label>
              <div class="controls">
                <select name="qrtype" id="qrtype">
              
                  <option value="1">方形码</option>;
                  <option value="2">圆形码</option>;

                </select>
              </div>
            </div>
			 <div class="control-group">
              <label class="control-label">功能分类：</label>
              <div class="controls">
                <select name="functiontype" id="functiontype">
              
               <option value="1">防伪溯源码</option>;
               <option value="2">溯源码</option>;
               <option value="3">防伪码</option>;
                </select>
              </div>
            </div>
            <input type="hidden" name="TDC_id" id="TDC_id" value="<?php echo $_SESSION['Admin_id']?>"/>
            <div class="form-actions">
              <button type="button" class="btn btn-success" onclick="chufa();">生成</button>
            </div> 
          </form>
        
      </div>
	  
	  
	  
	  
	  <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>二维码激活</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="<?php echo site_url("Qr_Code/do_qr_active");?>" method="post" class="form-horizontal">            
            <div class="control-group">
              <label class="control-label">起始号段：</label>
              <div class="controls">
                <input type="text" readonly class="span11" placeholder="请填写需要激活的起始号段" name="startNo" id="startNo"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">结束号段：</label>
              <div class="controls">
                <input type="text" readonly class="span11" placeholder="请填写需要激活的结束号段" name="endNo" id="endNo"/>
              </div>
            </div>
			
			
			 <div class="control-group">
              <label class="control-label">模板列表：</label>
              <div class="controls">
                <select name="template" id="template" onchange="change();">
               <option value="">--请选择--</option>
                </select>
              </div>
            </div>

           <div class="control-group">
              <label class="control-label">商品名称：</label>
              <div class="controls">
                <select name="itemName" id="itemName">
               <option value="">--请选择--</option>
                </select>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">激活</button>
              <!--<a href="QR_Export">abc</a>-->
            </div>
          </form>
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
