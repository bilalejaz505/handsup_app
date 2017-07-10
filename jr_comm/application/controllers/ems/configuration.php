<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class configuration extends CI_Controller {

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
	$rec['res']=$this->model_configuration->fetchRow();
	//$rec['lists']  = $this->cc->view_Lits();
		{
			$this->load->view('ems/configuration/edit',$rec);
		}
	
		
	}
        
	public function manage(){
		
	$this->load->model('ems/model_configuration');
	$rec['res']=$this->model_configuration->fetchRow();
		{
			$this->load->view('ems/configuration/edit',$rec);
		}
	
		
	}        

	
	public function save(){
		$this->load->model('ems/model_configuration');
		$id = $this->uri->segment(5);
		$data=array();
		$loggedInUserId=$this->session->userdata('id');
                                
                                /////// email setting /////////////
				$data['reachus_email']=$this->input->post('reachus_email');
				$data['sendinquiry_email']=$this->input->post('sendinquiry_email');
				$data['jobapp_email']=$this->input->post('jobapp_email');
                                $data['from_email']=$this->input->post('from_email');
                                $data['project_name']=$this->input->post('project_name');
                                                                                                
                                ///////// google analytics ///////////////
                                $data['ga_user']=$this->input->post('ga_user');
                                $data['ga_password']=$this->input->post('ga_password');
                                $data['ga_tracking_id']=$this->input->post('ga_tracking_id');
                                $data['ga_view_id']=$this->input->post('ga_view_id'); 
								$data['our_email']=$this->input->post('our_email'); 
								$data['phone']=$this->input->post('phone'); 
                                                                
                                ///////// smtp settings ///////////////
                                $data['smtp_host']=$this->input->post('smtp_host');
                                $data['smtp_email']=$this->input->post('smtp_email');
                                $data['smtp_password']=$this->input->post('smtp_password');
                                $data['smtp_port']=$this->input->post('smtp_port');
								$data['ctct_api_key']=$this->input->post('ctct_api_key');
								$data['ctct_token']=$this->input->post('ctct_token');
								$data['ctct_from_email']=$this->input->post('ctct_from_email');
								$data['ctct_list']=$this->input->post('ctct_list');
								///////// sms settings ///////////////
								$data['arb_sms']=$this->input->post('arb_sms');
                                $data['eng_sms']=$this->input->post('eng_sms');
                                
				$data['config_created_at']=date('Y-m-d H:i:s');
				$data['config_created_by']=$loggedInUserId;
                                $data['pub_status']=$this->input->post('pub_val');
                                
				$numRows=$this->model_configuration->fetchRow();
				if($numRows==false)
				{
                                        log_insert($this->uri->segment(2),'add a record in');	
                                        $result=$this->model_configuration->save($data);
                                        $this->session->set_flashdata('message', _okMsg('<p>Record Added.</p>'));
				}
				else 
				{
					log_insert($this->uri->segment(2),'update a record in');
//					debug($numRows);
					$rowId=$numRows->id;
					$data['config_updated_at']=date('Y-m-d H:i:s');
					$data['config_updated_by']=$loggedInUserId;
					$result=$this->model_configuration->update($data,$rowId);
					$this->session->set_flashdata('message', _okMsg('<p>Record Updated.</p>'));
				}
					
				$data2['res'][0]=$data;
					
					
					
			redirect($this->config->item('base_url') . 'ems/configuration');
			}


		
}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */