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

		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Admin/plugins/layui/css/layui.css" media="all" />
		<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
	</head>

	<body>
		<div style="margin: 15px;">
			<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
				<legend>审核商品信息</legend>
			</fieldset>

			<form class="layui-form">
				
				<!-- <div class="layui-form-item">
					<label class="layui-form-label">单行选择框</label>
					<div class="layui-input-block">
						<select name="interest" lay-filter="aihao">
							<option value=""></option>
							<option value="0">写作</option>
							<option value="1" selected="">阅读</option>
							<option value="2">游戏</option>
							<option value="3">音乐</option>
							<option value="4">旅行</option>
						</select>
					</div>
				</div> -->

				<div class="layui-form-item">
					<label class="layui-form-label">模板类型</label>
					<div class="layui-input-inline">
						<select name="xuanze" lay-filter="test">
							<option value="">--请选择--</option>
							<?php 
							if(isset($info))
							{
								foreach ( $info as $key => $value )
							 {?>
								<option value="<?php echo $value['field_Id']; ?>">模板<?php echo $value['field_Id']; ?></option>
							 <?php 
							 }
							}
							?>
							
						</select>
					</div>
				</div>
               
				<!-- <div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn" lay-submit="" lay-filter="demo1">搜索</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div> -->
			</form>
			 <div class="layui-field-box">
					<table class="layui-table" id="table">
						
					</table>
			</div>
			<div class="admin-table-page">
				<div id="page" class="page">
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo base_url(); ?>webroot/TDC_Admin/plugins/layui/layui.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>webroot/TDC_Admin/js/index.js"></script>
		<script>
			layui.use(['laypage','form','layer'], function() {
				var $ = layui.jquery;
				var laypage = layui.laypage;
				var form = layui.form();
					layer = layui.layer,
					form.on('select(test)',function(result){
						//alert(result.value);
						$.ajax({							
							type:"post",
							url:"<?php echo site_url('Admin/goods_shenhe_show');?>",
							 data:{
						      'data':result.value,
					        },	
							dataType:"json",
							//cache:false,
							success:function(msg)
							{
								var shtml='';
								var list = msg.errmsg;
								var data = msg.data;
                                var goods_Id = msg.goods_Id;
								var goods_Status = msg.field_Id;
								if(msg.resultcode>0)
								{	
							        shtml+='<thead><tr>';
									for(var i in list)
									{
										shtml+='<th>'+list[i]+'</th>';
									}
									shtml+='<th>审核状态</th>';
									shtml+='<th>操作</th></tr></thead>';
									shtml+='<tbody>';
									for(var i in data)
									{
										shtml+='<tr>';
										for(var j in data[i])
										{
											 shtml+='<td>'+data[i][j]+'</td>';
										}
										shtml+='<td>'+goods_Status[i]+'</td>';
										shtml+='<td><button class="layui-btn layui-btn-normal layui-btn-mini" onclick="chuandi('+goods_Id[i]+')">审核</button></td>';
									    shtml+='</tr>';
									}
									shtml+='</tbody>';
									$("#table").html(shtml);
									laypage({
										cont:'page',
										pages:msg.pages,
										//skin:'#1E9FFF',
										skip:true,
										jump:function(obj,first){
											var curr = obj.curr;
											if(!first)
											{
												var url = "<?php echo site_url('Admin/goods_shenhe_show_page');?>";
												$.post(url,"page="+curr+"&&field_id="+result.value,function(msg){
													var shtml='';
													var list = msg.errmsg;
													var data = msg.data;
													var goods_Id = msg.goods_Id;
													var goods_Status = msg.field_Id;
													if(msg.resultcode>0)
													{	
														shtml+='<thead><tr>';
														for(var i in list)
														{
															shtml+='<th>'+list[i]+'</th>';
														}
														shtml+='<th>审核状态</th>';
														shtml+='<th>操作</th></tr></thead>';
														shtml+='<tbody>';
														for(var i in data)
														{
															shtml+='<tr>';
															for(var j in data[i])
															{
																 shtml+='<td>'+data[i][j]+'</td>';
															}
															shtml+='<td>'+goods_Status[i]+'</td>';
															shtml+='<td><button class="layui-btn layui-btn-normal layui-btn-mini" onclick="chuandi('+goods_Id[i]+')">审核</button></td>';
															shtml+='</tr>';
														}
														shtml+='</tbody>';
														$("#table").html(shtml);
													}
												},"json");
											};
										},
										});
								}
							},
							error:function()
							{
								alert('报错');
							},
							
						});
					});
			});
			
			function chuandi(goods_Id)
			{
				//alert(goods_Id);
				layer.open({
					type : 2,
					title : '商品信息审核',
					maxmin: true,
					content:'<?php echo site_url("Admin/goods_do_shenhe");?>?goods_Id='+goods_Id,
					area:['500px','300px']
				});
			}
		</script>
	</body>

</html>