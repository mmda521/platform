<?php
/**
* 
*/
class Admin extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('session');
		$this->load->model('User_model');
		$this->load->model('Goods_Add_model');
		$this->load->model('Template_model');
		$this->load->helper('common_function');
	}
	
	
	public function login()
	{
		$this->load->view('platformAdmin/login');
    }
	
	public function do_login()
	{
		$condition=array();
		$userName = $this->input->get_post('userName');
		$password = $this->input->get_post('password');
		if(!empty($userName))
			{
				$condition['ad_name'] = $userName;
			}
		if(!empty($password))
			{
				$condition['ad_password'] = $password;
			}		
		$data = $this->User_model->search_user_Admin($condition);		
		 if($data)
		{
			$this->load->view('platformAdmin/index');
		}
		else
		{
			$this->load->view('platformAdmin/login');
		}
		
		
    }
	
	
    public function control()
	{
		$this->load->view('platformAdmin/main');
    }
	
	
	public function button()
	{
		$this->load->view('platformAdmin/button');
    }
	
	public function form()
	{
		$this->load->view('platformAdmin/form');
    }
	
	public function shenhe()
	{
		$nums = 2;
		$data = $this->User_model->search_shenhe($nums,0);
		$total = $this->User_model->search_shenhe_num();		
		$page = ceil($total/$nums);
		 foreach($data as $k=>$v)
		{
            if($v['Company_Status'] == '0' )   
			{
				$data[$k]['Company_Status']='审核中';
			}
			else if($v['Company_Status'] == '1')
            {
				$data[$k]['Company_Status']='审核通过';
			}
	        else if($v['Company_Status'] == '2')
            { 
		        $data[$k]['Company_Status']='审核失败';
			}
		    else
			{
	            $data[$k]['Company_Status']=null;
            }		
        }
		$data2['info'] = $data;
		$data2['num'] = $page;
		$this->load->view('platformAdmin/Company_shenhe',$data2);
	}
	
	
	
	public function fenye_shenhe()
	{
		$nums = 2;
		$page = $this->input->get_post('page');
		$offset = ($page-1)*$nums;
		$data = $this->User_model->search_shenhe($nums,$offset);
		foreach($data as $k=>$v)
		{
            if($v['Company_Status'] == '0' )   
			{
				$data[$k]['Company_Status']='审核中';
			}
			else if($v['Company_Status'] == '1')
            {
				$data[$k]['Company_Status']='审核通过';
			}
	        else if($v['Company_Status'] == '2')
            { 
		        $data[$k]['Company_Status']='审核失败';
			}
		    else
			{
	            $data[$k]['Company_Status']=null;
            }		
        }
		//file_put_contents("D:\abc.txt",var_export($data,true)."\r\n",FILE_APPEND);
		//return echo (json_encode($data));
		echo json_encode($data);
		//die();
		//echo result_to_towf_new('1',$data);
		
	}
	
	public function shenhe_detail()
	{
		$condition = array();
		$TDC_id = $this->input->get_post('TDC_id');
		$condition['TDC_id'] = $TDC_id;
		$list = $this->User_model->search_user($condition);	
          if($list['CompanyType'] == '1')   
            {
			    $list['CompanyType']='农产品';
			}
           else if($list['CompanyType'] == '2')
            {
				$list['CompanyType']='家禽类';
			}
           else if($list['CompanyType'] == '3')
            {
				$list['CompanyType']='养殖类';
			}          
           else if($list['CompanyType'] == '4')
            {
				$list['CompanyType']='预包装';
			}
           else if($list['CompanyType'] == '5')
            {
				$list['CompanyType']='种植类';
			}
           else if($list['CompanyType'] == '6')
            {
				$list['CompanyType']='生产加工型企业';
			}
           else if($list['CompanyType'] == '7')
            {
				$list['CompanyType']='跨境电商企业';
			}
			else
			{
				$list['CompanyType']=null;
			}	
        $list1['info'] = $list;			
		$this->load->view('platformAdmin/Company_shenhe_details',$list1);
	}
	
	public function Company_do_shenhe()
	{
		
		$TDC_id['info'] = $this->input->get_post('tdc_id');
		$this->load->view('platformAdmin/Company_do_shenhe',$TDC_id);
	}
	
	
	public function shenhe_tijiao()
	{
		
		 $canshu= $this->input->get_post('data');
		 $total = json_decode($canshu,true);
         $TDC_id = $total['Tdc_id'];
		 $Company_Status = $total['quiz'];
		 if(isset($total['reason']))
		 {
			$Reason = $total['reason']; 
		 }
		 else
		 {
			 $Reason = null; 
		 }
		//file_put_contents("D:\abc.txt",$canshu."\r\n",FILE_APPEND);
		$data=array(
		  'Company_Status'=>$Company_Status,
		  'Reason'=>$Reason,
		);		
		$this->User_model->update($data,$TDC_id);
		echo result_to_towf_new('1','操作成功');
	}
	
	
	
	public function Goods_shenhe()
	{
		$condition = array();
		$condition['Goods_Status'] = 0;
		$field_Id['info'] = $this->Goods_Add_model->select_pipei($condition);
		//file_put_contents("D:\abc.txt",var_export($field_Id,true)."\r\n",FILE_APPEND);
		$this->load->view('platformAdmin/Goods_shenhe',$field_Id);
	}
	
	
	public function goods_shenhe_show()
	{
		$nums = 2;
		$field_Id = $this->input->get_post('data');
		$data = $this->Template_model->get_row_data($field_Id);
		$list = $this->Goods_Add_model->select_goods($field_Id,$nums,0);
		$total = $this->Goods_Add_model->select_goods_num($field_Id);
		$page = ceil($total/$nums);
		$field = unserialize($data['field']);
		foreach ($list as $key => $value)
		{
			$goods_data[$key] =unserialize($value['goods_data']);
			$goods_Id[$key] = $value['goods_Id'];
			$Goods_Status[$key] = $value['Goods_Status'];
		
            if($Goods_Status[$key] == '0' )   
			{
				$Goods_Status[$key] ='审核中';
			}
			else if($Goods_Status[$key]  == '1')
            {
				$Goods_Status[$key] ='审核通过';
			}
	        else if($Goods_Status[$key]  == '2')
            { 
		        $Goods_Status[$key] ='审核失败';
			}
		    else
			{
	            $Goods_Status[$key] =null;
            }		
        
		}
		//file_put_contents("D:\abc.txt",var_export($goods_data,true)."\r\n",FILE_APPEND);
		echo result_to_towf_new3('1',$field,$goods_data,$goods_Id,$Goods_Status,$page);
		//$this->load->view('platformAdmin/Goods_shenhe',$field_Id);
	}
	
	
	public function goods_shenhe_show_page()
	{
		$nums = 2;
		$field_Id = $this->input->get_post('field_id');
		$page = $this->input->get_post('page');
		$offset = ($page-1)*$nums;
		$data = $this->Template_model->get_row_data($field_Id);
		$list = $this->Goods_Add_model->select_goods($field_Id,$nums,$offset);
		$total = $this->Goods_Add_model->select_goods_num($field_Id);
		$field = unserialize($data['field']);
		foreach ($list as $key => $value)
		{
			$goods_data[$key] =unserialize($value['goods_data']);
			$goods_Id[$key] = $value['goods_Id'];
			$Goods_Status[$key] = $value['Goods_Status'];
		
            if($Goods_Status[$key] == '0' )   
			{
				$Goods_Status[$key] ='审核中';
			}
			else if($Goods_Status[$key]  == '1')
            {
				$Goods_Status[$key] ='审核通过';
			}
	        else if($Goods_Status[$key]  == '2')
            { 
		        $Goods_Status[$key] ='审核失败';
			}
		    else
			{
	            $Goods_Status[$key] =null;
            }		
        
		}
		//file_put_contents("D:\abc.txt",var_export($goods_data,true)."\r\n",FILE_APPEND);
		echo result_to_towf_new2('1',$field,$goods_data,$goods_Id,$Goods_Status);
		//$this->load->view('platformAdmin/Goods_shenhe',$field_Id);
	}
	
	public function goods_do_shenhe()
	{
		
		$goods_Id['info'] = $this->input->get_post('goods_Id');
		$this->load->view('platformAdmin/Goods_do_shenhe',$goods_Id);
	}
	
	
	
		public function shenhe_goods_tijiao()
	{
		
		 $chuandi= $this->input->get_post('data');
		 $total = json_decode($chuandi,true);
         $goods_Id = $total['goods_Id'];
		 $goods_status = $total['xuanze'];
		 if(isset($total['reason']))
		 {
			$Reason = $total['reason']; 
		 }
		 else
		 {
			 $Reason = null; 
		 }
		//file_put_contents("D:\abc.txt",$canshu."\r\n",FILE_APPEND);
		$data=array(
		  'Goods_Status'=>$goods_status,
		  'Reason'=>$Reason,
		);		
		$this->Goods_Add_model->update($data,$goods_Id);
		echo result_to_towf_new('1','操作成功');
	}
	
	
	public function tab()
	{
		$this->load->view('platformAdmin/tab');
	}
	
	
	public function auxiliar()
	{
		$this->load->view('platformAdmin/auxiliar');
	}
	
	public function begtable()
	{
		$this->load->view('platformAdmin/begtable');
	}
	
	public function navbar()
	{
		$this->load->view('platformAdmin/navbar');
	}
	
	public function icheck()
	{
		$this->load->view('platformAdmin/icheck');
	}
	
}
?>