<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/matrix-style2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/matrix-media.css" />
<!--<link href="../../../webroot/TDC_Platform/font-awesome/css/font-awesome.css" rel="stylesheet" />-->
</head>
<body>

<div id="content">
  <div id="content-header">
      <h1>表格</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding"> 
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                 <!-- <th>帐号</th>
                  <th>用户密码</th>-->
                  <th>企业名称</th>
                  <th>企业LOGO</th>
 				  <th>企业类型</th>
                  <th>联系人</th>
                  <th>联系电话</th>
                  <th>邮箱</th>
 				  <th>操作</th>    
						 <!--<th>注册日期</th>-->
                </tr>
              </thead>
              <tbody>
              <?php
              if (is_array($info)&&isset($info)&&!empty($info)) 
			  {
                      $CompanyLogo = img($info['CompanyLogo']);
                	//表格显示
				    echo 
					"
					<tr class=\"gradeA\">
						<!--<td width=\"10%\">".$info['User_Id']."</td>               
						<td>".$info['User_Password']."</td>	-->		<!--用户密码-->
						<td>".$info['CompanyName']."</td>					<!--企业名称-->
						<td>".$CompanyLogo."</td> 					<!--企业LOGO-->
						<td>".$info['CompanyType']."</td>	              <!--企业类型--> 	
						<td>".$info['ContactPerson']."</td>	<!--联系人-->
						<td>".$info['PhoneNumber']."</td>	<!--联系电话-->
						<td>".$info['Email']."</td>	<!--邮箱-->
						<td>
							<a href=\"UserUpdate?tdcid=".$info['TDC_id']."\"  style=\"color:blue\">编辑</a>  
							</td>						
					</tr>
					";
		      }
            ?>
              
                 
              </tbody>
            </table>
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
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.tables.js"></script>
</body>
</html>
