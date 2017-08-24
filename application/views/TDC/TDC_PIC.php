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
      <h1>二维码展示</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
           <form action="<?php echo site_url("Qr_Code/do_qr_pic");?>" method="post">
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
			if(isset($info))
		{
           
			foreach ($info as $key => $value) 
		  {
             if ($value['TDC_TYPE'] == '1')
		   {
            echo "
              <li> <a> 
              
              <img  src=\"http://s.jiathis.com/qrcode.php?url=http://bn15897782.imwork.net/TDC/index.php/Qr_Code/qr_show?tdcno=".$value['encrypt']."\" alt=\"\" 
              style=\"position:relative;left:155px;top:8px;width:120px;\" 

              >
              <img src=\"http://bn15897782.imwork.net/TDC/index.php/webroot/TDC_Mobile/images/a11.png\"  />.
              </a>
           		   <br>
				   <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				   序列号：&nbsp;&nbsp;&nbsp;".$value['TDC_No']."</a>
				   </br>
				   <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				   </a>
              </li>

              ";
          }
            else if($value['TDC_TYPE'] == '2')
		  {

			echo "
			<li> <a> 
              
              <img  src=\"http://s.jiathis.com/qrcode.php?url=http://bn15897782.imwork.net/TDC/index.php/Qr_Code/qr_show?tdcno=".$value['encrypt']."\" alt=\"\" 
              style=\"position:relative;left:155px;top:-8px;width:85px;\" 

              >
              <img src=\"http://bn15897782.imwork.net/TDC/index.php/webroot/TDC_Mobile/images/a22.png\"    />.
              </a>
           		   <br>
				   <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   
				   序列号：&nbsp;&nbsp;&nbsp;".$value['TDC_No']."</a>
				   </br>
				   <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   </a>
              </li>
              ";

          }
         }
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
