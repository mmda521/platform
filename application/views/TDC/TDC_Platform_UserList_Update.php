<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/matrix-style2.css" />
<link href="<?php echo base_url(); ?>webroot/TDC_Platform/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>webroot/TDC_Platform/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/datepicker.css" />
<style>
	.control-group .controls label{
		display:inline-block;
	}

</style>
 <script type="text/javascript" src="<?php echo base_url();?>/webroot/TDC_Platform/js/DatePicker.js"></script>
 
</head>
<body>

<div id="content">
  <div id="content-header">
      <h1>管理员列表</h1>
  </div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>管理员信息编辑</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="<?php echo site_url('Limit/admin_do_update'); ?>" method="post" class="form-horizontal">
           <div class="control-group">
              <label class="control-label">登录名:</label>
              <div class="controls">
			  <?php if(isset($info)) echo $info['User_Id']?>               
              </div>
            </div>
			 <input type="hidden" class="span11" value="<?php if(isset($info)) echo $info['TDC_id']?>" name="TDC_id"/>
			 <div class="control-group">
              <label class="control-label">权限组:</label>
              <div class="controls">
                <select name="limit_group">
               <?php
                    foreach ($data as $key => $value) 
                    {
						if($data[$key]['Role_id']==$info['User_role'])
						{ ?>
							<option selected="selected" value="<?php echo $data[$key]['Role_id'];?>"><?php echo $data[$key]['Role_name'];?></option>
						 <?php }
                        else
						{
							?>
							<option value="<?php echo $data[$key]['Role_id'];?>"><?php echo $data[$key]['Role_name'];?></option>
						 <?php 
					    }
                    }
              ?>
                </select>
              </div>
            </div>
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
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.form_common.js"></script> 


</body>
</html>
