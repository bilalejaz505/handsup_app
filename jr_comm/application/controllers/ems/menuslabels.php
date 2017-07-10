<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menuslabels extends CI_Controller {

	public $layout = 'admin_inner';
	
	
	 
	function __construct() {
		parent::__construct();
		$this->layout = 'admin_inner'; 	
        checkAdminSession();
    }
	
	//main index function for the controller dashboard
	//loding the main view
	public function index(){
		
	
	$this->load->view('ems/menuslabels/default');	
	
		
	}
	
	public function manage(){
		
	$this->load->view('ems/menuslabels/manage');	
		 
	}
	
    public function users(){
		
	$res='';
		$this->load->model('ems/model_members');
		$data['res']=$this->model_members->fetchAll();
		if(sizeof($data)>0)
		{
			$this->load->view('ems/members/users',$data);	
		}	
		
	
		 
	}
	
	public function billing(){
		
	$this->load->view('ems/members/billing');	
		 
	}
	
	
	public function orders(){
		
	$this->load->view('ems/members/orders');	
		 
	}
	
	public function user_add(){
		
	$this->load->view('ems/members/user_add');	
		 
	}
	
	public function user_tempadd(){
		
	$this->load->view('ems/members/user_tempadd');	
		 
	}
	
	
	public function user_edit(){
		$id = $this->uri->segment(5);
		if($id)
		{
			$this->load->model('ems/model_members');
			$data['res']=$this->model_members->fetchRow($id);
			if($data!=false)
			{
					$this->load->view('ems/members/user_edit',$data);	
			}

		}
		else {
					$this->load->view('ems/members/user_edit');	
		}

		 
	}
	
	
	public function user_save(){
		
		
	 $this->load->model('ems/model_members');	
	 $data['mem_name']=$this->input->post('mem_name');
	 $data['mem_cname']=$this->input->post('mem_cname');
	 $data['mem_clientid']=$this->input->post('mem_clientid');
	 $data['mem_email']=$this->input->post('mem_email');
	 $data['mem_phone']=$this->input->post('mem_phone');
	 $data['mem_website']=$this->input->post('mem_website');
	 $data['mem_pub_status']=$this->input->post('pub_val');
	 $data['site_id']=$this->session->userdata('site_id');
	
      	 
	 $check=$this->model_members->check_user($this->input->post('mem_name'),$this->input->post('mem_email'));
	 if($check==1){
		     $this->session->set_flashdata('message', _erMsg('<p>User already exist with this emailaddress.</p>'));
			 redirect($this->config->item('base_url') . 'ems/members/user_add');
		 
	 }else{
			 $result=$this->model_members->saveUsers($data);
			 log_insert($this->uri->segment(2),'added a record in');
			 // log_insert($this->uri->segment(2),'add a record in');
			 $this->session->set_flashdata('message', _okMsg('<p>User added successfully.</p>'));
			 redirect($this->config->item('base_url') . 'ems/members/user_add');
	 }	

		 
	}
	
	
	
	public function user_update(){
	 $this->load->model('ems/model_members');	
	 $id = $this->uri->segment(5);
	 $data['mem_name']=$this->input->post('mem_name');
	 $data['mem_cname']=$this->input->post('mem_cname');
	 $data['mem_clientid']=$this->input->post('mem_clientid');
	 $data['mem_email']=$this->input->post('mem_email');
	 $data['mem_phone']=$this->input->post('mem_phone');
	 $data['mem_website']=$this->input->post('mem_website');
	 $data['mem_pub_status']=$this->input->post('pub_val');
	 $data['site_id']=$this->session->userdata('site_id');
	 
	 log_insert($this->uri->segment(2),'edied a record in');
     $res['result']=$this->model_members->user_update($data,$id);
	  $this->session->set_flashdata('message', _okMsg('<p>User edited successfully.</p>'));
			 redirect($this->config->item('base_url') . 'ems/members/user_edit/id/'.$id);
	}
		
}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */