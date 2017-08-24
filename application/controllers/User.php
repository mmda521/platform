<?php
/**
* 
*/
class User extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('User_model');
		$this->load->helper('html');
	}
	public function UserInfo()
	{
		//error_reporting(0);
		$condition = array();
		$tdc_id=$_SESSION['Admin_id'];
		$condition['TDC_id']=$tdc_id;
		$list=$this->User_model->search_Info($condition);
		
    
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
            
           // $list2[$key] = $value['CompanyLogo'];
           
           // img($list2[$key]);  
			//file_put_contents('D:\123.txt',var_export($list2[$key],true)."\r\n",FILE_APPEND);

             $list1['info'] = $list;
            // $list1['list2'] = $list2;
        
		$this->load->view('TDC/TDC_Platform_UserInfo',$list1);
    }
       public function UserUpdate()
       {
       	   $tdcid = $this->input->get_post('tdcid');
		   if($tdcid == $_SESSION['TDC_id'])
		   {
			    $list['info'] = $this->User_model->get_row_data($tdcid);
                $this->load->view('TDC/TDC_Platform_UserUpdate',$list);
		   }
		   else
		   {
			   $this->load->view('TDC/Limit_denied'); 
		   }
	      
       }
       public function do_UserUpdate()
       {
       	    $tdcid=$this->input->get_post('tdcid');	
	        $companyName=$this->input->get_post('companyName');	
	        $ContactPerson=$this->input->get_post('contactPerson');
	        $phoneNumber=$this->input->get_post('phoneNumber');
	        $email=$this->input->get_post('email');

	        $data=array(
	          'CompanyName' => $companyName,
	  	      'ContactPerson' => $ContactPerson,
	  	      'PhoneNumber' => $phoneNumber,
	  	      'Email' => $email,
	        );
	        //PC::debug($data);
	       $this->User_model->update($data,$tdcid);
	       $this->load->view('TDC/TDC_Platform_UserUpdate_Result');
       }
}
?>