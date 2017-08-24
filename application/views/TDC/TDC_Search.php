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
      <h1>二维码查询</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
           <form action="<?php echo site_url("Qr_Code/do_search_active");?>" method="post">
              		<div class="controls" >
                	<input type="text"  placeholder="起始号段" name="startNum"/>
                    <input type="text"  placeholder="结束号段" name="endNum"/>
                    &nbsp;
                     &nbsp;
                      &nbsp;
                    <button type="submit" style="width:100px;height:30px;">查询</button>
              		</div>
          </form>
          <div class="widget-content" style="position: relative;">
            <ul class="thumbnails">
           
            <?php 
			/* if(isset($_POST["startNum"])&&isset($_POST["endNum"]))
			{   
				$startNum=$_POST["startNum"];
				$endNum=$_POST["endNum"];
				setcookie('start',"$startNum");
				setcookie('end',"$endNum");
				$sql="select count(TDC_No)as TotalNum from tdc_master where TDC_No>=$startNum and TDC_No<=$endNum ";
				$query = $this->db->query($sql);
				$row = $query->row();	
     				//$abc='count(TDC_No)';					
				echo '<p>此号段共生成了'.($row->TotalNum).'二维码</p>';
				
				$sql1="select count(TDC_Active)as ActivateNum from tdc_master where TDC_No>=$startNum and TDC_No<=$endNum and TDC_Active='Y'";
				$query=$this->db->query($sql1);
				$row=$query->row();
				echo '<p>此号段的二维码已激活'.($row->ActivateNum).'个&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="TDC_details1">查看明细</p>';
				
				$sql2="select count(TDC_Active)as NoActivateNum from tdc_master where TDC_No>=$startNum and TDC_No<=$endNum and TDC_Active='N'";
				$query=$this->db->query($sql2);
				$row=$query->row();
				echo '<p>此号段的二维码未激活'.($row->NoActivateNum).'个&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="TDC_details2">查看明细</p>';								
			} */
			if(isset($total))
			{
			    echo '<p>此号段共生成了'.$total.'二维码</p>';	
			}
			if(isset($active))
			{
				echo "<p>此号段的二维码已激活".$active."个&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=details1?startNum=".$startNum."&&endNum=".$endNum.">查看明细</p>";
			}
			if(isset($noactive))
			{
				echo '<p>此号段的二维码未激活'.$noactive.'个&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=details2?startNum='.$startNum.'&&endNum='.$endNum.'>查看明细</p>';	
			}
            ?>
           
           </ul>
		  </div>
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
