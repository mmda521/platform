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
<link href="<?php echo base_url(); ?>webroot/TDC_Platform/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.useso.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
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
                  <th>二维码序列号</th>
                  <th>激活状态</th>
                  <th>防伪码</th>
                  <th>防伪码查询次数</th>
 				  <th>防伪码首次查询时间</th>
                  <!--
                  <th>商品名称</th>
                  <th>商品编号</th>
                  <th>所属商家</th>
                  <th></th>                  
                  -->


                </tr>
              </thead>
              <tbody>
              <?php
			  	 $query = $this->db->query('SELECT * FROM  tdc_master');
				 foreach ($query->result_array() as $row)
				{
					/*//商品名称
					$itemid = $row['TDC_ItemID_Ref'];
					$queryItem = $this->db->query("SELECT * FROM  tdc_gt_iteminfo where TDC_GT_ItemID=$itemid");
					$rowItem = $queryItem->row_array();
					$ItemName = $rowItem['TDC_GT_ItemName'];
					
					//商品编号
					$ItemNo = $rowItem['TDC_GT_ItemNo'];
					
					//所属商家
					$shopid = $rowItem['TDC_GT_ShopID_Ref'];
					$queryShop = $this->db->query("select TDC_SellerName from tdc_shopinfo where TDC_ShopID=$shopid");
					$rowShop = $queryShop->row_array();
					$ShopName = $rowShop['TDC_SellerName'];
					*/
					//表格显示
				    echo 
					"
					<tr class=\"gradeA\">               
						<td>".$row['TDC_No']."</td>					<!--序列号-->
						<td>".$row['TDC_Active']."</td>				<!--激活状态-->					
						<td>".$row['TDC_FWID']."</td>				<!--防伪码-->
						<td>".$row['TDC_Count']."</td>				<!--防伪码查询次数-->
						<td>".$row['TDC_FWTime']."</td>				<!--防伪码首次查询时间-->					
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
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.js"></script> 
<script src="<?php echo base_url(); ?>webroot/TDC_Platform/js/matrix.tables.js"></script>
</body>
</html>
