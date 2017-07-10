<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log extends CI_Controller {

	public $layout = 'admin_inner';
	
	
	 
	function __construct() {
		parent::__construct();
		$this->layout = 'admin_inner'; 	
        checkAdminSession();
    }
	
	//main index function for the controller dashboard
	//loding the main view
/*	public function index(){
		
	
	$this->load->view('ems/log/default');	
	
		
	}*/
	public function index(){
		$this->manage();
	}
	
	public function manage(){
		
	$data['data']=$this->log_view();	
	
	$this->load->view('ems/log/manage',$data);	
		 
	}
	
	public function log_view(){
		$this->load->model('ems/model_log');	

		$array=$this->model_log->log_data();
	    return $array;
		 
	}	
}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */