<?php
//用户表的数据库操作
class Seller_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
   
   public function get_row($where = '')
   {
	   $query = $this->db->select('TDC_ShopID')->from('tdc_shopinfo')->where_in('TDC_SellerName',$where)->get();
	   $list = $query->row_array();
	   return $list['TDC_ShopID'];   
   }
   
   
   
   public function shopinfo()
   {
	   $query = $this->db->select('*')->from('tdc_shopinfo')->get();
	   $list = $query->result_array();
	   return $list;
   }
   
   public function insert($data='')
   {
	   $query = $this->db->insert('tdc_shopinfo',$data);
	   return 'ok';
   }
   
   public function get_row_data($where='')
   {
	   $query=$this->db->select('*')->from('tdc_shopinfo')->where_in('TDC_ShopID',$where)->get();
	   $list=$query->row_array();
	   return $list;
   }
   
   
   public function update($data='',$shopid)
   {
	  $this->db->where('TDC_ShopID',$shopid);
	  $this->db->update('tdc_shopinfo',$data);
	  return 'ok';
   }
   
   public function delete($shopid)
   {	   
	   $this->db->where_in('TDC_ShopID',$shopid)->delete('tdc_shopinfo');
	   return 'ok';
   }
	
}
?>