
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<title>郑州国际陆港信息数码防伪验证中心</title>
  <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script language="javascript" type="text/javascript" src="jquery-1.4.2.js"></script>

<script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $("#btnQuery").click(function() {

                var $FwCode = $("#FwCode");

                var $CheckResult = $("#ReturnResult");

                var RegNumber = /^[0-9]*[1-9][0-9]*$/;
                var flag = false;



                $CheckResult.html("");


                if ($FwCode.val().length == 0) {

                    $CheckResult.html("防伪码不能为空");

                    $FwCode.focus();

                    return false;

                }

                else if ($FwCode.val().length < 10) {

                   $CheckResult.html("防伪码长度不能少于10位");
		 
                    $FwCode.focus();

                    return false;

                }

                else if ($FwCode.val().length > 24) {

                    $CheckResult.html("防伪码长度不能大于24位");

                    $FwCode.focus();

                    return false;

                }

                else if (!RegNumber.test($FwCode.val())) {

                   $CheckResult.html("您输入的防伪码不是数字");
  
                    $FwCode.focus();

                    return false;

                }

            
				
                $CheckResult.html("正在查询......");

                $(this).attr("disabled", true);

                var $strurl="" ;
           

                    $.getJSON(

                    "http://www.gzxb315.com/fwweb/fwipjson.asp?callback=?","",
	
                    function(data2) {
					
                       $strurl = data2.fwip ;


                   $.getJSON(

                     $strurl + "/fwqueryjson.asp?callback=?",
                    { FwCode: $FwCode.val() },

                    function(data) {

                  //      alert(data.QueryResult);
                        $CheckResult.html(data.QueryResult);
                        setTimeout(btnEnabled, 2000);

                    });

	
                    }
                      );

 


            });



            function btnEnabled() {

                $("#btnQuery").attr("disabled", false);

            }


        });

    </script>
    <style type="text/css">
body{
	background:#fff;
	margin: 0;
	padding:0;
	background-color: #CCC;
	background-image: url(../../../webroot/TDC_PC/images/beijing.png);
}
.main{
 width:900px; margin-left:auto; margin-right:auto; text-align:center; background-image:url('../../../webroot/TDC_PC/images/beijing.png'); background-repeat:repeat-x; background-color:#fff;
}
DIV{
   font-family:微软雅黑; margin:0; padding:0; font-size:12px; list-style-type:none;
}
.logo{
 text-align:center;
}
.tab{
 text-align:center;
 }  
 .span{
	font-size:30px;
	font-weight:400;
	margin:0;
	font-family: "微软雅黑";
 }
 .spanem{
	font-size:19px;
	color:#9b9a9a;
	margin:0;
	font-family: "微软雅黑";
 }
 .p1{
  color:#007ce9; font-size:14pt;margin:0;
 }  
.p2{
	color:#333333;
	font-size:16px;
	font-weight:400;
	margin:0;
	font-family: "微软雅黑";
}
.p2 img{
 width:30px;
}
.d1{
	background-image:url('../../../webroot/TDC_PC/images/ee.png');
	background-repeat: no-repeat;
	width:850px;
	height:160px;
	margin-left:25px;
	margin-right:auto;
	
}
.d1_1{
	padding-top:50px;
	margin-left:185px;
	float:left;
}
.inp{
	width:300px;
	height:40px;
	font-size:14pt;
	color:#737171;
	border:0;
}
.but{
 width:50px; height:40px; font-size:12pt;
}
.btnQuery{
	width:100px;
	height:40px;
}
.d2{
	text-align:center;
	margin-top: 15px;

	
	}
.d2_1{
	font-size:16px;
	margin-top: 35px;
	font-family: "微软雅黑";

}
.d2_2{
	font-size:16px;
	width:830px;
	height:100px;
	margin-left:25px;
	border:dashed 1px #333;
	margin-right: auto;
	height:auto;
}
	
.d3{
 background-image:url('../../../webroot/TDC_PC/images/cxtis.png'); width:870px; height:206px; margin-left:15px; margin-right:auto;
 margin-top:15px; 
}
.d3_1{
	float:left;
	width:720px;
	text-align:left;
	font-family: "微软雅黑";
	margin-top: 45px;
	margin-right: 30px;
	margin-bottom: 30px;
	margin-left: 90px;
	font-size:15px;
	text-decoration: none;
}
.d3_1 p{
	margin:0px;
	font-size:15px;
	color:#333333;
	font-family: "微软雅黑";
	text-decoration: none;
}
.d4{
	height:10px;
	width:100%;
}
.d5{
	background-image:url('../../../webroot/TDC_PC/images/315841.png');
	background-repeat:repeat-x;
	height:134px;
	width:900px;
	text-align:left;
}
.d5_1{
	width:128px;
	height:120px;
	float:left;
}
.d5_1 img{
	height:120px;
}
.d5_2{
	width:640px;
	height:150px;
	float:left;
	text-align:center;
	margin-left: 130px;
	font-family: "微软雅黑";
	font-size: 15px;
}
.d5_3{
	width:128px;
	height:120px;
	float:left;
}
.d5_4{
	width:100%;
	height:20px;	
}
.d5_3 img{
}
.d5_2_1{
	margin-top:30px;
	font-size: 15px;
}
.d5_2_1 a{
	color: #ffffff;
	font-weight: bold;
	text-decoration: none;
}
.d5_2_2{
	margin:5px 0px 10px 0px;
	font-size: 15px;
}
.d5_2_2 a{
	color: #ffffff;
	font-weight: bold;
	text-decoration: none;
}
.d5_2_3{
	font-size:12px;
	font-weight:bold;
	color:#333333;
	font-family: "微软雅黑";
}

.d6{
	height:120px; width:100%;
}
    </style>
</head>
<body> 
       <form id="form1" runat="server">
       <div class="main">
       <div class="tab">
        <p class="spanem">&nbsp;</p>
     </div>
      <div class="logo"><img src="../../../webroot/TDC_PC/images/陆港logo.png" alt="logo" align="absmiddle" style="height:150px" /></div>
       
        <div class="tab">
        <p class="span">陆港进口商品防伪溯源平台</p>
        <p class="spanem">Land port imports anti-counterfeiting traceability platform</p>
        <p class="spanem">&nbsp;</p>
        </div>
           <div class="tab">
        </div>
        
        <div class="d1">
       <div class="p2"><img src="../../../webroot/TDC_PC/images/01.png" alt="01" align="absmiddle"/>&nbsp; 刮开涂层取防伪码&nbsp; >&nbsp; <img src="../../../webroot/TDC_PC/images/02.png" alt="02" align="absmiddle"/>&nbsp; 输入防伪码&nbsp; >&nbsp; <img src="../../../webroot/TDC_PC/images/03.png" alt="03" align="absmiddle"/>&nbsp; 点击验证&nbsp; >&nbsp; <img src="../../../webroot/TDC_PC/images/04.png" alt="04" align="absmiddle"/>&nbsp; 显示查询结果</div>
       
       
        <div class="d1_1">
        <form action="#" method="post">
<input type="text" class="inp" name="fwid" id="fwid" maxlength="50" value="" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" name="btnQuery" id="btnQuery" class="btnQuery"   style="width:100px;height:38px;text-align:center;color:#1679a3">进入查询</button> 
        </form>
      <div style=" padding-left:0px; padding-top:15px; color:#FFF">查询提示：请从左至右依次输入标签上的防伪码，然后点击“进入查询”按钮，验证数字信息   </div>          

        </div>
        
        </div>
        <div class="d2">
        <div class="d2_2">查询结果显示区
        <div id="ReturnResult" class="d2_1">
        	<?php

	//$SearchNo = $_POST['find2'];
	
	//$SearchNo=$sc->decrypt($_GET['tdcno']);
	if(isset($_GET["fwid"])&&$_GET["fwid"]!=null){

	$SearchNo = $_GET["fwid"];
	//$SearchNo = 10;
	//$this->load->database();
	error_reporting(0);
	$queryFirst = $this->db->query("SELECT *  FROM tdc_master where TDC_FWID= $SearchNo ");

    $rowFirst = $queryFirst->row();
	
	if ($rowFirst->TDC_Active=='Y'){
		
		$itemid = $rowFirst-> TDC_ItemID_Ref;
		$query = $this->db->query("SELECT *  FROM tdc_gt_iteminfo where TDC_GT_ItemID = $itemid"); 
		$row = $query->row_array();
		
		
		
		//原产地
		$originid = $row['TDC_GT_CountryOfOrigin_Ref'];
		$queryOriginName = $this->db->query("SELECT TDC_OriginName FROM  tdc_origininfo where TDC_OriginID=$originid");
		$rowOriginName = $queryOriginName->row_array();
		$OriginName = $rowOriginName['TDC_OriginName'];
					
		//启运港
		$portid = $row['TDC_GT_PortOfShipment_Ref'];
		$queryPortName = $this->db->query("SELECT TDC_PortName FROM  tdc_portinfo where TDC_PortID=$portid");
		$rowPortName = $queryPortName->row_array();
		$PortName = $rowPortName['TDC_PortName'];
					
		//售卖平台
		$pfid = $row['TDC_GT_SalePlatform_Ref'];
		$queryPURL = $this->db->query("SELECT TDC_PlatFormURL FROM  tdc_platforminfo where TDC_PlatFormID=$pfid");
		$rowPURL = $queryPURL->row_array();
		$PURL = $rowPURL['TDC_PlatFormURL'];
					
					
		//所属商家
		$shopid = $row['TDC_GT_ShopID_Ref'];
		$querySName = $this->db->query("SELECT TDC_SellerName FROM  tdc_shopinfo where TDC_ShopID=$shopid");
		$rowSName = $querySName->row_array();
		$SName = $rowSName['TDC_SellerName'];		
		
		
		
		
	 ?>
	 <ul id="foodInfo" align="left">
		<li>商品名称：<?php echo $row['TDC_GT_ItemName'];?></li>
		<li>原产国（地）：<?php echo $OriginName;?></li>
		<li>销售平台：<?php echo $PURL;?></li>
		<li>进口商/代理商：<?php echo $SName;?></li>			
		<li>启运地：<?php echo $PortName;?></li>
		<li>报检日期：<?php echo $row['TDC_GT_InspectionDate'];?></li>
		<li>报检单号：<?php echo $row['TDC_GT_InspectionNo'];?></li>
		<li>报关日期：<?php echo $row['TDC_GT_DeclarationDate'];?></li>
		<li>报关单号：<?php echo $row['TDC_GT_DeclarationNo'];?></li>		
		<li>二维码序号：<?php echo sprintf("%013d",$rowFirst->TDC_No);?></li>
		<li>防伪信息：<?php
			if ($rowFirst->TDC_Count+1 == 1 ) {
			echo "您好，您通过手机网页查询本款商品，经系统核对，本款商品系通过正规渠道进口，请按标签所示保质期限使用。该防伪码总共被查询1次，查询有效！";
		    $data = array(
		    	'TDC_Count' => $rowFirst->TDC_Count+1,
		    	'TDC_FWTime' => date('y-m-d H:i:s',time())
		    	);
    		$where = "TDC_FWID= $SearchNo";
    		$this->db->update('TDC_Master',$data,$where);
		}
		else {
    		$count = $rowFirst->TDC_Count+1;
    		echo "这是第".$count."次查询，首次查询时间为".$rowFirst->TDC_FWTime."<br>请致电400-6822-718进行咨询";
    		$data = array('TDC_Count' => $rowFirst->TDC_Count+1);
    		$where = "TDC_FWID= $SearchNo";
    		$this->db->update('TDC_Master',$data,$where);

    	}

		?></li>
		<br>
          <?php
		}
		else 
		echo "您输入的防伪码无效！" ;
	   ?>
	</ul>
<?php }?>
        	</div>
        </div>
        </div>
        <div style="height:1px; margin-top:-1px;clear: both;overflow:hidden;"></div>
        <div class="d3">
        <div class="d3_1">
        <p>请刮开你所购买商品上的防伪标识，在本页查询验证码框里输入防伪码。</p>
        <p>请确保输入的防伪码正确无误，在输入防伪码后，点击进入查询，即可识别产品真伪。</p>
        <p>如果您输入的防伪码正确无误，则查询系统提示：你所购买的产品是正品，并显示相关产品信息。</p>
        <p>如果您输入的防伪码已经被查询过，则查询系统提示：该防伪码已被查询过几次，并显示上次查询时间。</p>
        <p>如果您输入的防伪码在数据库里不存在或已被过期删除，则查询系统提示：该防伪码不存在，请谨防假冒。</p>
        <p>免费声明：本系统仅能验证进口产品所属生产厂商或服务商，商品售后服务请直接联系您的销售商，请知悉。</p>
        </div>
        </div>
        
        <div class="d4"></div>
        
        </div>
          
        
        </div>
     <div   style="background-color:#36bef1; margin-top:10px ">
      <center>  <div class="d5" >

        <div class="d5_2">
        <div class="d5_2_1"><a href="http://www.zosc.com/">郑欧商城</a>&nbsp; |&nbsp; <a href="http://gj.zosc.com/">郑欧国际</a>&nbsp; |&nbsp; <a href="http://www.zzguojilugang.com/">郑州国际陆港开发建设有限公司</a></div>
        <div class="d5_2_2"><a  href="http://www.haeport.com/navi/dh/index.action/">河南省电子口岸</a>&nbsp; |&nbsp; <a  href="http://www.emaoe.com/">E贸易跨境电子服务平台</a></div>
        <div class="d5_2_3">
          <p>版权所有：gj.zosc.com  陆港进口商品防伪溯源平台                    <span microsoft="" auto;="auto;" tahoma,="" arial,="" hiragino="" sans="" 宋体;="" line-height:="" 24px;="" widows:=""><a href="http://www.miibeian.gov.cn/">豫ICP备13015960号-2</a></span></p>
</div>
        
        </div>
       
       
        </div></center></div>
    </form>
</body>
</html>
