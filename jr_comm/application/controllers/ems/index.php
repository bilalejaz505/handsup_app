<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public $layout = 'admin';
	
	
	 
	function __construct() {
        parent::__construct();
       $this->layout = 'admin';
    }
	
	//main index function for the controller admin_login
	//loding the main view
	public function index(){
		
        //echo "Here";exit;
            
	$this->load->view('ems/admin_login');	
		 
	}
	
		
}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */