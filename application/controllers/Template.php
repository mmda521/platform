<?php
class Template extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Template_model');
	}
	
	
	
	public function templateInfo()
	{
		$tdc_id = $_SESSION['Admin_id'];
		$list = $this->Template_model->get_data($tdc_id);
		if(isset($list)&&!empty($list))
		{
			 foreach ($list as $key => $value)
		  {
			  $data['info'][$key] = unserialize($value['field']);
			  $data['info'][$key]['field_Id'] = $value['field_Id'];
		 	
		  }
		 
		}
		else
		{
			$data = array();
		}
		$this->load->view('TDC/TDC_Platform_templateInfo',$data);
		
		/* echo('<table>');
		foreach($data as $fields){
			echo($fields);
			print_r($fields);
			echo('</br>');
			echo('<tr>');
			foreach($fields as $field){
			echo('<td>'.$field.'</td>');
			}
			echo('</tr>');
		}
		echo('</table>'); */
		
		
	}
	
	
	
	
	public function add_template()
	{
		$this->load->view('TDC/TDC_Platform_TemplateAdd');
	}
	
	public function do_add_template()
	{
		$var=$this->input->get_post('data[]');		
		
		$data=array(
		'field'=>serialize($var),
		'AddTime'=>date('y-m-d H:i:s',time()),
		'TDC_id'=>$_SESSION['Admin_id'],
		);
		/*  echo '<pre>';
		echo var_dump($data);
		echo '</pre>';
		die;  */
		$this->Template_model->insert($data);
		$this->load->view('TDC/TDC_Platform_templateAdd_Result');
	}
	
	
	public function templateUpdate()
	{
		 if($_SESSION['Admin_id'] == $_SESSION['TDC_id'])
		 {
			$tpid = $this->input->post_get('tpid');
			$data = $this->Template_model->get_row_data($tpid);
			$var = unserialize($data['field']);
			$list['field_Id']=$data['field_Id'];
			$list['field']=$var;
			/* echo '<pre>';
			echo var_dump($list);
			echo '</pre>';
			die;  */
			$this->load->view('TDC/TDC_Platform_templateUpdate',$list);
		 }
		 else
		 {
			$this->load->view('TDC/Limit_denied'); 
		 }
		
	}
	
	
	public function do_templateUpdate()
	{
		$tpid = $this->input->post_get('tpid');
		$tpName = $this->input->post_get('tpName');
		/* echo $tpid;
		echo '<pre>';
		echo var_dump($tpName);
		echo '</pre>';
		die;  */
		$data=array(
		'field'=>serialize($tpName),
		);
		
		$this->Template_model->update($data,$tpid);
		$this->load->view('TDC/TDC_Platform_templateUpdate_Result');
	}
	
	
	
	public function templateDelete()
	{
		$tpid = $this->input->post_get('tpid');
	    $this->Template_model->delete($tpid);
		$this->load->view('TDC/TDC_Platform_templateDel_Result');
	}
	  
 } 
?>