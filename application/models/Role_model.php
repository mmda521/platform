<?php
//用户表的数据库操作
class Role_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	  
	 
    /*从用户表查询数据 */	 
	public function search_role($where='')
	{
		$query = $this->db->select('Menu_id')->from('tdc_role')->where('Role_id',$where)->get();
		$list = $query->row_array();
		return $list['Menu_id'];		
	}
	
	
	 /*从用户表查询数据 */	 
	public function search_role_name($where='')
	{
		$query = $this->db->select('Role_name')->from('tdc_role')->where('Role_id',$where)->get();
		$list = $query->row_array();
		return $list['Role_name'];		
	}


	
	 /*从用户表查询数据 */	 
	public function search_menu($where = '')
	{
		$query = $this->db->select('*')->from('tdc_menu')->where_in('id',$where)->order_by('id','asc')->get();
		$list = $query->result_array();
		return $list;		
	}
	
	
	 /*从用户表查询数据 */	 
	public function search_menu_all()
	{
		$query = $this->db->select('*')->from('tdc_menu')->get();
		$list = $query->result_array();
		return $list;		
	}
	
	
	public function select_menu($where = '')
	{
		$query = $this->db->select('*')->from('tdc_menu')->where_in('id',$where)->get();
		$list = $query->result_array();
		return $list;	
	}
	
	
	public function search_all()
	{
		$query = $this->db->select('*')->from('tdc_role')->get();
		$list = $query->result_array();
		return $list;	
	}
	
	
	public function select_Role_id($where = '')
	{
		$query = $this->db->select('*')->from('tdc_role')->where_in('Admin_id',$where)->get();
		$list = $query->result_array();
		return $list;	
	}
   
   
   public function insert_role($data = '')
   {
	   $this->db->insert('tdc_role',$data);
	   return 'ok';
   }
   
   
     public function update_role($data='',$Role_id='')
   {
	   $this->db->where('Role_id',$Role_id);
	   $this->db->update('tdc_role',$data);
	   return 'ok';
   }
   
   
   
     public function delete($Role_id = '')
   {
	  $this->db->where_in('Role_id',$Role_id)->delete('tdc_role');    
	  return 'ok';
   }
	
}





