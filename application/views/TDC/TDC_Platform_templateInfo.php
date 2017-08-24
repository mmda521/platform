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
<!--<link href="<?php echo base_url(); ?>webroot/TDC_Platform/font-awesome/css/font-awesome.css" rel="stylesheet" />-->
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
            <h5>模板表格</h5>
          </div>
          <div class="widget-content nopadding"> 
            <table class="table table-bordered data-table">
              
              <tbody>
              <?php
			   //$i=1;
			   if(isset($info)&&!empty($info))
			   {
               	 foreach ($info as $fields)
               	 {
					 
                  // echo $fields['Id'];
                	//表格显示
				    echo "<tr class=\"gradeA\"><td width='10%'>模板".$fields['field_Id']."</td>";
					 foreach ($fields as $k => $value )
					  {
						if($k==='field_Id')
						{
							continue;
						}
						echo "<td width='10%'>".$value."</td>";
                      }	
					 
					echo
					"  <td>
							<a href=\"templateUpdate?tpid=".$fields['field_Id']."\"  style=\"color:blue\">编辑模板</a>
							<!--<a href=\"templateDelete?tpid=".$fields['field_Id']."\"  style=\"color:blue\" onclick=\"javascript:if(confirm('确定要删除此信息吗？')){alert('删除成功！');return true;}return false;\">删除</a>-->
					   </td>
					</tr>";
					//$i++;
				  }
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
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.tables.js"></script>
</body>
</html>
