<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistics extends CI_Controller {

	public $layout = 'admin_inner';
	
	
	 
	function __construct() {
		parent::__construct();
		$this->layout = 'admin_inner'; 	
        checkAdminSession();
			
    }
	
	//main index function for the controller dashboard
	//loding the main view
	/*public function index(){
		
	
	$this->load->view('ems/statistics/default');	
	
		
	}*/
	public function index(){
		$this->manage();
	}
	
	public function manage(){
		
	$this->load->view('ems/statistics/manage');	
		 
	}
	
	public function traffic(){
			  
			  
		include_once APPPATH . "libraries/vendor/autoload.php";
        $this->load->model('ems/model_configuration');
        $configData = $this->model_configuration->fetchRow(1);
		$data['ga_view_id'] = $configData->ga_view_id;
				
		$service_account_email = 'maximal-cabinet-104112@appspot.gserviceaccount.com';
 		$key_file_location = APPPATH . "libraries/vendor/googlemap-7848789c3ad7.p12"; // this file is created from console developer google account
		

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
		  
		  $this->load->view('ems/statistics/traffic',$data);	
		 
	}
	
	
	public function siteusage(){
		include_once APPPATH . "libraries/vendor/autoload.php";
        $this->load->model('ems/model_configuration');
        $configData = $this->model_configuration->fetchRow(1);
		$data['ga_view_id'] = $configData->ga_view_id;
				
		$service_account_email = 'maximal-cabinet-104112@appspot.gserviceaccount.com';
 		$key_file_location = APPPATH . "libraries/vendor/googlemap-7848789c3ad7.p12"; // this file is created from console developer google account
		

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
		 
	$this->load->view('ems/statistics/siteusage',$data); 	 
		 
	}
	
	
	public function mapoverview(){
			include_once APPPATH . "libraries/vendor/autoload.php";
        $this->load->model('ems/model_configuration');
        $configData = $this->model_configuration->fetchRow(1);
		$data['ga_view_id'] = $configData->ga_view_id;
				
		$service_account_email = 'maximal-cabinet-104112@appspot.gserviceaccount.com';
 		$key_file_location = APPPATH . "libraries/vendor/googlemap-7848789c3ad7.p12"; // this file is created from console developer google account
		

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
		  
	$this->load->view('ems/statistics/mapoverview',$data);	
		 
	}
	
	
	public function trafficoverview(){
	     include_once APPPATH . "libraries/vendor/autoload.php";
        $this->load->model('ems/model_configuration');
        $configData = $this->model_configuration->fetchRow(1);
		$data['ga_view_id'] = $configData->ga_view_id;
				
		$service_account_email = 'maximal-cabinet-104112@appspot.gserviceaccount.com';
 		$key_file_location = APPPATH . "libraries/vendor/googlemap-7848789c3ad7.p12"; // this file is created from console developer google account
		

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
		  
          $this->load->view('ems/statistics/trafficoverview',$data);	
		 
	}
	
	public function add(){
		
	$this->load->view('ems/statistics/add');	
		 
	}
	
    
		
}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */