<?php
//用户表的数据库操作
class Goods_Add_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
  
  public function get_data($where = '')
  {
	$query = $this->db->distinct('field_Id')->select('field_Id')->from('tdc_goods')->where_in('TDC_id',$where)->get();  
	$list = $query->result_array();
	return $list;
  }
  
  public function select_data($where1 = '',$where2 = '')
  {
	$query = $this->db->select('*')->from('tdc_goods')->where_in('TDC_id',$where1)->where_in('field_Id',$where2)->get();  
	$list = $query->result_array();
	return $list; 
  }
  
  
  
  public function select_data1($where1 = '',$where2 = '')
  {
	$query = $this->db->select('*')->from('tdc_goods')->where_in('TDC_id',$where1)->where_in('field_Id',$where2)->where('Goods_Status',1)->get();
	$list = $query->result_array();
	return $list;
 }
  
  
  public function select_goods($where = '',$limit = '', $offset = '')
  {
	  $query = $this->db->select('*')->from('tdc_goods')->where('field_Id',$where)->where('Goods_Status!=',1)->order_by('AddTime','desc')->limit($limit,$offset)->get();
	  $list = $query->result_array();
	  return $list;
  }
  
   public function select_goods_num($where = '')
  {
	  $query = $this->db->select('count(*)')->from('tdc_goods')->where('field_Id',$where)->where('Goods_Status!=',1)->order_by('AddTime','desc')->get();
	  $list = $query->row_array();
	  return $list['count(*)'];
  }
  
  
  public function select_data_row($where = '')
  {
	  $query = $this->db->select('goods_data')->from('tdc_goods')->where_in('goods_Id',$where)->get();
      $list = $query->row_array();
	  return $list;
  }
  
  
  
  public function select_row($where = '')
  {
	  $query = $this->db->select('*')->from('tdc_goods')->where_in('goods_Id',$where)->get();
      $list = $query->row_array();
	  return $list;
  }
  
  public function select_pipei($where = '')
  {
	  $query = $this->db->distinct('field_Id')->select('field_Id')->from('tdc_goods')->where($where)->order_by('AddTime','desc')->get();
	  $list = $query->result_array();
	  return $list;
  }
  
   public function insert($data = '')
   {
      $this->db->insert('tdc_goods',$data);
	  return 'ok';
   }
   
   
   public function update($data = '',$goods_Id = '')
   {
	   $this->db->where('goods_Id',$goods_Id);
	   $this->db->update('tdc_goods',$data);
	   return 'ok';
   }
   
   
   public function delete($goods_Id = '')
   {
	   $this->db->where_in('goods_Id',$goods_Id)->delete('tdc_goods');
	   return 'ok';
   }
 
}
?>





