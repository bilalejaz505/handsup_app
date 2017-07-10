<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lang extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
	
	public function index(){
		
		$lang = $this->input->post('lang'); 
		$rString = $this->input->post('rString');
		$rString = explode('/', $rString);
		
		$url = base_url();
		
		$i = 1;
		
		if($lang == 'arb'){
			$url = $url . 'ar/';
			$i = 0;
		}
		
		for($i;$i<sizeof($rString);$i++){
			if($rString[$i] != ''){
				$url .= $rString[$i] . '/';
			}
		}
		
		$this->session->set_userdata(array('lang'=>$lang));
		echo json_encode($url);
		exit;
	}
	
    public function toggle() {
        $lang = $this->input->post('lang');
        $this->session->set_userdata(array('lang'=>$lang));
        echo $this->session->userdata('lang');
    }
     public function toggleTele($URI,$lang=null) {
       
        if($lang!=null){
        $this->session->set_userdata(array('lang'=>$lang)); }

        $uri_array = explode("-", $URI);

        if($lang == 'eng'){

            redirect($uri_array[0].'/'.$uri_array[1].'/'.$uri_array[2].'/'.$uri_array[3]);  
      }else{
       
            redirect($uri_array[0].'/'.$uri_array[1].'/'.$uri_array[2].'/'.$uri_array[3]);  
      }  
        
    }

}
