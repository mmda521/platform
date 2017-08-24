<?php
//用户表的数据库操作
class Qr_Code_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
	
   public function select_data($where1='',$where2='')
   {
	   $query = $this->db->select('*')->from('tdc_master')->where($where1)->where('TDC_TDC_id_Ref',$where2)->get();
	   $list = $query ->result_array();
	   return $list;
   }
   
   
   public function select_max()
   {
	   $query=$this->db->select('max(TDC_No)')->from('tdc_master')->get();
	   $list=$query->row_array();
	   return $list['max(TDC_No)'];
   }
   
   
   public function select_by_tdcNo($where1='',$where2='')
   {
	   $query=$this->db->select('*')->from('tdc_master')->where_in('TDC_TDC_id_Ref',$where1)->where_in('TDC_No',$where2)->get();
	   $list=$query->row_array();
	   return $list;
   }
   
   
   public function select_search($where='')
   {
	   $query=$this->db->select('*')->from('tdc_master')->where_in('TDC_No',$where)->where('TDC_Active','Y')->get();
	   $list=$query->row_array();
	   return $list;
   }
   
   
    public function insert_data($data='')
   {
	   $query=$this->db->insert('tdc_master',$data);
	   return 'ok';
   }
   
   
   public function update_data($data = '',$i = '')
	{
		$this->db->where('TDC_No',$i);
        $this->db->update('tdc_master',$data);	  
	    return 'ok';
	}
	
	
	public function select_total($where1='',$where2='',$where3='')
	{
	   $query=$this->db->select('count(TDC_No)')->from('tdc_master')->where('TDC_No>=',$where1)->where('TDC_No<=',$where2)->where('TDC_TDC_id_Ref',$where3)->get();
	   $list=$query->row_array();
	   return $list['count(TDC_No)'];
	}
	
	
	public function select_active($where1='',$where2='',$where3='')
	{
	   $query=$this->db->select('count(TDC_No)')->from('tdc_master')->where('TDC_No>=',$where1)->where('TDC_No<=',$where2)->where('TDC_Active','Y')->where('TDC_TDC_id_Ref',$where3)->get();
	   $list=$query->row_array();
	   return $list['count(TDC_No)'];
	}
	
	
	public function select_active_data($where1='',$where2='',$where3='')
	{
	   $query=$this->db->select('*')->from('tdc_master')->where('TDC_No>=',$where1)->where('TDC_No<=',$where2)->where('TDC_Active','Y')->where('TDC_TDC_id_Ref',$where3)->get();
	   $list=$query->result_array();
	   return $list;
	}
	
	
	public function select_noactive($where1='',$where2='',$where3='')
	{
	   $query=$this->db->select('count(TDC_No)')->from('tdc_master')->where('TDC_No>=',$where1)->where('TDC_No<=',$where2)->where('TDC_Active','N')->where('TDC_TDC_id_Ref',$where3)->get();
	   $list=$query->row_array();
	   return $list['count(TDC_No)'];
	}
	
	
	
	public function select_noactive_data($where1='',$where2='',$where3='')
	{
	   $query=$this->db->select('*')->from('tdc_master')->where('TDC_No>=',$where1)->where('TDC_No<=',$where2)->where('TDC_Active','N')->where('TDC_TDC_id_Ref',$where3)->get();
	   $list=$query->result_array();
	   return $list;
	}
	
}





