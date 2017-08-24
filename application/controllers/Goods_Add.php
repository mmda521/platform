<?php
class Goods_add extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct(); 
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Template_model');
		$this->load->helper('common_function');
		$this->load->model('Goods_Add_model');
	}
	
	
  
	 public function Goods_Search()
	{   
		$tdc_id = $_SESSION['Admin_id'];
		$list['info'] = $this->Goods_Add_model->get_data($tdc_id);
		$this->load->view('TDC/TDC_Platform_GoodsInfo_Search',$list);

	}
		
		
		
	 public function do_Goods_Search()
	{
		$tdc_id = $_SESSION['Admin_id'];
		$field_Id = $this->input->post_get('field_Id');
		$data = $this->Template_model->get_row_data($field_Id);
		$var = unserialize($data['field']);
		$list = $this->Goods_Add_model->select_data($tdc_id,$field_Id);
		foreach ($list as $key => $value)
		{
			$goods_data[$key] = unserialize($value['goods_data']);
			$goods_Id[$key] = $value['goods_Id'];
			$Goods_Status[$key] = $value['Goods_Status'];
			$Reason[$key] = $value['Reason'];
			if ( $value['Goods_Status']=='0')
			{
			  $Goods_Status[$key]="审核中";
			}else if ($value['Goods_Status']=='1')
			{
			  $Goods_Status[$key]="审核通过";
			}
			else if ( $value['Goods_Status']=='2')
			{
			  $Goods_Status[$key]="审核失败";
			}
		}
		//file_put_contents("D:\abc.txt",var_export($goods_Id,true)."\r\n",FILE_APPEND);    //传入true时，返回变量结构信息,,,\r\n ；换行回车
		echo result_to_towf_new4('1',$var,$goods_data,$goods_Id,$field_Id,$Goods_Status,$Reason);
	}

  
  
  
		
	public function data_show()
	{
		$tdc_id = $_SESSION['Admin_id'];
		$list['info'] = $this->Goods_Add_model->get_data($tdc_id);
		/* echo '<pre>';
		echo var_dump($list);
		echo '</pre>';
		die;  */
		$this->load->view('TDC/TDC_Platform_GoodsInfo',$list);
	}
	
	
	
	public function data_show_goods()
	{
		$tdc_id = $_SESSION['Admin_id'];
		$field_Id = $this->input->post_get('field_Id');
		$data = $this->Template_model->get_row_data($field_Id);
		$var = unserialize($data['field']);
		$list = $this->Goods_Add_model->select_data1($tdc_id,$field_Id);
		if(!empty($list))
		{
			foreach ($list as $key => $value)
			{
			  $goods_data[$key] = unserialize($value['goods_data']);
			  $goods_Id[$key] = $value['goods_Id'];
			//$template_Id[$key] = $value['field_Id'];
			}
			//file_put_contents("D:\abc.txt",var_export($goods_Id,true)."\r\n",FILE_APPEND);    //传入true时，返回变量结构信息,,,\r\n ；换行回车
			echo result_to_towf_new2('1',$var,$goods_data,$goods_Id,$field_Id);
		}
		else
		{
		    echo result_to_towf_new('0','该模板下没有通过的商品信息');
		}
		
	}
	
		
	 public function Goods_Add()
    {
	   $tdc_id = $_SESSION['Admin_id'];
       $list['info'] = $this->Template_model->select_data($tdc_id);
	    /* echo '<pre>';
		echo var_dump($list);
		echo '</pre>';
		die;  */
	   $this->load->view('TDC/TDC_Platform_GoodsAdd',$list);
    } 
	
	
	public function getdata()
	{
		$field_Id = $this->input->post_get('field_Id');
		$data = $this->Template_model->get_row_data($field_Id);
		$var = unserialize($data['field']);
		$fieldid=$data['field_Id'];
		//file_put_contents("D:\abc.txt",$var,FILE_APPEND);
		echo result_to_towf_new('1',$var);
	}
	
	
	
	public function do_getdata()
	{
		$goods_data = $this->input->post_get('data');
		$template_id = $this->input->post_get('template_id');
		$TDC_id = $_SESSION['Admin_id'];
		$var = serialize($goods_data);
		/* echo '<pre>';
		echo var_dump($template_id);
		echo '</pre>';
		die;  */
		$data = array(
		  'goods_data'=>$var,
		  'field_Id'=>$template_id,
		  'TDC_id'=>$TDC_id,
		  'AddTime'=>date('Y-m-d H:i:s',time()),
		  'Goods_Status'=>0,
		 );
		$this->Goods_Add_model->insert($data);
		 $this->load->view('TDC/TDC_Platform_GoodsAdd_Result');
	}
	
	
	
	public function update()
	{
		if($_SESSION['Admin_id'] == $_SESSION['TDC_id'])
		{
			$goods_Id = $this->input->post_get('goods_Id');
			$template_id = $this->input->post_get('template_id');
			$template = $this->Template_model->get_row_data($template_id);
			$field = unserialize($template['field']);
			$data = $this->Goods_Add_model->select_data_row($goods_Id);
			$goods_data = unserialize($data['goods_data']);
			
			$var['field'] = $field;
			$var['goods_data'] = $goods_data;
			$var['goods_Id'] = $goods_Id;
			$this->load->view('TDC/TDC_Platform_GoodsUpdate',$var);
		}
		else
	   {
			$this->load->view('TDC/Limit_denied'); 
	   }
		
	}
	
	
	
	public function do_update()
	{
		$goods_Id = $this->input->post_get('goods_Id');
		$goodsName = $this->input->post_get('goodsName');
		$goods_data = serialize($goodsName);
		$data = array(
		'Goods_Status'=>0,
		'goods_data'=>$goods_data,
		);
		$this->Goods_Add_model->update($data,$goods_Id);
		$this->load->view('TDC/TDC_Platform_GoodsUpdate_Result');
		/* echo '<pre>';
		echo var_dump($goodsName);
		echo '</pre>';
		die;  */
	}
	
	
	public function delete()
	{
		if($_SESSION['Admin_id'] == $_SESSION['TDC_id'])
		{
			$goods_Id = $this->input->post_get('goods_Id');
			$this->Goods_Add_model->delete($goods_Id);
			//echo result_to_towf_new('1','删除成功！');
			$this->load->view('TDC/TDC_Platform_GoodsDel_Result');
		}
	    else
	   {
			$this->load->view('TDC/Limit_denied'); 
	   }	
	}
       
 }
?>
