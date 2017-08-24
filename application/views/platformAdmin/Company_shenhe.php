<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Table</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Admin/plugins/layui/css/layui.css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Admin/css/global.css" media="all">
		<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Admin/css/table.css" />
	</head>

	<body>
		<div class="admin-main">

			<!--<blockquote class="layui-elem-quote">
				<a href="javascript:;" class="layui-btn layui-btn-small" id="add">
					<i class="layui-icon">&#xe608;</i> 添加信息
				</a>
				<a href="#" class="layui-btn layui-btn-small" id="import">
					<i class="layui-icon">&#xe608;</i> 导入信息
				</a>
				<a href="#" class="layui-btn layui-btn-small">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i> 导出信息
				</a>
				<a href="javascript:;" class="layui-btn layui-btn-small" id="search">
					<i class="layui-icon">&#xe615;</i> 搜索
				</a>
			</blockquote>-->
			<fieldset class="layui-elem-field">
				<legend>企业信息列表</legend>
				<div class="layui-field-box">
					<table class="layui-table">
						<thead>
							<tr>
								<th>企业名称</th>
								<th>联系人</th>
								<th>联系电话</th>
								<th>邮箱</th>
								<th>注册时间</th>								
								<th>审核状态</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody id="content">
						  <?php
								foreach ($info as $key => $value)
								{ ?>
	                              <tr>								
									<td><?php echo $value['CompanyName'];?></td>
								    <td><?php echo $value['ContactPerson'];?></td>
								    <td><?php echo $value['PhoneNumber'];?></td>
								    <td><?php echo $value['Email'];?></td>
								    <td><?php echo $value['User_Register_Time'];?></td>
									<td><?php echo $value['Company_Status'];?></td>
									<td>
										<a href="<?php echo site_url('Admin/shenhe_detail')?>?TDC_id=<?php echo $value['TDC_id'];?>" class="layui-btn layui-btn-normal layui-btn-mini">查看详情</a>
										<!--<a href="<?php echo site_url('Admin/Company_do_shenhe')?>?TDC_id=<?php echo $value['TDC_id'];?>" class="layui-btn layui-btn-normal layui-btn-mini">审核</a>-->
									    <button onclick="chuanzhi(<?php echo $value['TDC_id'];?>)" class="layui-btn layui-btn-normal layui-btn-mini">审核</button>
									</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>

				</div>
				<input type="hidden" value="<?php if(isset($num)) echo $num;?>">
			</fieldset>
			<div class="admin-table-page">
				<div id="page" class="page">
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo base_url(); ?>webroot/TDC_Admin/plugins/layui/layui.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>webroot/TDC_Admin/js/index.js"></script>
		<script>

			layui.use(['laypage','layer'], function() {
				var $ = layui.jquery;
				var laypage = layui.laypage;
				layer = layui.layer;
				laypage({
					cont:'page',
					pages:<?php if(isset($num)) echo $num;?>,
					//skin:'#1E9FFF',
					skip:true,
					jump:function(obj,first){
						var curr = obj.curr;
						if(!first)
						{
							var url = "<?php echo site_url('Admin/fenye_shenhe');?>";
						    $.post(url,"page="+curr,function(res){
							//$("#content").empty();
							var shtml=" ";
							var result= res;	
                           //alert(res);							
							for(var i in result)
							{
								shtml+='<tr>';
								shtml+='<td>'+result[i]['CompanyName']+'</td>';
								shtml+='<td>'+result[i]['ContactPerson']+'</td>';
								shtml+='<td>'+result[i]['PhoneNumber']+'</td>';
								shtml+='<td>'+result[i]['Email']+'</td>';
								shtml+='<td>'+result[i]['User_Register_Time']+'</td>';
								shtml+='<td>'+result[i]['Company_Status']+'</td>';
								shtml+='<td><a href="<?php echo site_url('Admin/shenhe_detail')?>?TDC_id='+result[i]['TDC_id']+'" class="layui-btn layui-btn-normal layui-btn-mini">查看详情</a><button onclick="chuanzhi('+result[i]['TDC_id']+')" class="layui-btn layui-btn-normal layui-btn-mini">审核</button></td>';
								shtml+='</tr>';
							}
							$('#content').html(shtml);
							
						},"json");
						};
					},
				});
					// $('.chuandi').on('click',function() {
						// layer.open({
							// content:'测试回调',
							// success:function(layero,index){
								// alert(layero[0].firstChild.firstChild.nodeName);
							// }
						// });
						// });
						
				
				
				// <?php
				// foreach ($info as $key => $value){
				// ?>
				
				// $('.chuandi_<?php echo $value['TDC_id'];?>').on('click',function() {
					
					// layer.open({
						// type: 2,
						// title:'企业资质审核',
						// maxmin:true,
						// content:'http://localhost:8080/platform/index.php/Admin/Company_do_shenhe?tdc_id=<?php echo $value['TDC_id'];?>',						 
						// area:['500px','300px']
					// });
					
				// });
				 // <?php 
				 // } 
				 // ?>	
			});
			
			function chuanzhi(tdc_id)
				{
					layer.open({
						type: 2,
						title:'企业资质审核',
						maxmin:true,
						content:'<?php echo site_url("Admin/Company_do_shenhe");?>?tdc_id='+tdc_id,						 
						area:['500px','300px']
					});
				}
		</script>
	</body>

</html>