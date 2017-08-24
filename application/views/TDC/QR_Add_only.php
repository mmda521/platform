<?php set_time_limit(0);?>
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
     <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/window.css" />
<style>
	.control-group .controls label{
		display:inline-block;
	}
</style>

</head>
<body>
<div id="content">
  <div id="content-header">
      <h1>二维码管理</h1>
  </div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>二维码生成</h5>
        </div>
        <div class="widget-content nopadding">
          <form  method="post" class="form-horizontal" action="<?php echo site_url('Qr_Code/do_qr_add_only');?>">
            <div class="control-group">
              <label class="control-label">生成数量</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写需要生成的二维码数量" name="qr_num" id="qr_num"/>
              </div>
            </div>  
            <div class="control-group">
              <label class="control-label">二维码类型</label>
              <div class="controls " >
                <select name="qrtype" id="qrtype">
                  <option value="1">方形码</option>
                  <option value="2">圆形码</option>
                </select>
              </div>
            </div>
			 <div class="control-group">
              <label class="control-label">功能分类</label>
              <div class="controls">
                <select name="functiontype" id="functiontype">
              
               <option value="1">防伪溯源码</option>
               <option value="2">溯源码</option>
               <option value="3">防伪码</option>
                </select>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">生成</button>
            </div> 
          </form>
      </div>
     </div>
   </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.form_common.js"></script> 

</body>
</html>
