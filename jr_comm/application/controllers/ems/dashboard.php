<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $layout = 'admin_inner';
	
	
	 
	function __construct() {
        parent::__construct();
        $this->layout = 'admin_inner';
        checkAdminSession();
    }
	
	//main index function for the controller dashboardlog
	//loding the main view
	public function index(){
		
	    	 include_once APPPATH . "libraries/vendor/autoload.php";
        // $service_account_email = 'nesma-632@nesma-1216.iam.gserviceaccount.com';
		
		        $this->load->model('ems/model_configuration');
                $configData = $this->model_configuration->fetchRow(1);
				$data['ga_view_id'] = $configData->ga_view_id;
				
		$service_account_email = 'maximal-cabinet-104112@appspot.gserviceaccount.com';
 		
		//$key_file_location = APPPATH . "libraries/vendor/Nesma-0684e421b44b.p12";//
		$key_file_location = APPPATH . "libraries/vendor/googlemap-7848789c3ad7.p12";
		// $key_file_location =  __DIR__ . '/Nesma-0684e421b44b.p12'; 	

  // Create and configure a new client object.
		  $client = new Google_Client();
		  $client->setApplicationName("Analytics");
		  $analytics = new Google_Service_Analytics($client);

  // Read the generated client_secrets.p12 key.
		  $key = file_get_contents($key_file_location);
		  $cred = new Google_Auth_AssertionCredentials(
			  $service_account_email,
			  array(Google_Service_Analytics::ANALYTICS_READONLY),
			  $key
		  );
		  $client->setAssertionCredentials($cred);
		  if($client->getAuth()->isAccessTokenExpired()) {
			$client->getAuth()->refreshTokenWithAssertion($cred);
		  }
		
		 
		  $res = json_decode($client->getAccessToken());
		  $data['analytics'] = $res->access_token;
		 // echo $data['analytics'];exit();
		  $data['data']=$this->log_view();
		  $this->load->view('ems/dashboard/dashboard',$data);
		 
	}
	
	public function manage(){
		
		
		 include_once APPPATH . "libraries/vendor/autoload.php";
        // $service_account_email = 'nesma-632@nesma-1216.iam.gserviceaccount.com';
		
		        $this->load->model('ems/model_configuration');
                $configData = $this->model_configuration->fetchRow(1);
				$data['ga_view_id'] = $configData->ga_view_id;
				
		$service_account_email = 'maximal-cabinet-104112@appspot.gserviceaccount.com';
 		
		//$key_file_location = APPPATH . "libraries/vendor/Nesma-0684e421b44b.p12";//
		$key_file_location = APPPATH . "libraries/vendor/googlemap-7848789c3ad7.p12";
		// $key_file_location =  __DIR__ . '/Nesma-0684e421b44b.p12'; 	

  // Create and configure a new client object.
		  $client = new Google_Client();
		  $client->setApplicationName("Analytics");
		  $analytics = new Google_Service_Analytics($client);

  // Read the generated client_secrets.p12 key.
		  $key = file_get_contents($key_file_location);
		  $cred = new Google_Auth_AssertionCredentials(
			  $service_account_email,
			  array(Google_Service_Analytics::ANALYTICS_READONLY),
			  $key
		  );
		  $client->setAssertionCredentials($cred);
		  if($client->getAuth()->isAccessTokenExpired()) {
			$client->getAuth()->refreshTokenWithAssertion($cred);
		  }
		
		 
		  $res = json_decode($client->getAccessToken());
		  $data['analytics'] = $res->access_token;
		 // echo $data['analytics'];exit();
		  $data['data']=$this->log_view();
		  $this->load->view('ems/dashboard/dashboard',$data);
		
		//echo "before if"; exit();
		
	    	/*$this->load->library('gapi'); 
                $this->load->model('ems/model_configuration');
                $configData = $this->model_configuration->fetchRow(1);*/
                
			/*
			$arr=$this->gapi->authenticateUser('wahid.k@utrade.co','utrade123!@#');
			$ga_profile_id='66565118';
			*/
							/*	if(!empty($configData->ga_user)){ 
             try{
			$arr=$this->gapi->authenticateUser($configData->ga_user,$configData->ga_password);
			$ga_profile_id = $configData->ga_view_id;
                        $this->gapi->requestReportData($ga_profile_id, array('date'),array('pageviews'), 'date');        
			$data['results'] = $this->gapi->getResults();
			
			$start_date = date('Y-m-d',strtotime('-10 day'));
			$end_date=date('Y-m-d');
			$dimensions	= array('country');
			$metrics	= array('visits');
			$this->gapi->requestReportData($ga_profile_id,$dimensions,$metrics,null,null);
			$data['results2'] = $this->gapi->getResults();
			
			
			$dimensions	= array('source');
			$metrics	= 'visits';
			$this->gapi->requestReportData($ga_profile_id,$dimensions,$metrics,null,null);
			$data['results3'] = $this->gapi->getResults();
			
		
                        $this->gapi->requestReportData($ga_profile_id, array('date'),array('visits'), 'date',null,null,null,null,7);        
			$data['results4'] = $this->gapi->getResults();
			 }catch(Exception $e){
				
				 
				 }
								}
                        $data['data']=$this->log_view();
		
		$this->load->view('ems/dashboard/dashboard',$data);	*/
		 
	}
	
	
    public function log_view(){
		$this->load->model('ems/model_dashboard');	
	    $site_id=$this->session->userdata('site_id');
		
		$array=$this->model_dashboard->log_data($site_id);
	    return $array;
		 
	}
	
	
	 public function contact(){
		
		$this->load->model('ems/model_dashboard');	
		       
			  //  $data = $this->model_dashboard->getUserData($uid);
				
				$fr=$this->input->post('name');
				$em=$this->input->post('email');
				$inner_msg=$this->input->post('desc');
				
				$this->load->library('email');
                

				$config['protocol'] = 'mail';
				$config['charset'] = 'iso-8859-1';
				$config['mailtype'] = 'html';
				$config['wordwrap'] = TRUE;
				
				$this->email->initialize($config);
				
				$this->email->from($em);
				
				$this->email->to('support@edesign.com.sa');
				$this->email->subject('New Message from Member');
				
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
						 
						 
						 <div class="title"> Dear Admin ,<br></div>
						 
						 <div class="detail">From'.$fr.'<br>'.$inner_msg.'</div>
						 <div class="signature"> Nesma</div>
						 </div>
						 
						<div class="footerStrip"> </div>
						</div>
						
						';
				
				
				$this->email->message($message);
				
				$this->email->send();
		
		
		$this->load->view('ems/dashboard/dashboard');	
		 
	}
	
    
		
}

