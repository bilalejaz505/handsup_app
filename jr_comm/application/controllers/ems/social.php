<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Social extends CI_Controller {

	public $layout = 'admin_inner';
	
	
	 
	function __construct() {
		parent::__construct();
		$this->layout = 'admin_inner'; 	
                checkAdminSession();
    }
	
	//main index function for the controller dashboard
	//loding the main view
	public function index(){
		
	$this->load->model('ems/model_configuration');
	$rec['res']=$this->model_configuration->fetchRowSocialLink();
		{
			$this->load->view('ems/social/edit',$rec);
		}
	
		
	}
        
	public function manage(){
		
	$this->load->model('ems/model_configuration');
	$rec['res']=$this->model_configuration->fetchRowSocialLink();
		{
			$this->load->view('ems/social/edit',$rec);
		}
	
		
	}        

	
public function save(){
		$this->load->model('ems/model_configuration');
		$rec['res']=$this->model_configuration->fetchRowSocialLink();

		$id = $this->uri->segment(5);

		$data=array();
		$loggedInUserId=$this->session->userdata('id');
                                
                                /////// social setting /////////////
				 $data['soc_fb']=$this->input->post('soc_fb');
				 $data['soc_tw']=$this->input->post('soc_tw');
				 $data['soc_ins']=$this->input->post('soc_ins');
                 $data['soc_lin']=$this->input->post('soc_lin');
                 $data['soc_you']=$this->input->post('soc_you');
                 $data['soc_google']=$this->input->post('soc_google');  
				 $data['soc_rss']=$this->input->post('soc_rss');
				 $data['soc_printerest']=$this->input->post('soc_printerest');
				 $data['soc_dribbble']=$this->input->post('soc_dribbble');              
                           
                                                                                                
                                
                                
				$data['soc_created_at']=date('Y-m-d H:i:s');
				$data['soc_created_by']=$loggedInUserId;
                $data['pub_status']=$this->input->post('pub_val');
     			log_insert($this->uri->segment(2),'update a record in');
//					
					$data['soc_updated_at']=date('Y-m-d H:i:s');
					$data['soc_updated_by']=$loggedInUserId;
					$result=$this->model_configuration->updateSocial($data,$rec['res']->id);
					$this->session->set_flashdata('message', _okMsg('<p>Record Updated.</p>'));
				
					
				
					
					
					
			redirect($this->config->item('base_url') . 'ems/social');
			}

		
}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */