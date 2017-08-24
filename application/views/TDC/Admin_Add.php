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
</style>
<script type="text/javascript">
// function checkPsw()
// {
	// var password = document.getElementById('password').value;
	// var password1 = document.getElementById('password1').value;
	// var userpw_prompt = '请正确输入密码！';
	// if(password==password1)
	// {
		// document.getElementById('myspan1').innerText = '';
		// return true;
	// }
	// else
	// {
		 // document.getElementById('myspan1').innerText = userpw_prompt;
	// }
// }


</script>
</head>
<body>

<div id="content">
  <div id="content-header">
      <h1>管理员管理</h1>
  </div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>添加管理员</h5>
        </div>
        <div class="widget-content nopadding">
          <form  method="post" class="form-horizontal" action="<?php echo site_url("Limit/admin_do_add");?>">            

		   <div class="control-group">
              <label class="control-label">登录名：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写登录名" autocomplete="off" name="username1" id="username1"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">密码：</label>
              <div class="controls">
                <input type="password" class="span11" placeholder="请填写密码" autocomplete="off" name="password1" id="password1"/>
              </div>
            </div>
			<!--  <div class="control-group">
              <label class="control-label">确认密码：</label>
              <div class="controls">
                <input type="password" class="span11" placeholder="请再次确认密码" name="password1" id="password1" onblur="checkPsw();"/>
             <div id="myspan1" style="text-size:18pt;color:red;text-align:left;"></div>
			 </div>
            </div> -->
           <div class="control-group">
              <label class="control-label">权限组</label>
              <div class="controls">
                <select name="limit_name" id="limit_name">
                 <option value="">--请选择--</option>
				 <?php
				 if(isset($info))
				 {
					 foreach ($info as $key => $value)
					 {
					 ?>			 
					 <option value="<?php echo $value['Role_id'];?>"><?php echo $value['Role_name'];?></option> 
					 <?php 
					}
										 
				 }
				 ?>
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
   </div></div>   
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
