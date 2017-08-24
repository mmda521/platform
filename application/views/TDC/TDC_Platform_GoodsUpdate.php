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
</head>
<body>

<div id="content">
  <div id="content-header">
      <h1>商品信息管理</h1>
  </div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>商品信息提交</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="<?php echo site_url("Goods_add/do_update");?>" method="post" class="form-horizontal">
           <input type="hidden" class="span11"  name="goods_Id" value="<?php echo $goods_Id;?>"/>
           <?php 
		   if(isset($field)&&!empty($field)&&isset($goods_data)&&!empty($goods_data))
		   {
			 foreach ($field as $k=>$value)  
			 {?>
				 <div class="control-group">
              <label class="control-label"><?php echo $value;?>：</label>
              <div class="controls">
                <input type="text" class="span11"  name="goodsName[]" value="<?php echo $goods_data[$k]?>"/>
                
              </div>
            </div> 
			<?php }
		   }
		   ?>
           
            <div class="form-actions">
              <button type="submit" class="btn btn-success">提交</button>
            </div>
 
          </form>
        </div>
      </div>
    </div>
   </div>
  </div>
</div>
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
