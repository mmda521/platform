<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>表单</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">

		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Admin/plugins/layui/css/layui.css"  />
		<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">

	</head>

	<body>
		<div style="margin: 15px;">
			<form class="layui-form">
                <div class="layui-form-item">			
					<label class="layui-form-label">审核通过</label>
					<div class="layui-input-inline">
						<select name="xuanze" id="xuanze" lay-filter="test">
							<option value="">--请选择--</option>			
							<option value="0">审核中</option>
							<option value="1">审核通过</option>
							<option value="2">审核失败</option>
						</select>
					</div>
				</div>
				<input type="hidden" value="<?php if(isset($info)) echo $info;?>" name="goods_Id"/>
		      <div id="result"></div>
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn" lay-submit="" lay-filter="demo">保存</button>
						<button type="reset" class="layui-btn layui-btn-primary">返回</button>
					</div>
				</div>
			</form>
		</div>
		<script type="text/javascript" src="<?php echo base_url(); ?>webroot/TDC_Admin/plugins/layui/layui.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>webroot/TDC_Admin/js/index.js"></script>
		<script>
			layui.use(['form','layer'], function(){
              var $ = layui.jquery;
			 
			  var form = layui.form();
			   layer = layui.layer;
			   form.on('select(test)',function(data){
				   //alert(data.value);				  
				   if(data.value=='2')
				   {
					   var textarea=document.createElement("textarea");
					   textarea.setAttribute("style", "width:185px;height:110px;");
					   textarea.setAttribute("class", "layui-textarea");
					   textarea.setAttribute("id", "reason");
					    //alert(textarea);
                       textarea.name="reason";
					  //$('#result').appendChild(textarea);
					  document.getElementById('result').appendChild(textarea);
					  
				   }
				   else
				   {
					   
					   var div = document.getElementById("result"); 
					    var textarea = document.getElementById("reason"); 
					   if(textarea)
					   {
						    div.removeChild(textarea);  
					   }
				   }
				   // form.render(textarea); 
			   });
			   form.on('submit(demo)',function(jieguo){
				  $.ajax({
					 type:"post", 
					 url:"<?php echo site_url('Admin/shenhe_goods_tijiao')?>",
					 data:{
						 'data':JSON.stringify(jieguo.field),
					 },					
					 dataType:"json",
					 async: false,
					 success:function(msg){
						 //alert(msg.errmsg);
						 parent.layer.open({
							type:1,
                            title:'审核结果',	
                            content:'<div style="text-align:center;margin:30px 0px 0px 0px;">'+msg.errmsg+'</div>',	
                            area:['250px','150px'],
                            btn:['确定'],					
                            success: function(layero){
                             var btn = layero.find('.layui-layer-btn');
							     btn.find('.layui-layer-btn0').attr({
							     href:'<?php echo site_url("Admin/Goods_shenhe");?>',
							 });							
                            }							
						 }) ;
						//
					 },
					 error:function()
					 {
						  parent.layer.open({
							type:1,
                            title:'审核结果',	
                            content:'<div style="text-align:center;margin:30px 0px 0px 0px;">操作失败！</div>',	
                            area:['250px','150px'],
                          	btn:['确定'],						
						 }) ;
					 },
				  });
			   });
           });
		</script>
	</body>

</html>