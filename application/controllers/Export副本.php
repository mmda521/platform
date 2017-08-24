<?php
class Export extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Goods_model');
		$this->load->model('Qr_Code_model');
	}
	
	
   public function export_info()
   {
	   $this->load->view('TDC/QR_Export_index');
   }

  public function import()
   {
	   $path=$_FILES['file1'];
	   $a=$path['name'];
	   if(empty($path['name']))
	   {
		  echo "<script>alert('上传文件不能为空！请重新上传！');</script>"; 
		  $this->load->view('TDC/QR_Export_index');
	   }
	   else
	   {
		   $filePath = "uploads/".$path['name'];
		   $filePath1=iconv('UTF-8','GB2312',$filePath);
		   move_uploaded_file($path['tmp_name'],$filePath1);
		   $data=array('A'=>'TDC_GT_ItemName','B'=>'TDC_GT_ItemNo','C'=>'TDC_GT_CountryOfOrigin_Ref','D'=>'TDC_GT_PortOfShipment_Ref','E'=>'TDC_GT_InspectionDate','F'=>'TDC_GT_InspectionNo','G'=>'TDC_GT_DeclarationDate','H'=>'TDC_GT_DeclarationNo','I'=>'TDC_GT_ShopID_Ref');
		   $tablename='tdc_gt_iteminfo';
		   $this->excel_fileput($filePath1,$data,$tablename);
		   echo "<script>alert('上传文件成功！请继续上传！');</script>"; 
		   $this->load->view('TDC/QR_Export_index');
	   }
   }
   
   
   public function excel_fileput($filePath1,$data,$tablename)
   {
	   $this->load->library('phpexcel');
	   $PHPExcel=new PHPExcel();
	   $PHPReader=new PHPExcel_Reader_Excel2007();
	   if(!$PHPReader->canRead($filePath1))
	   {
		   $PHPReader=new PHPExcel_Reader_Excel5();
		   if(!$PHPReader->canRead($filePath1))
		   {
			   echo 'no Excel';
			   return;
		   }
	   }
	   
	   $PHPExcel=$PHPReader->load($filePath1);
	   $currentSheet = $PHPExcel->getSheet(0);
	   $allColumn = $currentSheet->getHighestColumn();
	   $allRow = $currentSheet->getHighestRow();
	   for($currentRow = 2;$currentRow<=$allRow;$currentRow++)
	   {
		   for($currentColumn='A'; $currentColumn<=$allColumn;$currentColumn++)
		   {   
	           if($currentColumn=='E'||$currentColumn=='G')
			   {
				   $val = gmdate("Y-m-d H:i:s",PHPExcel_Shared_Date::ExcelToPHP($currentSheet->getCellByColumnAndRow(ord($currentColumn)-65,$currentRow)->getValue()));
			   }
			   else
			   {
				   $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn)-65,$currentRow)->getValue();			   
			       //PC::debug($val);
			  }
			    
		       if($currentColumn<=$allColumn)
			   {
				   $data1[$currentColumn]=$val;
			   }
		   }
		   foreach($data as $key => $val)
		   {
			   $data2[$currentRow][$val]=$data1[$key];
		   }
		   //PC::debug($data2[$currentRow]);
		  // $this->Goods_model->insert_import($data2[$currentRow]);
	   }
   }
   
   
   
   public function export()
   {
	   $condition = array(); 
	   $startNo = $this->input->get_post('startNo');
	   if(!empty($startNo))
	   {
		   $condition['TDC_No>='] = $startNo;
	   }
	   $endNo = $this->input->get_post('endNo');
	    if(!empty($endNo))
	   {
		   $condition['TDC_No<='] = $endNo;
	   }
	  $total = $this->Qr_Code_model->select_data($condition);
	   $this->load->library('phpexcel');
	  $PHPExcel = new PHPExcel();
	  $PHPExcel->setActiveSheetIndex(0)
	          ->setCellValue('A1','序列号')
			  ->setCellValue('B1','防伪码')
			  ->setCellValue('C1','二维码地址')
			  ->setCellValue('D1','二维码类型');
	//PC::debug($total); 
	 foreach ($total as $key => $value)
	  {
		  $num = $key + 2;
		  $PHPExcel->setActiveSheetIndex(0)
		           ->setCellValue('A'.$num,$value['TDC_No'])
				   ->setCellValue('B'.$num," ".$value['TDC_FWID'])
				   ->setCellValue('C'.$num,$value['TDC_URL'])
				   ->setCellValue('D'.$num,$value['TDC_TYPE']);
	  }
	  $PHPExcel->getActiveSheet()->setTitle('二维码号段信息导出-'.date('Y-m-d',time()));
	  $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
	  $PHPExcel->getActiveSheet()->getStyle('A1:D1000')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      //header('Pragma:public');
      header("Content-Type: application/vnd.ms-excel;charset=uft8");  
	  header("Content-Disposition:attachment; filename=FILE".date("YmdHis").".xlsx");
	  $objWriter = new PHPExcel_Writer_Excel2007($PHPExcel);
	  ob_end_clean();
	  ob_start();
	  $objWriter->save('php://output'); 
	  
	   
   }
	
}

?>



