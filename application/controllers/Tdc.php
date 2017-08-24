<?php

  class Tdc extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	
	public function show($page = 'index')
	{
		if (! file_exists(APPPATH.'/views/TDC/'.$page.'.php'))
		{
		  show_404();	
		}
		$data['title']=ucfirst($page);
		if(isset($_SESSION['User_Id']) && $_SESSION['User_Id'])
		{
			$this->load->view('TDC/' .$page,$data);
		}
        else
		{		
		   $this->load->view('TDC/login');	
		}		
	}
	
	
	public function error($page = 'login')
	{
		show_404();
	}
	
} 
?>


