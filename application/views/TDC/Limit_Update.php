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
      <h1>权限管理</h1>
  </div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6" style="width: 100%;">
      <div class="widget-box" id="hh">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>权限组编辑</h5>
        </div>
        <div class="widget-content nopadding">
          <form  method="post" class="form-horizontal" action="<?php echo site_url("Limit/Limit_do_update");?>">
		  <input type="hidden" value="<?php if(isset($Role_id)) echo $Role_id; ?>" name="Role_id"/>
            <table class="table table-bordered data-table">
				 <?php
					if(isset($info) && $info){
						foreach($info as $k=>$v) {?>
							<tr><td><input type="checkbox" name="role[]" value="<?php echo $v['id'];?>"<?php if(in_array($v['id'],$role)){echo "checked";}?>> <?php echo $v['menu'];?></td></tr>
							<?php foreach($v['items'] as $t_k=>$t_v) {?>
							<tr><td><input type="checkbox" name="role[]" value="<?php echo $t_v['id'];?>"<?php if(in_array($t_v['id'],$role)){echo "checked";}?>> <?php echo $t_v['menu'];?></td>
								<td><?php foreach($t_v['items'] as $three_key=>$three_val) {?>
									<input type="checkbox" name="role[]" value="<?php echo $three_val['id'];?>"<?php if(in_array($three_val['id'],$role)){echo "checked";}?>> <?php echo $three_val['menu'];?>
					   <?php }?></td></tr>
						   <?php }
						}
					}?>

				<tr >
					<td colspan="2" style="text-align: right;">
						<input type="submit" value="提&nbsp;交" class="btn btn-success">
					</td>
				</tr>
			</table>
         
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
