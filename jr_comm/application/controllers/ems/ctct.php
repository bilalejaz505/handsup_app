<?php

class ctct extends CI_Controller
{
    public function __construct()
    {
       parent::__construct();
	   $this->layout = 'admin_inner';
	   $this->load->library('cc');
	   	$this->load->model('ems/model_configuration');

		checkAdminSession();
    }
    
	
	 public function index()
    {
        $data['contact_list'] = $this->cc->view_Contacts();
        $this->load->view('ems/ctct/manage',$data);
                
    }
	
    public function manage()
    {
        $data['contact_list'] = $this->cc->view_Contacts();
        $this->load->view('ems/ctct/manage',$data);
                
    }
	
	public function contactForm(){
		
		$id  = $this->uri->segment(4);
		$data['lists']  = $this->cc->view_Lits();
		  if(!empty($id)){
		$data['contact'] = $this->cc->edit_Contacts($id);  
		  }
        $this->load->view('ems/ctct/addContact',$data);  
   
		
	}
	
	  public function addcontact()
    {
		  
        $this->cc->addContacts();
		
		redirect($this->config->item('base_url') . 'ems/ctct/manage');

    }
	
	
	 public function subscribe()
    {
		
		/*if(isset($_POST['email']) and !empty($_POST['list'])){
		
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		    echo  _erMsg2('<p>Please enter a valid email address...</p>');

			}else{*/
          
		    $this->cc->addContacts();
			
		
		  /*  echo  _okMsg('<p>Your email has been Subscribed Successfully.</p>');
		    
		  }*/
		if(isset($_POST['from_frontend']))
		{
			echo "User Subscribed";
			exit();
		}
		else
		{
			redirect($this->config->item('base_url'));
		}

		/*}*/
		
	 }
	
	  public function deletecontact()
    {
		  $this->cc->delete_Contacts($_POST['id']);
		
    }
	
	 public function campaign()
    {
        $data['campaign_list'] = $this->cc->view_campaign();
        $this->load->view('ems/ctct/view_campaign',$data);  
                
    }
	public function campaignForm(){
		
		 $id   = $this->uri->segment(4);
		
		 $data = array();
		 $this->data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'email_content',
            //Optionnal values
            'config' => array(
                'width' => "95%", 
                'height' => '200px',
				'fullpage' => true,
				'allowedContent' => true,
            )
        );
		$data = $this->data;
        $data['lists']  = $this->cc->view_Lits();
		$data['res']    = $this->model_configuration->fetchRow();

		if(!empty($id)){
		 
		$data['campaigns'] = $this->cc->edit_campaign($id);  
		}
		$this->load->view('ems/ctct/createCampaign',$data);  


		
	}
	
	 public function addCampaign()
    {		
		
		if (isset($_POST['name'])) {

      $this->cc->createCampaign($_POST);
    	
			
		}
       	redirect($this->config->item('base_url') . 'ems/ctct/campaign');
       
    }
	
	  public function deletecampaign()
    {
		  $this->cc->delete_Campaign($_POST['id']);
		
    }
  
}