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
								<th>企业logo</th>
								<th>企业类型</th>
								<th>企业资质</th>
								<th>联系人</th>
								<th>联系电话</th>
								<th>邮箱</th>
								<th>注册时间</th>								
							</tr>
						</thead>
						<tbody>
						  <?php
								 if (is_array($info)&&isset($info)&&!empty($info)) 
								{ 
							       $CompanyLogo = img($info['CompanyLogo']);
							     ?>
	                              <tr>							
									<td><?php echo $info['CompanyName'];?></td>
								    <td><?php echo $CompanyLogo;?></td>
								    <td><?php echo $info['CompanyType'];?></td>
								    <td><?php echo '1' ;?></td>
								    <td><?php echo $info['ContactPerson'];?></td>
									<td><?php echo $info['PhoneNumber'];?></td>
									<td><?php echo $info['Email'];?></td>
									<td><?php echo $info['User_Register_Time'];?></td>
									<!--<td>
										<a href="<?php echo site_url('Admin/shenhe_detail')?>?TDC_id=<?php echo $value['TDC_id'];?>" class="layui-btn layui-btn-normal layui-btn-mini">查看详情</a>
										<a href="<?php echo site_url('')?>" class="layui-btn layui-btn-mini">审核</a>
									</td>-->
							</tr>
							<?php } ?>
						</tbody>
					</table>

				</div>
			</fieldset>
			<div class="admin-table-page">
				<div id="page" class="page">
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo base_url(); ?>webroot/TDC_Admin/plugins/layui/layui.js"></script>
		<script>
			layui.config({
				base: 'plugins/layui/modules/'
			});

			layui.use(['icheck', 'laypage','layer'], function() {
				var $ = layui.jquery,
					laypage = layui.laypage,
					layer = parent.layer === undefined ? layui.layer : parent.layer;
				$('input').iCheck({
					checkboxClass: 'icheckbox_flat-green'
				});

				//page
				laypage({
					cont: 'page',
					pages: 25 //总页数
						,
					groups: 5 //连续显示分页数
						,
					jump: function(obj, first) {
						//得到了当前页，用于向服务端请求对应数据
						var curr = obj.curr;
						if(!first) {
							//layer.msg('第 '+ obj.curr +' 页');
						}
					}
				});

				$('#search').on('click', function() {
					parent.layer.alert('你点击了搜索按钮')
				});

				$('#add').on('click', function() {
					$.get('temp/edit-form.html', null, function(form) {
						layer.open({
							type: 1,
							title: '添加表单',
							content: form,
							btn: ['保存', '取消'],
							area: ['600px', '400px'],
							maxmin: true,
							yes: function(index) {
								console.log(index);
							},
							full: function(elem) {
								var win = window.top === window.self ? window : parent.window;
								$(win).on('resize', function() {
									var $this = $(this);
									elem.width($this.width()).height($this.height()).css({
										top: 0,
										left: 0
									});
									elem.children('div.layui-layer-content').height($this.height() - 95);
								});
							}
						});
					});
				});

				$('#import').on('click', function() {
					var that = this;
					var index = layer.tips('只想提示地精准些', that,{tips: [1, 'white']});
					$('#layui-layer'+index).children('div.layui-layer-content').css('color','#000000');
				});

				$('.site-table tbody tr').on('click', function(event) {
					var $this = $(this);
					var $input = $this.children('td').eq(0).find('input');
					$input.on('ifChecked', function(e) {
						$this.css('background-color', '#EEEEEE');
					});
					$input.on('ifUnchecked', function(e) {
						$this.removeAttr('style');
					});
					$input.iCheck('toggle');
				}).find('input').each(function() {
					var $this = $(this);
					$this.on('ifChecked', function(e) {
						$this.parents('tr').css('background-color', '#EEEEEE');
					});
					$this.on('ifUnchecked', function(e) {
						$this.parents('tr').removeAttr('style');
					});
				});
				$('#selected-all').on('ifChanged', function(event) {
					var $input = $('.site-table tbody tr td').find('input');
					$input.iCheck(event.currentTarget.checked ? 'check' : 'uncheck');
				});
			});
		</script>
	</body>

</html>