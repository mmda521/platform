<?php
class Qr_Code extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Qr_Code_model');
		$this->load->model('Goods_Add_model');
		$this->load->model('Template_model');
		$this->load->model('Qr_Code_UseScale_model');
		$this->load->helper('common_function');
			
	}
	
	
   public function qr_add()
   {
	   $this->load->view('TDC/QR_Add');
   }

   
      
  
  public function do_qr_add()
  {
	  $TDC_id = $this->input->get_post('TDC_id');
	  $qr_num = $this->input->get_post('qr_num');
	  $qr_type = $this->input->get_post('qrtype');
	  $function_type = $this->input->get_post('functiontype');
	  $list = $this->Goods_Add_model->get_data($TDC_id);
	  //file_put_contents("D:\abc.txt",var_export($list,true)."\r\n",FILE_APPEND);         //传入true时，返回变量结构信息,,,\r\n ；换行回车
	 
	  if(isset($qr_num))
	  {
		
		
		$sc=new SysCrypt('lugang718admin');
		$this->db->trans_start();
		$_SESSION['qrNum']=array();
		$MAXid = $this->Qr_Code_model->select_max();
	    //PC::debug($MAXid);
		for($i=0;$i<$qr_num;$i++)
		{
			$num_13 =  mt_rand(10,99)
		      . substr(sprintf('%010d',time() - 946656000),5)
		      .mt_rand(0,9)
		      . sprintf('%03d', (float) microtime() * 1000)
		      .mt_rand(10,99);
			$numToChar = array(
				'1'=>'a',
				'2'=>'b',
				'3'=>'c',
				'4'=>'d',
				'5'=>'e',
				'6'=>'f',
				'7'=>'g',
				'8'=>'h',
				'9'=>'i',
				'0'=>'j'
			);
          $charToNum = array(
				'a'=>'4',
				'b'=>'3',
				'c'=>'2',
				'd'=>'9',
				'e'=>'7',
				'f'=>'1',
				'g'=>'6',
				'h'=>'0',
				'i'=>'5',
				'j'=>'8',
			);
		  $char_13 = strtr($num_13,$numToChar);
          $fwid = strtr($char_13,$charToNum);
          $tdc_no = (string)($MAXid + $i + 1);
          $encrypt=$sc->encrypt($tdc_no);
		  /*  if($function_type==1){
			$tdc_url = "http://fw.zzguojilugang.com/index.php/TDC_Mobile_01?tdcno=".$encrypt;
		   }
		   else if($function_type==2){
			$tdc_url = "http://fw.zzguojilugang.com/index.php/TDC_Mobile_02?tdcno=".$encrypt;   
		   }
		   else {
			   $tdc_url='';
		   } */	 
	      $tdc_url = "http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==".$encrypt;           
		  $data = array(
		      'TDC_TDC_id_Ref'=>$TDC_id,
			  'TDC_FWID'=>$fwid,
			  'TDC_TYPE'=>$qr_type,
			  'TDC_URL'=>$tdc_url,
			  'Function_Type'=>$function_type,
		  );
		  $this->Qr_Code_model->insert_data($data);
		  $_SESSION["qrNum"][$i] = $this->db->insert_id();
		}
		 $this->db->trans_complete();
		// $this->load->view('TDC/QR_Add_Result');
		 $size = count($_SESSION["qrNum"]);              
         $num =  "成功生成".$size."个二维码"."<br><br>生成的号段为：".$_SESSION["qrNum"][0]."--".$_SESSION["qrNum"][$size-1];
         //$total =  "生成的号段为：".$_SESSION["qrNum"][0]."--".$_SESSION["qrNum"][$size-1];
		$StartNo = $_SESSION["qrNum"][0];
		$EndNo = $_SESSION["qrNum"][$size-1];
		echo result_to_towf_new2('1',$num,$StartNo,$EndNo,$list);
	  }
  }
   
   
   
   
     
   public function qr_active()
   {
	   $template_id = $this->input->get_post('template_id');
	   //
	   $tdc_id=$_SESSION['Admin_id'];
	  // file_put_contents('D:\abc.txt',$tdc_id,FILE_APPEND);
	   $list = $this->Goods_Add_model->select_data1($tdc_id,$template_id);
	  
	   if(!empty($list))
	   {
		    //file_put_contents('D:\abc.txt',var_export($list,true)."\r\n",FILE_APPEND);
		    foreach ($list as $key => $value)
		   {
			  $goods_data[$key] = unserialize($list[$key]['goods_data']);
			  $goods_Id[$key] = $list[$key]['goods_Id'];
			  $field_Id[$key] = $list[$key]['field_Id'];
		   }
		   //file_put_contents('D:\abc.txt',var_export($goods_data,true)."\r\n",FILE_APPEND);
		   
		   echo result_to_towf_new2('1',$goods_data,$goods_Id,$field_Id,null);
	   }
	   else
	   {
		   echo result_to_towf_new2('1',null,null,null,null);
	   }
	  
   }
   
   
    public function do_qr_active()
   {
	   $startNo = $this->input->get_post('startNo');
	   $endNo = $this->input->get_post('endNo');
	   $itemName = $this->input->get_post('itemName');
	   $arritemID = explode('^',$itemName);
	   $itemID = $arritemID[0];
	   //PC::debug($itemID);
	   $this->db->trans_start();
	   for($i=$startNo;$i<=$endNo;$i++)
	   {
		   $data = array(
		     'TDC_goods_Id_Ref' => $itemID,
			 'TDC_Active' => 'Y',
		   );
		  $this->Qr_Code_model->update_data($data,$i); 
	   }
	   $this->db->trans_complete();
	   $this->load->view('TDC/QR_Active_Result');
   }
   
   
   
   
   public function qr_add_only()
   {
	   $this->load->view('TDC/QR_Add_only');
   }
   
   
  
   public function do_qr_add_only()
   {
	  $TDC_id = $_SESSION['Admin_id'];
	  $qr_num = $this->input->get_post('qr_num');
	  $qr_type = $this->input->get_post('qrtype');
	  $function_type = $this->input->get_post('functiontype');
	 
	  if(isset($qr_num))
	  {
		
		$sc=new SysCrypt('lugang718admin');
		$this->db->trans_start();
		$_SESSION['qrNum']=array();
		$MAXid = $this->Qr_Code_model->select_max();
	    //PC::debug($MAXid);
		for($i=0;$i<$qr_num;$i++)
		{
			$num_13 =  mt_rand(10,99)
		      . substr(sprintf('%010d',time() - 946656000),5)
		      .mt_rand(0,9)
		      . sprintf('%03d', (float) microtime() * 1000)
		      .mt_rand(10,99);
			$numToChar = array(
				'1'=>'a',
				'2'=>'b',
				'3'=>'c',
				'4'=>'d',
				'5'=>'e',
				'6'=>'f',
				'7'=>'g',
				'8'=>'h',
				'9'=>'i',
				'0'=>'j'
			);
          $charToNum = array(
				'a'=>'4',
				'b'=>'3',
				'c'=>'2',
				'd'=>'9',
				'e'=>'7',
				'f'=>'1',
				'g'=>'6',
				'h'=>'0',
				'i'=>'5',
				'j'=>'8',
			);
		  $char_13 = strtr($num_13,$numToChar);
          $fwid = strtr($char_13,$charToNum);
          $tdc_no = (string)($MAXid + $i + 1);
          $encrypt=$sc->encrypt($tdc_no);		 
	      $tdc_url = "http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==".$encrypt;           
		  $data = array(
		      'TDC_TDC_id_Ref'=>$TDC_id,
			  'TDC_FWID'=>$fwid,
			  'TDC_TYPE'=>$qr_type,
			  'TDC_URL'=>$tdc_url,
			  'Function_Type'=>$function_type,
		  );
		  $this->Qr_Code_model->insert_data($data);
		  $_SESSION["qrNum"][$i] = $this->db->insert_id();
		}
		 $this->db->trans_complete();
		 $this->load->view('TDC/QR_Add_only_Result');
	  }
   }  

   
   
    
      public function qr_active_only()
   {
	   $condition = array();
	   $tdc_id = $_SESSION['Admin_id'];
	   $condition['TDC_id'] = $tdc_id; 
       $list['info'] = $this->Goods_Add_model->select_pipei($condition);
	   $this->load->view('TDC/QR_Active_only',$list);
   } 
   
   
   
      public function qr_active_only_get_goodsdata()
   {
	    $template_id = $this->input->get_post('template_id');
	   //file_put_contents('D:\abc.txt',$template_id,FILE_APPEND);
	   $tdc_id=$_SESSION['Admin_id'];
	   $list = $this->Goods_Add_model->select_data1($tdc_id,$template_id);
	   if(isset($list)&&!empty($list))
	 {
	   foreach ($list as $key => $value)
	   {
		  $goods_data[$key] = unserialize($value['goods_data']);
		  $goods_Id[$key] = $value['goods_Id'];
		  $field_Id[$key] = $value['field_Id'];
	   }
	   //file_put_contents('D:\abc.txt',var_export($goods_data,true)."\r\n",FILE_APPEND);
	   
	   echo result_to_towf_new2('1',$goods_data,$goods_Id,$field_Id,null);
	 }
     else 
	{
	   echo result_to_towf_new2('1',null,null,null,null);
	}
   } 
   
   
   
     public function do_qr_active_only_get_goodsdata()
   {
	   $tdc_id = $_SESSION['Admin_id'];
	   $startNo = $this->input->get_post('startNo');
	   $endNo = $this->input->get_post('endNo');
	   $itemName = $this->input->get_post('goodsName');
	   //file_put_contents('D:\abc.txt', $itemName."\r\n",FILE_APPEND);
	   $arritemID = explode('^',$itemName);
	   $itemID = $arritemID[0];
	   //PC::debug($itemID);
	   $this->db->trans_start();
	    for($j=$startNo;$j<=$endNo;$j++)
		{
		    $var=$this->Qr_Code_model->select_by_tdcNo($tdc_id,$j); 
			//file_put_contents('D:\abc.txt', var_export($var,true)."\r\n",FILE_APPEND);
			if(empty($var))
			{
				echo result_to_towf_new('0','对不起，此号段不在您的激活范围内！');
				exit();
			}
		}
	   for($i=$startNo;$i<=$endNo;$i++)
	   {
		   $data = array(
		     'TDC_goods_Id_Ref' => $itemID,
			 'TDC_Active' => 'Y',
		   );
		  $this->Qr_Code_model->update_data($data,$i); 
	   }
	   $this->db->trans_complete();
	  // $this->load->view('TDC/QR_Active_Result');
	  echo result_to_towf_new('1',null);
   }
   
   
   public function qr_Active_Result_only()
   {
	   $this->load->view('TDC/QR_Active_Result_only');
   }
   
   
   
   
   public function qr_Notactive()
   {
	   $this->load->view('TDC/QR_NotActive');
   }
   
   
   
    public function do_qr_Notactive()
   {
	   $startNo = $this->input->get_post('startNo');
	   $endNo = $this->input->get_post('endNo');
	   $data = array(
			'TDC_Active' => 'N',
            'TDC_Count' => 0,
            'TDC_FWTime' => NULL,
            'TDC_goods_Id_Ref' => NULL
	  		);
       $this->db->trans_start();
	   for ($i=$startNo;$i<=$endNo;$i++)
	   {
		   $this->Qr_Code_model->update_data($data,$i);  
	   }
	   $this->db->trans_complete();
	   $this->load->view('TDC/QR_NotActive_Result');
   }
   
   
   
    public function qr_Transform()
   {
	   $this->load->view('TDC/QR_Transform');
   }
   
   
    public function do_qr_Transform()
   {
	   $tdc_id=$_SESSION['Admin_id'];
	   $startNo = $this->input->get_post('startNo');
	   $endNo = $this->input->get_post('endNo');
	   for ($i=$startNo;$i<=$endNo;$i++)
	   {
		   do
		   {
			  $this->db->trans_start();
			   $num_13 =  mt_rand(10,99)
              . substr(sprintf('%010d',time() - 946656000),5)
              .mt_rand(0,9)
              . sprintf('%03d', (float) microtime() * 1000)
              .mt_rand(10,99);
			  $numToChar = array(
				'1'=>'a',
				'2'=>'b',
				'3'=>'c',
				'4'=>'d',
				'5'=>'e',
				'6'=>'f',
				'7'=>'g',
				'8'=>'h',
				'9'=>'i',
				'0'=>'j'
			  );
			 $charToNum = array(
				'a'=>'4',
				'b'=>'3',
				'c'=>'2',
				'd'=>'9',
				'e'=>'7',
				'f'=>'1',
				'g'=>'6',
				'h'=>'0',
				'i'=>'5',
				'j'=>'8',
			  );

             $char_13 = strtr($num_13,$numToChar);
             $fwid = strtr($char_13,$charToNum);
			 $data = array(
             'TDC_FWID' => $fwid,
             );
            $sql = "update ignore tdc_master  set tdc_fwid={$fwid} where TDC_No ={$i} and TDC_TDC_id_Ref={$tdc_id}";
            $this->db->query($sql);
            $this->db->trans_complete();			  
		   }while ($this->db->trans_status() === FALSE);
	   }
	   $this->load->view('TDC/QR_Transform_Result');
   }
   
   
   
   public function qr_UseScale()
   {
	   $condition = array();
	   $condition1 = array();
	   $condition2 = array();
	   $condition3 = array();
	   $condition4 = array();
	   $condition5 = array();
	   $tdc_id = $_SESSION['Admin_id'];
	   $condition1['TDC_Active'] = 'Y';
	   $condition2['TDC_Active'] = 'N';
	   $condition3['TDC_TYPE'] = '1';   //方形码
	   $condition4['TDC_TYPE'] = '2';
	   $condition5['TDC_TDC_id_Ref'] = $tdc_id;
	  $a = $this->Qr_Code_UseScale_model->select_QRNum($condition,$condition5);
	  $a1 = $this->Qr_Code_UseScale_model->select_QRNum($condition1,$condition5);
	  $b=$a1/$a*100;
	  $c=round($b,2);
	  $a2 = $this->Qr_Code_UseScale_model->select_QRNum($condition2,$condition5);
	  $a3 = $this->Qr_Code_UseScale_model->select_QRNum($condition3,$condition5);
	  $a4 = $this->Qr_Code_UseScale_model->select_QRTypeNum($condition3,$condition1,$condition5);
	  $b1=$a4/$a3*100;
	  $c1=round($b1,2);
	  $a5 = $this->Qr_Code_UseScale_model->select_QRTypeNum($condition3,$condition2,$condition5);
	  $a6 = $this->Qr_Code_UseScale_model->select_QRNum($condition4,$condition5);
	  $a7 = $this->Qr_Code_UseScale_model->select_QRTypeNum($condition4,$condition1,$condition5);
	  $b2=$a7/$a6*100;
	  $c2=round($b2,2);
	  $a8 = $this->Qr_Code_UseScale_model->select_QRTypeNum($condition4,$condition2,$condition5);
	  $list['a'] = $a;
	  $list['a1'] = $a1; 
	  $list['b'] = $b;
	  $list['c'] = $c;	
      $list['a2'] = $a2;
	  $list['a3'] = $a3; 
	  $list['a4'] = $a4;
	  $list['b1'] = $b1;
      $list['c1'] = $c1;
	  $list['a5'] = $a5; 
	  $list['a6'] = $a6;
	  $list['a7'] = $a7;
      $list['b2'] = $b2; 
	  $list['c2'] = $c2;
	  $list['a8'] = $a8;	
	 // PC::debug($list);  
	   $this->load->view('TDC/TDC_UseScale',$list);
   }
   
   
   
   /*  public function qr_pic()
   {
	   $this->load->view('TDC/TDC_PIC');
   }
   
   
    public function do_qr_pic()
   {
	   $startNum = $this->input->get_post('startNum');
	   $endNum = $this->input->get_post('endNum');
	   for ($i=$startNum;$i<=$endNum;$i++)
	   {
		    $list=$this->Qr_Code_model->select_search($i); 
			if($list['TDC_No'] != 0)
		   {
			  $tdcno = sprintf("%013d",$list['TDC_No']);
              $fwno = sprintf("%013d",$list['TDC_FWID']);
			  $Function_Type=$list['Function_Type'];
			  $TDC_TYPE=$list['TDC_TYPE'];
			  $sc=new SysCrypt('lugang718admin');
              $encrypt=$sc->encrypt($list['TDC_No']);

			  //PC::debug($encrypt);
				
		   }
		   $data['info'][$i]['TDC_TYPE']=$TDC_TYPE;
		   $data['info'][$i]['TDC_No']=$tdcno;
		   $data['info'][$i]['TDC_FWID']=$fwno;
		   $data['info'][$i]['Function_Type']=$Function_Type;
		   $data['info'][$i]['encrypt']=$encrypt;
	  }
	  //PC::debug($data);
	 $this->load->view('TDC/TDC_PIC',$data);
  } */
  
  
  public function qr_show()
  {
	  $tdcno = $this->input->get_post('tdcno');
	  $sc=new SysCrypt('lugang718admin');
	  $SearchNo=$sc->decrypt($tdcno);
	  $list=$this->Qr_Code_model->select_search('4');
	  /* echo "<pre>";
	  var_dump($list);
	  echo "</pre>";
	  die; */
	  if(isset($list)&&!empty($list))
	  {
		  $goods_info=$this->Goods_Add_model->select_row($list['TDC_goods_Id_Ref']);
		  $template_info=$this->Template_model->get_row_data($goods_info['field_Id']);
		  $data['SearchNo']=$SearchNo;
		  $data['goods_data']=unserialize($goods_info['goods_data']);
		  $data['field']=unserialize($template_info['field']);
		  $data['TDC_FWID']=$list['TDC_FWID'];
		  $data['TDC_Count']=$list['TDC_Count'];
		  $data['TDC_FWTime']=$list['TDC_FWTime']; 
		  if($list['Function_Type']=='1')
		  { 
			  $this->load->view('TDC/TDC_Mobile_01',$data);
		  }
		  else if ($list['Function_Type']=='2')
		  {
			  $this->load->view('TDC/TDC_Mobile_02',$data); 
		  }
		  else 
		  {
			  $this->load->view('TDC/TDC_Mobile_03',$data); 
		  }
	  }
	  else
	  {
		  $data = array();
		  $this->load->view('TDC/TDC_Mobile',$data); 
	  }
	 
	  /*  echo "<pre>";
	   var_dump($data);
	   echo "</pre>";
	   die;  */ 
  }
  
  
  public function search_fwid()
  {
	  $securityCode = $this->input->get_post('securityCode');
	  $tdcno = $this->input->get_post('tdcno');
	  $list=$this->Qr_Code_model->select_search($tdcno);
	  $info['list']= $list;
	  $info['securityCode']= $securityCode;
	  $this->load->view('TDC/TDC_Mobile_01',$info);
  }
  
  
  
  public function search_active()
  {
	  $this->load->view('TDC/TDC_Search');
  }
  
  
   public function do_search_active()
  {
	  $startNum=$this->input->get_post('startNum');
	  $endNum=$this->input->get_post('endNum');
	  $tdc_id=$_SESSION['Admin_id'];
	  $total=$this->Qr_Code_model->select_total($startNum,$endNum,$tdc_id);
	  $active=$this->Qr_Code_model->select_active($startNum,$endNum,$tdc_id);
	  $noactive=$this->Qr_Code_model->select_noactive($startNum,$endNum,$tdc_id);
	  $info['startNum']= $startNum;
	  $info['endNum']= $endNum;
	  $info['total']= $total;
	  $info['active']= $active;
	  $info['noactive']= $noactive; 
	  $this->load->view('TDC/TDC_Search',$info);
  }
  
    public function details1()
  {
	  $tdc_id=$_SESSION['Admin_id'];
	  $startNum=$this->input->get_post('startNum');
	  $endNum=$this->input->get_post('endNum');
	  $data['info']=$this->Qr_Code_model->select_active_data($startNum,$endNum,$tdc_id);
	  $this->load->view('TDC/TDC_details1',$data);
  }
  
  
   public function details2()
  {
	   $tdc_id=$_SESSION['Admin_id'];
	  $startNum=$this->input->get_post('startNum');
	  $endNum=$this->input->get_post('endNum');
	  $data['info']=$this->Qr_Code_model->select_noactive_data($startNum,$endNum,$tdc_id);
	  $this->load->view('TDC/TDC_details2',$data);
  }
	
}


  class SysCrypt
		 {
		  private $crypt_key='lugang718admin';//密钥
		  public function __construct($crypt_key)
		 {
		   $this->crypt_key=$crypt_key;
		 }
		 public function encrypt($txt)
		 {
		   srand((double)microtime()*1000000);
		   $encrypt_key=md5(rand(0,32000));
		   $ctr=0;
		   $tmp='';
		   for($i=0;$i<strlen($txt);$i++)
		  {
		    $ctr=$ctr==strlen($encrypt_key)?0:$ctr;
		    $tmp.=$encrypt_key[$ctr].($txt[$i]^$encrypt_key[$ctr++]);
		  }
		 return base64_encode(self::__key($tmp,$this->crypt_key));
		 }
		 public function decrypt($txt)
		 {
		   $txt=self::__key(base64_decode($txt),$this->crypt_key);
		   $tmp='';
		   for($i=0;$i<strlen($txt);$i++)
		   {
		     $md5=$txt[$i];
		     $tmp.=$txt[++$i]^$md5;
		   }
		  return $tmp;
		 }
		 private function __key($txt,$encrypt_key)
		 {
		   $encrypt_key=md5($encrypt_key);
		   $ctr=0;
		   $tmp='';
		   for($i=0;$i<strlen($txt);$i++)
		   {
		    $ctr=$ctr==strlen($encrypt_key)?0:$ctr;
		    $tmp.=$txt[$i]^$encrypt_key[$ctr++];
		   }
		  return $tmp;
		 }
		 public function __destruct()
		 {
		   $this->crypt_key=NULL;
		 }
		}
?>



