<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/matrix-style2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/TDC_Platform/css/matrix-media.css" />
<link href="<?php echo base_url(); ?>webroot/TDC_Platform/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!--<link href='http://fonts.useso.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->
</head>
<body>

<div id="content">
  <div id="content-header">
      <h1>二维码使用明细</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
           <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding"> 
            <table class="table table-bordered data-table">           
              <thead>
                <tr>
                  <th>二维码序列号</th>
                  <th>二维码激活状态</th>               
                </tr>
              </thead>
              <tbody>
            <?php 
			/* $a=$_COOKIE['start'];
			$b=$_COOKIE['end'];
			$sql="select TDC_No,TDC_Active from tdc_master where TDC_No>=$a and TDC_No<=$b and TDC_Active='Y'";
			$query=$this->db->query($sql);
			foreach ($query->result_array() as $row)
			{
				echo " <tr class=\"gradeA\">
				 <td width=\"25%\">".$row['TDC_No']."</td>
				 <td width=\"25%\">".$row['TDC_Active']."</td>
				       </tr>  ";		
			}				 */
			if(isset($info))
			{
				foreach($info as $key=>$value)
				{
					echo " <tr class=\"gradeA\">
				 <td width=\"25%\">".$value['TDC_No']."</td>
				 <td width=\"25%\">".$value['TDC_Active']."</td>
				       </tr>  ";
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
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.js"></script>
</body>
</html>
