<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>登录</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Admin/plugins/layui/css/layui.css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Admin/css/login.css" />
	</head>

	<body class="beg-login-bg">
		<div class="beg-login-box">
			<header>
				<h1>后台登录</h1>
			</header>
			<div class="beg-login-main">
				<form action="<?php echo site_url('Admin/do_login');?>" class="layui-form" method="post">
					<div class="layui-form-item">
						<label class="beg-login-icon">
                        <i class="layui-icon">&#xe612;</i>
                    </label>
						<input type="text" name="userName" lay-verify="userName" autocomplete="off" placeholder="这里输入登录名" class="layui-input">
					</div>
					<div class="layui-form-item">
						<label class="beg-login-icon">
                        <i class="layui-icon">&#xe642;</i>
                    </label>
						<input type="password" name="password" lay-verify="password" autocomplete="off" placeholder="这里输入密码" class="layui-input">
					</div>
					<div class="layui-form-item">
						<div class="beg-pull-left beg-login-remember">
							<label>记住帐号？</label>
							<input type="checkbox" name="rememberMe" value="true" lay-skin="switch" checked title="记住帐号">
						</div>
						<div class="beg-pull-right">
							<button class="layui-btn layui-btn-primary" lay-submit lay-filter="login">
                            <i class="layui-icon">&#xe650;</i> 登录
                        </button>
						</div>
						<div class="beg-clear"></div>
					</div>
				</form>
			</div>
			<footer>
				<p>管理员 © </p>
			</footer>
		</div>
		<script type="text/javascript" src="<?php echo base_url(); ?>webroot/TDC_Admin/plugins/layui/layui.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>webroot/TDC_Admin/js/index.js"></script>
		<script>
						layui.use(['layer','validator', 'form'], function() {
				var layer = layui.layer,
					$ = layui.jquery,
					form = layui.form();
					validator = layui.validator,
					form.verify({
						userName:function(value){
							if(!validator.IsNotEmpty(value)){
								return '用户名不能为空！';
							}
						},
						password:function(value){
							if(!validator.IsNotEmpty(value)){
								return '密码不能为空！';
							}
						}
					})
					
				// form.on('submit(login)',function(data){
					
					// location.href="<?php echo site_url('Admin/do_login');?>";
					// return false;
				// });
				//form.render();
			});
		</script>
	</body>

</html>