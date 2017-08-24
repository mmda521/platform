<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Navbar</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">

		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Admin/plugins/layui/css/layui.css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Admin/css/global.css" media="all">
		<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
	</head>

	<body>
		<div style="margin: 15px;">
			<blockquote class="layui-elem-quote">
				<h1>Navbar 组件 (动态渲染)</h1></blockquote>
			<fieldset class="layui-elem-field">
				<legend>演示</legend>
				<div class="layui-field-box">
					<div id="nav" lay-filter="demo"></div>
					<pre class="layui-code">
						//示例代码
						//html
						&lt;div id=&quot;nav&quot; lay-filter=&quot;demo&quot;&gt;&lt;/div&gt;
						//js
						layui.config({
						    base: 'js/'
						}).use('navbar', function() {
						    var navbar = layui.navbar();
						    navbar.set({
						        elem: '#nav',
						        url: 'datas/nav.json'
						    });
						    navbar.render();
						    navbar.on('click(demo)', function(data) {
						        layui.layer.msg(data.field.href);
						    });		
						});
						</pre>
				</div>
			</fieldset>
			<fieldset class="layui-elem-field">
				<legend>参数</legend>
				<div class="layui-field-box">
					<table class="layui-table">
						<thead>
							<tr>
								<th>属性名称</th>
								<th>类型</th>
								<th>默认值</th>
								<th>描述</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="text-align: center;">elem</td>
								<td style="text-align: center;">string/object</td>
								<td style="text-align: center;">undefined</td>
								<td>
									<p>存在组件的容器，支持类名、ID名 和Jquery对象.</p>
									<p>举个栗子：</p>
									<p>1. elem:'.nav'</p>
									<p>2. elem:'#nav'</p>
									<p>3. elem:$('.nav')</p>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">data</td>
								<td style="text-align: center;">object</td>
								<td style="text-align: center;">undefined</td>
								<td>
									<p>提供给组件的数据列表，请严格按照规定格式提供。</p>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">url</td>
								<td style="text-align: center;">string</td>
								<td style="text-align: center;">undefined</td>
								<td>
									<p>提供数据源远程的URL,当前只支持同步的方式读取数据</p>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">type</td>
								<td style="text-align: center;">string</td>
								<td style="text-align: center;">GET</td>
								<td>
									<p>请求的方式，可选参数：GET、POST</p>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">cached</td>
								<td style="text-align: center;">bool</td>
								<td style="text-align: center;">false</td>
								<td>
									<p>是否启用缓存，如果设置为true，则将初始化数据的数据添加至缓存</p>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">spreadOne</td>
								<td style="text-align: center;">bool</td>
								<td style="text-align: center;">false</td>
								<td>
									<p>设置是否只展开一个二级菜单</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</fieldset>
			<fieldset class="layui-elem-field" id="event">
				<legend>Event 事件</legend>
				<div class="layui-field-box">
					<p>语法：navbar.on('event(过滤器值)', callback);</p>
					<table class="layui-table">
						<thead>
							<tr>
								<th>事件</th>
								<th>描述</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>click</td>
								<td>Navbar点击事件,元素被点击后会触发</td>
							</tr>
						</tbody>
					</table>
					<p>举个栗子：</p>
					<p>
						<pre class="layui-code">
						navbar.on('click(side)', function(data) {
						    //Do something...
						    //data参数说明
						    //包含两个属性：data.elem 和 data.field
						    //data.elem 是点击的a标签dom对象
						    //data.field 包含三个属性
						    //1、data.field.href  设置的连接地址
						    //2、data.field.icon  设置的图标
						    //3、data.field.title 设置的标题
					     console.log(data.elem);
					     console.log(data.field.title);
					     console.log(data.field.icon);
					     console.log(data.field.href);
						});
						</pre>
					</p>
				</div>
			</fieldset>
			<fieldset class="layui-elem-field">
				<legend>方法</legend>
				<div class="layui-field-box">
					<table class="layui-table">
						<thead>
							<tr>
								<th>名称</th>
								<th>参数说明</th>
								<th>描述</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="text-align: center;">set</td>
								<td style="text-align: center;">
									<p>参数名：options</p>
									<p>类型：object</p>
									<p>属性类型：参考属性说明</p>
								</td>
								<td>
									如果组件在初始化时没有设置参数，那么该方法必须在调用render方法前调用
									<p>举个栗子：</p>
									<p>
										<pre class="layui-code">
										//栗子一
										layui.config({
										    base:'js/'
										}).use('navbar',function(){
										    var navbar = layui.navbar({
										        elem: '#nav',
										        url: 'datas/nav.json'
										    });
										    //这是调用navbar组件初始化的情况，如果设置了参数，那么可以直接使用render方法渲染
										    navbar.render();
										    //Do something...
										});
										//栗子二
										layui.config({
										    base:'js/'
										}).use('navbar',function(){
										    var navbar = layui.navbar();
										    //navbar组件没有被初始化的情况，需要调用set方法设置一些参数
										    navbar.set({
										        elem: '#nav',
										        url: 'datas/nav.json'
										    });
										    navbar.render();
										    //Do something...
										});
										</pre>
									</p>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">render</td>
								<td style="text-align: center;">
									无
								</td>
								<td>
									<p>渲染出navbar导航栏</p>
									<p>
										<pre class="layui-code">
										//调用之前需要设置一些参数，参考set的方法说明
										navbar.render();
										</pre>
									</p>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">cleanCached</td>
								<td style="text-align: center;">
									无
								</td>
								<td>
									<p>清除缓存</p>
									<p>
										<pre class="layui-code">
										//清除缓存方式的其中一种，还有一种是将参数cached设置为false，也会自动清除缓存
										//栗子
										navbar.cleanCached();
										</pre>
									</p>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">on</td>
								<td style="text-align: center;">
									<p>参数一：events --- 说明：事件名 -- 类型：String</p>
									<p>参数二：callback --- 说明：架设函数 -- 类型：Function</p>
								</td>
								<td>
									<p>调用此方法绑定事件，具体栗子请参考
										<a href="#event">事件</a>文档</p>
									<p>
										<pre class="layui-code">语法：navbar.on('event(过滤器值)', callback);</pre>
									</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</fieldset>
			<fieldset class="layui-elem-field">
				<legend>数据结构</legend>
				<div class="layui-field-box">
					<p>请严格按照以下数据结构设置数据</p>
					<pre class="layui-code">
						//数据结构
						[
						    {
						        "title": "这是动态渲染的", //标题
						        "icon": "&#x1002;",       //图标，支持layui-icon 和 font-awesome
						        "href": "",               //跳转的地址，如果有字节点，该地址将无效
						        "spread":true,            //默认展开
						        "children": [             //子项 
						            {
						                "title": "表单",
						                "icon": "&#xe62a;",
						                "href": "form.html"
						            }
						            //...
						        ]   
						    }, {
						        "title": "地址本",
						        "icon": "fa-address-book",
						        "href": "",
						        "spread":false,
						        "children": [
						            {
						                "title": "Github",
						                "icon": "fa-github",
						                "href": "https://www.github.com/"
						            },
						            {
						                "title": "QQ",
						                "icon": "fa-qq",
						                "href": "http://www.qq.com/"
						            },
						            {
						                "title": "Fly社区",
						                "icon": "&#xe609;",
						                "href": "http://fly.layui.com/"
						            }
						            //...
						        ] 
						    }, {
						        "title": "33333",
						        "icon": "",
						        "href": "",		
						        "spread":false
						    }
						]
				</pre>
				</div>
			</fieldset>
		</div>
		<script type="text/javascript" src="<?php echo base_url(); ?>webroot/TDC_Admin/plugins/layui/layui.js"></script>
		<script>
			layui.config({
				base: 'js/'
			}).use(['navbar', 'code'], function() {
				var navbar = layui.navbar(),
					layer = parent.layer === undefined ? layui.layer : parent.layer,
					$ = layui.jquery;
				layui.code();
				navbar.set({
					elem: '#nav',
					url: 'datas/nav.json',
					cached: true
				});
				navbar.render();
				navbar.on('click(demo)', function(data) {
					console.log(data.elem);
					console.log(data.field.title);
					console.log(data.field.icon);
					console.log(data.field.href);
					layer.msg(data.field.href);
				});
			});
		</script>
	</body>

</html>