<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AjaxCon extends CI_Controller {

    
    function __construct() {
        parent::__construct();
       
        checkAdminSession();
		$this->load->model('ems/model_contents');
		$this->load->model('ems/model_content_images');
    }
    
	
	
	
	 public function checkUniquePageTitle() {
        $title = $_POST['page_title'];
        echo $result = $this->model_contents->checkUniquePageTitle($title).'@@';exit();
    }
	
	
}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */