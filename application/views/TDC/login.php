<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Matrix Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/matrix-login.css" />
    <link href="<?php echo base_url(); ?>webroot/TDC_Platform/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<!--<link href='http://fonts.useso.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->
    <style type="text/css">
        input{
            font-family: "Microsoft Yahei";
        }
        .control-label{
            color: #333;
            padding-left: 24px;
        }
    </style>
</head>
<body>
    <div style="color:#fff;font-size:18px;float:right;position:absolute;left:1050px;top:15px">还没账号 ? <a href="<?php echo site_url("Login/register");?>">立即注册</a></div>
	<div id="loginbox">  
        <div class="control-group normal_text"> 
            <h2 style="color:#333;font-size:28px;">信息管理系统平台</h2>
            <span style="font-size:14px;color:gray;"></span>
        </div>          
        <form id="loginform" class="form-vertical" method="POST" action="<?php echo site_url("Login/login_result");?>">
            <div class="control-group">
                <label class="control-label">登陆账号</label>
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user" style="font-size:16px;"></i></span>
                        <input required type="text" name="username"/>
                    </div>
                </div>
            </div>
            <div class="control-group2">
                <label class="control-label">登陆密码</label>
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock" style="font-size:16px;"></i></span>
                        <input required type="password" name="userpw"/>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">忘记密码？</a></span>
                <!--
                <span class="pull-right"><input type="button" id="checkBtn" onClick="checkLogin()" class="btn btn-success" style="width:335px;" value=" 登&nbsp;&nbsp;&nbsp;&nbsp;录"/></span>
            	-->
            	<button type="submit" class="btn btn-success" style="width:285px;margin-left: 15px;">登&nbsp;&nbsp;&nbsp;&nbsp;录</button>
            </div>
            <div class="control-group normal_text" style="border-top: 1px solid #333;">
                <div style="font-size:14px;color:#333;">中浩信息科技中心版权所有</div>
                
            </div>
        </form>
        

        <form id="recoverform" action="#" class="form-vertical" style="padding-top:10px;">
            <label class="control-label">登陆账号</label>
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user" style="font-size:16px;"></i></span><input type="text" name="re_username" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">新密码</label>
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock" style="font-size:16px;"></i></span><input type="password" name="re_password"/>
                    </div>
                </div>
            </div>
            <div class="control-group" style="padding-top:0px;">
                <label class="control-label">确认新密码</label>
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock" style="font-size:16px;"></i></span><input type="password" name="re_confirmpassword" />
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <span class="pull-left"><a href="<?php echo site_url("tdc/show")?>" class="flip-link btn btn-success" id="to-login">&laquo; 返回登录</a></span>
                <span class="pull-right"><a id="changePwd" class="btn btn-info" style="width:270px;">重置密码</a></span>
            </div>
            <div class="control-group normal_text">
                <div style="font-size:14px;color:gray;">推荐使用webkit内核浏览器，如chrome等</div>
            </div>
        </form>

    </div>
    
    <script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.min.js"></script>  
    <script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.login.js"></script> 
</body>

</html>
