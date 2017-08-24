<?php
//用户表的数据库操作
class User_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	  
	 
    /*从用户表查询数据 */	 
	public function search_user($where='')
	{
		$query = $this->db->select('*')->from('tdc_user')->where($where)->get();
		$list = $query->row_array();
		return $list;		
	}

	
	 /*从用户表查询数据 */	 
	public function search_user_Admin($where='')
	{
		$query = $this->db->select('*')->from('tdc_admin')->where($where)->get();
		$list = $query->row_array();
		return $list;		
	}
	
	
	
	 /*从用户表查询数据 */	 
	public function search_shenhe($limit = '', $offset = '')
	{
		$query = $this->db->select('*')->from('tdc_user')->where('Company_Status!=',1)->order_by('User_Register_Time','desc')->limit($limit,$offset)->get();
		$list = $query->result_array();
		return $list;		
	}
	
	
	 /*从用户表查询数据 */	 
	public function search_shenhe_num()
	{
		$query = $this->db->select('count(*)')->from('tdc_user')->where('Company_Status!=',1)->order_by('User_Register_Time','desc')->get();
		$list = $query->row_array();
		return $list['count(*)'];		
	}
	
	
   public function search_user_Password($username,$userpassword){
        	$query = $this->db->select('*')->from('tdc_user')->where('User_Id',$username)->where('User_Password',$userpassword)->get();
            $list = $query->row_array();
			//PC::debug($query);
            return $list;
    	}

		
		public function search_User_role($where='')
	{
		$query = $this->db->select('*')->from('tdc_user')->where_in('User_role',$where)->get();
		$list = $query->result_array();
		return $list;		
	}
	
	
		
   public function insert($data="")
   {
	   $this->db->insert('tdc_user',$data);
	   return 'ok';
   }   
	
	
	 public function update($data='',$tdcid='')
   {
	  $this->db->where('TDC_id',$tdcid);
	  $this->db->update('tdc_user',$data);
	  return 'ok';
   }
   
    public function delete($tdcid = '')
   {
	  $this->db->where_in('TDC_id',$tdcid)->delete('tdc_user');    
	  return 'ok';
   }
   
    public function search_Info($where='')
   {
        $query = $this->db->select('*')->from('tdc_user')->where($where)->get();
        $list = $query->row_array();
        return $list;
   }
   
   
   
    public function get_row_data($where='')
   {
	   $query=$this->db->select('*')->from('tdc_user')->where_in('TDC_id',$where)->get();
	   $list=$query->row_array();
	   return $list;
   }
   
	 public function select_list($where='')
   {
	   $query=$this->db->select('*')->from('tdc_user')->where_in('Admin_id',$where)->where('TDC_id!=',$where)->get();
	   $list=$query->result_array();
	   return $list;
   }
   
}





