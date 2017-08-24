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
	#content-header h1 {
        	height: 58px;
        	font-size:25px;
        }
</style>
<script type="text/javascript">
function check()
{
	
	var phoneNumber = document.getElementById('phoneNumber').value;
	var email = document.getElementById('email').value;
	//_\- 就是表示下划线字符'_'和连字符'-'
	// 当连字符'-'出现在中括号末尾时,可以不必在前面加反斜杠'\'转义
	//var myReg  = /^[a-zA-Z0-9_-]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/;    //表示由数字,字母,下划线_,连字符'-'组成的字符串
	var myReg1 = /^([a-zA-Z0-9_-]+)@(([a-zA-Z0-9_-]+)(\.[a-zA-Z0-9_-]+)+)/;
	var myReg2 = /^1(3|4|5|7|8)\d{9}$/;
	var email_prompt = '请正确输入邮箱格式！';
	var phoneNumber_prompt = '请正确输入电话号码！';
	//alert(myReg2.test(phoneNumber));
	if(myReg2.test(phoneNumber) && myReg1.test(email))
	{
		document.getElementById('myspan1').innerText = '';
		document.getElementById('myspan2').innerText = '';
		return true;
	}
	else if(!myReg2.test(phoneNumber))
	{
		document.getElementById('myspan1').innerText = phoneNumber_prompt;
		document.getElementById('myspan2').innerText = '';
		return false;
	}
	else if(!myReg1.test(email))	
	{
		document.getElementById('myspan2').innerText = email_prompt;
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

<div id="content" style="position:relationtive;">
  <div id="content-header">
      <h1>企业注册信息</h1>
      <span style="position: absolute;right: 20px;font-size:18px;">已有账号 ? <a href="<?php echo site_url("tdc/show");?>">请登录</a></span>
  </div>
<div class="container-fluid">
  <div class="row-fluid"  style="width: 100%;">
    <div class="span6" style="width: 100%;">
      <div class="widget-box"  style="width: 655px;">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>信息提交</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="<?php echo site_url('Login/do_register_next'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data" onsubmit="return check();">
            
            <div class="control-group">
              <label class="control-label">企业名称：</label>
              <div class="controls">
                <input type="text" class="span11" required="required" placeholder="请填写企业名称" name="companyName"/>
				 <input type="hidden" class="span11" name="tdcid" value="<?php if(isset($data)) echo $data;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">企业logo：</label>
              <div class="controls">
			  <font style="letter-spacing:1px" color="#FF0000">*只允许上传jpg|png|pjpeg|gif格式的图片</font><br/>
                <input type="file" class="span11" name="file_logo"/>
              </div>
            </div>
			 <div class="control-group">
              <label class="control-label">企业资质：</label>
              <div class="controls">
			  <font style="letter-spacing:1px" color="#FF0000">*只允许上传jpg|png|pjpeg|gif格式的图片</font><br/>
                <input type="file" class="span11" name="file_zizhi"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">企业类型</label>
              <div class="controls">
                <select name="companyType">
              <option value="">请选择</option>
			  <option value="1">农产品</option>
			  <option value="2">家禽类</option>
			  <option value="3">养殖类</option>
			  <option value="4">预包装</option>
			  <option value="5">种植类</option>
			  <option value="6">生产加工型企业</option>
			  <option value="7">跨境电商企业</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">联系人</label>
              <div class="controls">
                <input type="text" required="required" class="span11" placeholder="请填写联系人" name="contactPerson"/>
              </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">联系电话</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写联系电话" name="phoneNumber" id="phoneNumber"/><div id="myspan1" style="text-size:18pt;color:red;text-align:left;"></div>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">邮箱</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写邮箱" name="email" id="email"/><div id="myspan2" style="text-size:18pt;color:red;text-align:left;"></div>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-success">注册</button>
            </div>
           
            
          </form>
        </div>
      </div>
      
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
