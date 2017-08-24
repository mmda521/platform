<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
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
          <h5>商品信息导入</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="<?php echo site_url("Export/import");?>" method="post" class="form-horizontal" enctype="multipart/form-data">
            
            <div class="control-group">
              <label class="control-label">导入Excel商品表：</label>
              <div class="controls">
                <input type="file" name="file1" id="file"/>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">导入</button>
            </div>
          </form>
        </div>
		 <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>二维码导出</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="<?php echo site_url("Export/export");?>" method="post" class="form-horizontal">
            
            <div class="control-group">
              <label class="control-label">导出起始号段：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写需要导出的起始号段" name="startNo"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">导出结束号段：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请填写需要导出的结束号段" name="endNo"/>
              </div>
            </div>
            

            <div class="form-actions">
              <button type="submit" class="btn btn-success">导出excel</button>
            </div>
          </form>
        </div>
      </div>
      
</div></div>

<!--<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.min.js"></script> 
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
</script>-->
</body>
</html>
