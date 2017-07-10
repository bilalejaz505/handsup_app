<?php

class ft_ctct extends CI_Controller
{
    public function __construct()
    {
       parent::__construct();
	   $this->layout = 'admin_inner';
	   $this->load->library('cc');
	   	$this->load->model('ems/model_configuration');

		//checkAdminSession();
    }
    
	
	 public function index()
    {
		$this->cc->addContacts();
        if(isset($_POST['from_frontend']))
		{
			echo "User Subscribed";
			exit();
		}
		else
		{
			redirect($this->config->item('base_url'));
		}
                
    }
	
    
  
}