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


 

       
          <form action="<?php echo site_url('Goods_add/do_getdata'); ?>" method="post" class="form-horizontal">
          <input type="text" name="data[]" class="datepicker"/>                     
          </form>



<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/bootstrap-colorpicker.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/bootstrap-datepicker.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.form_common.js"></script> 



<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
