<?php
//用户表的数据库操作
class Template_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
  
    public function get_data($where = '')
   {
	  $query = $this->db->select('*')->from('tdc_field')->where_in('TDC_id',$where)->order_by('AddTime','desc')->get();
	  $list = $query->result_array();
	  return $list;
   }
 

    public function get_row_data($where='')
   {
	   $query=$this->db->select('*')->from('tdc_field')->where_in('field_Id',$where)->get();
	   $list=$query->row_array();
	   return $list;
   }
   
 
	 public function select_data($where='')
	 {
		$query = $this->db->select('field_Id')->from('tdc_field')->where_in('TDC_id',$where)->get();
	    $list = $query->result_array();
		return $list;
	 }
 
 
	 public function insert($data='')
   {
	   $query = $this->db->insert('tdc_field',$data);
	   return 'ok';
   }

   

    public function update($data='',$tpid)
   {
	  $this->db->where('field_Id',$tpid);
	  $this->db->update('tdc_field',$data);
	  return 'ok';
   }

   
    public function delete($where='')
   {	   
	   $this->db->where_in('field_Id',$where)->delete('tdc_field');
	   return 'ok';
   }
}
?>





