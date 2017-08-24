<?php
//用户表的数据库操作
class Qr_Code_UseScale_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
	
   public function select_QRNum($where1='',$where2='')
   {
	   $query = $this->db->select('count(TDC_No)')->from('tdc_master')->where($where1)->where($where2)->get();
	   $list = $query ->row_array();
	   return $list['count(TDC_No)'];
   }
   
   
   public function select_QRTypeNum($where1='',$where2='',$where3='')
   {
	   $query = $this->db->select('count(TDC_No)')->from('tdc_master')->where($where1)->where($where2)->where($where3)->get();
	   $list = $query ->row_array();
	   return $list['count(TDC_No)'];
   }

   //public function select_noactive($where1='',$where2='')
	//{
	   //$query=$this->db->select('count(TDC_No)')->from('tdc_master')->where('TDC_No>=',$where1)->where('TDC_No<=',$where2)->where('TDC_Active','N')->get();
	 // $list=$query->row_array();
	 //  return $list['count(TDC_No)'];
	//}
}
?>





