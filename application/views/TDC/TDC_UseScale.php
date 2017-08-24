<?php
/* session_start();
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    echo "登录成功：".$_SESSION['user'];
}else{
    echo "你还没有登录，<a href='login'>请登录</a>";
    exit();
} */
?>
<?php set_time_limit(120);?>
<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
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
<div class="container-fluid">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
            <h5>二维码使用比例情况</h5>
          </div>
          <div class="widget-content">
            <ul class="unstyled">
              <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span><?php echo $c.'%'; ?> <span class="pull-right strong"><?php echo '二维码总共'.$a.'个,已激活'.$a1.'个,未激活'.$a2.'个'; ?></span>
                <div class="progress progress-striped ">
                  <div style="width: <?php echo $c.'%'; ?>;" class="bar"></div>
                </div>
              </li>
              <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span><?php echo $c1.'%'; ?><span class="pull-right strong"><?php echo '方形码总共'.$a3.'个,已激活'.$a4.'个,未激活'.$a5.'个'; ?></span>
                <div class="progress progress-success progress-striped ">
                  <div style="width: <?php echo $c1.'%'; ?>;" class="bar"></div>
                </div>
              </li>
              <li> <span class="icon24 icomoon-icon-arrow-down-2 red"></span><?php echo $c2.'%'; ?> <span class="pull-right strong"><?php echo '圆形码总共'.$a6.'个,已激活'.$a7.'个,未激活'.$a8.'个'; ?></span>
                <div class="progress progress-warning progress-striped ">
                  <div style="width: <?php echo $c2.'%'; ?>;" class="bar"></div>
                </div>
              </li>              
            </ul>
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
