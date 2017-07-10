<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login extends CI_Controller {

	public $layout = 'admin';
	
	
	 
	function __construct() {
        parent::__construct();
       $this->layout = 'admin';
    }
	
	//main index function for the controller admin_login
	//loding the main view
	public function index(){
		

	$this->load->view('ems/admin_login');	
		 
	}
        
        public function get_pw($hash)
        {
            echo generatePassword($hash);
        }
	
	
     //query the credentials from the database
	//and add the user details in session in case of success
	//or redirect in case of wrong credentials 	
	 function login() 
	 {
		
		
       
        $this->form_validation->set_rules('username', 'username', 'trim|required','');
        $this->form_validation->set_rules('password', 'password', 'trim|required','');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if ($this->form_validation->run() == FALSE) 
		{
		    $this->load->view('ems/admin_login');
		} 
		else 
		{   
               $this->load->model('ems/model_login'); 
			$hash_passwd = generatePassword($this->input->post('password'));
			
			$result = $this->model_login->admin_login($this->input->post('username'), $hash_passwd);
		
		    if ($result) 
			{
			    foreach ($result as $row) 
				{
                                    $this->load->model('ems/model_cmsuser');
                                    $site_name = $this->model_cmsuser->getsitename(1);                                
                                    $this->session->set_userdata(array('logged_in' => TRUE, 'id' => $row->id, 'usr_uname' => $row->usr_uname,'usr_level' => $row->usr_level,'site_id' => '1','site_name' => $site_name));
				    $usr_level=$row->usr_level;
				   
                                }
				
			
				
				// user level restrction for Super user & normal cms user
				$this->session->set_userdata("usr_level",$usr_level);	
                                redirect($this->config->item('base_url') . 'ems/dashboard/manage');//for cms user

            } 
			else 
			{
				
                $this->session->set_flashdata('message', _erMsg2('<p>Invalid username or password.</p>'));
                redirect($this->config->item('base_url') . 'ems/admin_login');
            }
         }
    }
	
	
	//function to logout the user 	
    function logout() {
      	
       // $this->session->unset_userdata(array('logged_in' => FALSE, 'id' => '', 'usr_uname' => '','usr_level' => ''));
	   $this->session->userdata = array();
        $this->session->sess_destroy();
        $this->session->sess_create(); 
        //$this->session->set_flashdata('message', _okMsg2('You have successfully logged out.'));
        redirect($this->config->item('base_url') . 'ems/admin_login');
    }	  
	
	
	 	
    function forgot_password() {
      	
		 $this->load->model('ems/model_login'); 
         	$res= $this->model_login->check_user($this->input->post('name'),$this->input->post('email'));
			if($res==1){
				
					$hash_passwd = generatePassword('newpassword');
				    $this->model_login->update_user($this->input->post('name'),$this->input->post('email'),$hash_passwd);
					
				
				$fr='admin@nesma.com';
				$em=$this->input->post('email');
				
				
				$this->load->library('email');
                
				$config['protocol'] = 'mail';
				$config['charset'] = 'iso-8859-1';
				$config['mailtype'] = 'html';
				$config['wordwrap'] = TRUE;
				
				$this->email->initialize($config);
				
				$this->email->from($em, $fr);
				
				$this->email->to($em);
				$this->email->subject('Recover Password');
				
			    $message='
						<style>
												@charset "utf-8";
						/* CSS Document */
						
						body{ width:100%; background:#fff; margin:0; padding:0; }
						
						.mainWrap{ width:600px; height:auto; margin:auto;}
						
						.topbar{ float:left; width:600px; height:20px; background:#0085b2;}
						
						.topLogoContainer{ float:left; width:600px; height:auto; padding:8px 0px 8px 0px;}
						
						.NesmaEmailLogo{ float:left; background:url(images/nesmaLogoEmailTemp.png) no-repeat; border:none; width:160px; height:53px;}
						
						.ColorBg{ background:#444444; width:440px; height:53px; float:left;}
						
						.descWrap{ width:580px; height:auto; margin-top:30px; padding:10px; background:#eeeeee; float:left;margin-bottom: 10px; }
						
						.title{ float:left; width:550px; height:auto; font-family:Arial, Helvetica, sans-serif; color:#666; font-size:12px; font-weight:bold;}
						
						.detail{ color: #333333;
							float: left;
							font-family: Arial,Helvetica,sans-serif;
							font-size: 12px;
						 
							height: auto;
							line-height: 1.6;
							padding-top: 10px;
							width: 575px;}
							
							.signature{float:left; width:550px; height:auto; font-family:Arial, Helvetica, sans-serif; color:#666; font-size:12px; font-weight:bold;}
							
							.footerStrip{ float:left; width:600px; height:30px; background:#444444;}
						
						</style>
						
						</head>
						
						<body>
						
						<div class="mainWrap">
						
						<div class="topbar"></div>
						
						
						<div class="topLogoContainer">
						
						<div class="NesmaEmailLogo"> </div>
						
						<div class="ColorBg"> </div>
						
						
						 </div>
						 
						 
						 
						 <div class="descWrap">
						 
						 
						 <div class="title"> Dear '.$this->input->post('name').' ,<br></div>
						 
						 Your new Password to access the system is generated by the system which is '.$hash_passwd.'<br>
						 Now you can login to your account with new Password<br>
						 http://http://localhost/nesma/ems/admin_login.
						 
						 </div>
						 <div class="signature"> Nesma</div>
						 </div>
						 
						<div class="footerStrip"> </div>
						</div>
						
						';
				
				
				$this->email->message($message);
				
				$this->email->send();
					
				
				$this->session->set_flashdata('message', _okMsg2('<p>Email Sent Successfully.</p>'));
                redirect($this->config->item('base_url') . 'ems/admin_login');
				
			}else{
				
				$this->session->set_flashdata('message', _erMsg2('<p>Invalid username or email .</p>'));
                redirect($this->config->item('base_url') . 'ems/admin_login');
			}
    }	  
		  
		
}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */