<?php
/**
* 
*/
class Limit extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Role_model');
		$this->load->model('User_model');
		$this->load->helper('common_function');
	}
	
	
	public function admin_list()
	{
		if($_SESSION['TDC_id']==$_SESSION['Admin_id'])
		{
			$Admin_id = $_SESSION['Admin_id'];
			$list = $this->User_model->select_list($Admin_id);
			foreach($list as $key => $value)
			{
				$role_name = $this->Role_model->search_role_name($list[$key]['User_role']);

				$list[$key]['User_role']= $role_name;
			}
			// echo "<pre>";
			// var_dump($list);
			// echo "</pre>";
			// die;
			$data['info']= $list;
			$this->load->view('TDC/TDC_Platform_UserList',$data); 
		}
		else
		{
			$this->load->view('TDC/Limit_denied'); 
		}

		
	}
	
	
	public function admin_update()
	{
		$TDC_id = $this->input->get_post("tdcid");
		$list = $this->User_model->get_row_data($TDC_id);
		$data = $this->Role_model->search_all();
		$var['info'] = $list; 
		$var['data'] = $data; 
		$this->load->view('TDC/TDC_Platform_UserList_Update',$var); 
	}
	
	public function admin_do_update()
	{
		$TDC_id = $this->input->get_post("TDC_id");
		$limit_group = $this->input->get_post("limit_group");
		$data = array(
		'User_role'=>$limit_group,		
		);
		$this->User_model->update($data,$TDC_id);
		$this->load->view('TDC/TDC_Platform_UserList_Update_Result'); 
	}
	
	
	
	public function admin_delete()
	{
		$TDC_id = $this->input->get_post("tdcid");
		$this->User_model->delete($TDC_id);
		$this->load->view('TDC/TDC_Platform_UserList_delete_Result'); 
	}
	
	
	public function admin_add()
	{
		if($_SESSION['TDC_id']==$_SESSION['Admin_id'])
		{
			$TDC_id = $_SESSION['TDC_id'];
			$role['info'] = $this->Role_model->select_Role_id($TDC_id);
			$this->load->view('TDC/Admin_Add',$role); 
		}
		else
		{
			$this->load->view('TDC/Limit_denied'); 
		}
		
	}
	
	
	public function admin_do_add()
	{
		$TDC_id = $_SESSION['TDC_id'];
		$username = $this->input->get_post("username1");
		$password = $this->input->get_post("password1");
        $limit_name = $this->input->get_post("limit_name");
		$data = array(
		'User_Id'=>$username,
		'User_Password'=>$password,
		'User_role'=>$limit_name,
		'User_Register_Time'=>date('Y-m-d H:i:s',time()),
		'Admin_id'=>$TDC_id ,
		);
		$this->User_model->insert($data);
		$this->load->view('TDC/admin_add_Result'); 
	}
	
     
	 public function limit_list()
	{
		$Admin_id = $_SESSION['Admin_id'];
		$role['info'] = $this->Role_model->select_Role_id($Admin_id);
		$this->load->view('TDC/Limit_List',$role); 
	}
	
	
	public function Limit_update()
	{
		$Role_id = $this->input->get_post("Role_id");
		$role = $this->Role_model->search_role($Role_id);
		$role1=explode(',',$role);
		$menu = $this->Role_model->search_menu_all();	
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
		$list['Role_id'] = $Role_id;
		$this->load->view('TDC/Limit_Update',$list); 
	}
	
	
	
	public function Limit_do_update()
	{
		$Role_id = $this->input->get_post("Role_id");
		$role1= $this->input->get_post("role");
		$role = implode(',',$role1);
		$data = array(
		'Menu_id'=>$role,		
		);
		$this->Role_model->update_role($data,$Role_id);
		$this->load->view('TDC/Limit_Update_Result'); 
	}
	
	
	
	public function Limit_delete()
	{
		$Role_id = $this->input->get_post("Role_id");
		$list = $this->User_model->search_User_role($Role_id);
		if(isset($list)&&!empty($list))
		{
			foreach ($list as $k => $v)
			{
				$data=array(
				'User_role'=>null,
				);
				$this->User_model->update($data,$list[$k]['TDC_id']);
			}
		
		}
		$this->Role_model->delete($Role_id);
		$this->load->view('TDC/Limit_delete_Result'); 
	}
	
	
	public function limit_add()
	{ 
	    if($_SESSION['TDC_id']==$_SESSION['Admin_id'])
		{
			$User_role = $_SESSION['User_role'];
			$role = $this->Role_model->search_role($User_role);
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
			$this->load->view('TDC/Limit_Add',$list); 
		}
		else
		{
			$this->load->view('TDC/Limit_denied'); 
		}

		
	}
	
	
	public function limit_do_add()
	{
		$Admin_id = $_SESSION['Admin_id'];
		$limit_name = $this->input->get_post("limit_name");
		$role1 = $this->input->get_post("role");
        $role = implode(',',$role1);
		$data = array(
		'Role_name'=>$limit_name,
		'Menu_id'=>$role,
		'Create_time'=>date('Y-m-d H:i:s',time()),
		'Admin_id'=>$Admin_id ,
		);
		$this->Role_model->insert_role($data);
		$this->load->view('TDC/Limit_Add_Result'); 
	}
}
?>