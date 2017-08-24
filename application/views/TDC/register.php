<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Matrix Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/matrix-login.css" />
	 <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/window.css" />
    <link href="<?php echo base_url(); ?>webroot/TDC_Platform/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!--<link href='http://fonts.useso.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->
     <script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery-1.8.1.min.js"></script>  

	<style type="text/css">
        input{
            font-family: "Microsoft Yahei";
        }
        .control-label{
            color: #333;
            padding-left: 4px;
        }
    </style>
	 <script type="text/javascript">
function check()
{
    
    var username = document.getElementById('username').value;
    var userpw = document.getElementById('userpw').value;
    
    var myReg1 = /^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){4,19}$/;//5-20个以字母开头、可带数字、“_”、“.”的字串
    var myReg2 = /^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){4,19}$/;//5-20个以字母开头、可带数字、“_”、“.”的字串
    var username_prompt = '请正确输入账号信息！';
    var userpw_prompt = '请正确输入密码！';

    if(myReg2.test(username) && myReg1.test(userpw))
    {
		document.getElementById('myspan1').innerText = '';
		document.getElementById('myspan2').innerText = '';
        return true;
    }
    else if(!myReg2.test(username))
    {
        document.getElementById('myspan1').innerText = username_prompt;
		document.getElementById('myspan2').innerText = '';
        return false;
    }
    else if(!myReg1.test(userpw))    
    {
        document.getElementById('myspan2').innerText = userpw_prompt;
		document.getElementById('myspan1').innerText = '';
        return false;
    }
    else
    {
        return false;
    }
}
</script>
</head>
<body>
<!-- <div id="fade" class="black_overlay"></div>
<div id="batch" class="dialog1" >
<div class="dialog_content"> <span class="del_right" onclick="CloseDiv('batch','fade')" >×</span> </div>
<div class="center">
<div class="canshu" id="chuanzhi"></div>
<input type="button" value="取消"  id="close1" class="btn btn-success"/>
</div>
</div> -->
<div id="loginbox">
       <div class="control-group normal_text"> 
            <h2 style="color:#333;font-size:28px;">企业用户注册</h2>
            <span style="font-size:14px;color:gray;"></span>
        </div> 
          <form action="<?php echo site_url('Login/do_register');?>" method="post" class="form-horizontal" onsubmit="return check();">
            <div class="control-group">
                <label class="control-label">企业账号</label>
                <div class="controls">
                    <div class="main_input_box">
                        <input type="text" class="span11" placeholder="5-20个以字母开头、可带数字、“_”、“.”" name="username" id="username" style="width: 85%;margin-left: -80px;"/>
                        <div id="myspan1" style="text-size:18pt;color:red;text-align:left;"></div>
                    </div>
                </div>
            </div>
            <div class="control-group2">
                <label class="control-label">企业密码</label>
                <div class="controls">
                    <div class="main_input_box">             
                        <input type="text" class="span11" placeholder="5-20个以字母开头、可带数字、“_”、“.”" name="userpw" id="userpw"  style="width: 85%;margin-left: -80px;"/>
                         <div id="myspan2" style="text-size:18pt;color:red;text-align:left;"></div>
					</div>
                </div>
            </div>
          
            <div class="form-actions">
              <!--<button type="submit" class="btn btn-success">下一步</button>-->
              	  <span ><a href="<?php echo site_url("tdc/show")?>" class="flip-link btn btn-success" id="to-login">&laquo; 返回登录</a></span>
              &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success" style="width:100px;">下一步</button>
		
            </div>
           
          </form>
        </div>
</body>

</html>