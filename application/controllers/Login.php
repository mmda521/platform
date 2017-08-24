<?php

class Login extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('common_function');
		$this->load->library('session');
		$this->load->model('User_model');
		$this->load->model('Role_model');
	}
	
	
	
	public function index()
	{
		$this->load->view('TDC/interface');
	}
	
	
	public function register()//注册
	{
		$this->load->view('TDC/register');
	}
	
	
	public function do_register()
	{
		
		$username = $this->input->get_post('username');
		$userpw = $this->input->get_post('userpw');
	   //$cName=$this->input->get_post('companyName');
	   // $email=$this->input->get_post('email');
	    $data=array(
             'User_Id' => $username,
             'User_Password' => $userpw,
			 'User_Register_Time'=>date('Y-m-d H:i:s',time()),
			 'Company_Status' => 0,
	    	);
	    //PC::debug($data);
	    $this->User_model->insert($data);
		$user['data']=$this->db->insert_id();
		//echo result_to_towf_new('1','操作成功111');
	    $this->load->view('TDC/register_next',$user);
	}
	
	
	public function do_register_next()
	{
	    $tdcid = $this->input->get_post('tdcid');		
	    $companyName=$this->input->get_post('companyName');
	    $companyType = $this->input->get_post('companyType');
	    $contactPerson=$this->input->get_post('contactPerson');
	    $phoneNumber = $this->input->get_post('phoneNumber');
	    $email=$this->input->get_post('email');
		
		/*
		上传图片功能
		*/
		$file_logo = $_FILES['file_logo'];    //得到传输的数据
		$file_zizhi = $_FILES['file_zizhi']; 
		$filename = $file_logo['name'];  //得到文件名称

		$filename_zizhi = $file_zizhi['name'];  //得到文件名称
		$filetype = strtolower(substr($filename,strrpos($filename,'.')+1)); //得到文件类型
	    $filetype_zizhi = strtolower(substr($filename_zizhi,strrpos($filename_zizhi,'.')+1));
		$allowtype = array('jpg','jpeg','gif','png');   //定义允许上传的类型
		$max_size = '500000';           // 最大文件限制（单位：byte） 
		
		if(empty($filename))
		{
			echo "<font color='#FF0000'>上传企业logo不能为空！请重新上传！</font>";
			exit;
		}
		
        $filepath = "uploads_logo/".$filename;    //上传文件路径
		
		$filepath_zizhi = "uploads_zizhi/".$filename_zizhi; 
		$filepath1 = iconv("UTF-8","GB2312",$filepath);   //解决编码乱码问题
		$filepath1_zizhi = iconv("UTF-8","GB2312",$filepath_zizhi);  

		move_uploaded_file($file_logo['tmp_name'],$filepath1);
		//move_uploaded_file($file_logo['tmp_name'],$filepath1);
        if($_SERVER['REQUEST_METHOD']=='POST')     //判断提交方式是否为POST
		{
			if(!is_uploaded_file($file_zizhi['tmp_name']))     //判断上传文件是否存在
			{
				echo "<font color='#FF0000'>上传资质文件不存在</font>";
				exit;
			}
		}			
		if(!in_array($filetype_zizhi,$allowtype))       //判断文件类型是否被允许上传
		{
			// 如果不被允许，则直接停止程序运行
			echo "<font color='#FF0000'>上传资质文件格式不对！</font>";
			exit;
		}
		
		if($file_zizhi['size']>$max_size)          //判断文件大小是否大于500000字节
		{
			echo "<font color='#FF0000'>上传资质文件太大！请重新上传！</font>";
		    exit;
		}
		
		if(!move_uploaded_file($file_zizhi['tmp_name'],$filepath1_zizhi))
		{
			echo "<font color='#FF0000'>移动资质文件出错！</font>";
			exit;
		}
		else
		{
			//echo "<font color='#FF0000'>图片文件上传成功！</font><br/>";
			
			$data=array(
               'CompanyName' => $companyName,
               'CompanyType' => $companyType,
			   'CompanyLogo'=> $filepath,
			   'Company_Certification'=> $filepath_zizhi,
			   'ContactPerson' => $contactPerson,
               'PhoneNumber' => $phoneNumber,
               'Email' => $email,
			   'Is_Admin' => 1,
			   'Admin_id' => $tdcid,
			 
	    	);
	    //更新数据库操作
		$this->User_model->update($data,$tdcid);
		//echo result_to_towf_new('1','操作成功111');
	    $this->load->view('TDC/register_result');
		}
		
		
	}
	
	
	
	public function login_result($value='')
	{
		$condition=array();
		if(isset($_SESSION['User_Id']) && $_SESSION['User_Id'])
		{
			$role = $this->Role_model->search_role($_SESSION['User_role']);	
			$role1=explode(',',$role);
            $menu = $this->Role_model->search_menu($role1);	
			$result = array();
			if($menu)
			{
				foreach($menu as $k=>$v)
				{
					$result[$v['id']]  = $v ;
				}
			}
           $list['info'] = genTree9($result,'id','parent_id','items');	
		   $list['role'] = $role1;
		   if($value==''||$value!='admin')
			{			
			    $this->load->view('TDC/index',$list);             
			}		
			else
			{
				$this->load->view('platformAdmin/login');
			}
		}
		else
		{
			$username = $this->input->get_post('username');
			$userpw = $this->input->get_post('userpw');
			if(!empty($username))
			{
				$condition['User_Id'] = $username;
			}
			if(!empty($userpw))
			{
				$condition['User_Password'] = $userpw;
			}
			$data = $this->User_model->search_user($condition);
			if($data)
			{
				$this->session->set_userdata($data);
				$role = $this->Role_model->search_role($data['User_role']);	
				$role1=explode(',',$role);
				$menu = $this->Role_model->search_menu($role1);	
				$result = array();
				if($menu)
				{
					foreach($menu as $k=>$v)
					{
						$result[$v['id']]  = $v ;
					}
				}
			   $list['info'] = genTree9($result,'id','parent_id','items');	
			   $list['role'] = $role1;
			   // echo '<pre>';
			   // var_dump($list);		   
			   // echo '</pre>';
			   // die;
				if($value==''||$value!='admin')
				{			
					$this->load->view('TDC/index',$list);             
				}		
				else
				{
					$this->load->view('platformAdmin/login');
				}
			}
			else
			{
				 $this->load->view('TDC/login');      
			}
		}
		
		
	}
	
	
	public function logout()
	{
		if(isset($_SESSION['User_Id']) && $_SESSION['User_Id'])
		{
			$this->session->sess_destroy();
			//session_destroy();
			$this->load->view('TDC/login');
		}
	}
}
?>