<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CmsInUsers extends CI_Controller {

	public $layout = 'admin_inner';
	
	
	 
	function __construct() {
		parent::__construct();
		$this->layout = 'admin_inner'; 	
        checkAdminSession();
    }
	
	//main index function for the controller dashboard
	//loding the main view
/*	public function index(){
		
	
	$this->load->view('ems/cmsInUsers/manage');	
	
		
	}*/
	public function index(){
		$this->manage();
	}
	
	public function manage(){
		
	$this->load->model('ems/model_cmsinuser');	
	$getUserList['getUserList'] = $this->model_cmsinuser->getUserList();
	$this->load->view('ems/cmsInUsers/manage',$getUserList);		
	}
	
	public function add(){
	 $siteList=$this->listSites();	
	 $siteList['groups']=$this->listGroups();	
	 $this->load->view('ems/cmsInUsers/add',$siteList);	
		 
	}
	
	//This function insert group
	public function add_user(){
	 $this->load->model('ems/model_cmsinuser');	
	 $arr['usr_uname']=$this->input->post('usr_uname');
	 $arr['usr_phone']=$this->input->post('usr_phone');
	 $arr['usr_email']=$this->input->post('usr_email');
	 $passwd=$this->input->post('usr_pass');
	 $hash_passwd=generatePassword($passwd);
	 $arr['usr_pass']=$hash_passwd;
	 $arr['usr_msg']=$this->input->post('usr_msg');
	 $arr['usr_grp_id']=$this->input->post('usr_grp_id');
	 $arr['usr_level']='3';	
	if($_POST['pub_val']==''){
			$status=1;
			}else{
				
			$status=$_POST['pub_val'];	
			}
	 $arr['usr_pub_status']=$status;
	 $check=$this->model_cmsinuser->check_user($this->input->post('usr_uname'),$this->input->post('usr_email'));
	  if($check==1){
		     $this->session->set_flashdata('message', _erMsg('<p>User already exist with this emailaddress.</p>'));
			 redirect($this->config->item('base_url') . 'ems/cmsInUsers/add');
		 
	 }else{
			 $insert_id=$this->model_cmsinuser->add_user_rec($arr);
			  log_insert($this->uri->segment(2),'add a record in');   
			 $this->session->set_flashdata('message', _okMsg('<p>User added successfully.</p>'));
			 redirect($this->config->item('base_url') . 'ems/cmsInUsers/manage');
	 }
	}
	
	//This function is called with in insert group
	//it takes the group id and insert group rights.
	public function insert_grp_rights($id){
		
		
		$website = $this->input->post('select');
		
		 
		if(!empty($website)) {
			
			
              foreach($website as $web){
				  
			  		$create='create_'.$web;
					$read='read_'.$web;
					$update='upd_'.$web;
					$delete='del_'.$web;
					$publish='pub_'.$web; 
			 
					$cr=$this->input->post($create);
					$rd=$this->input->post($read);
					$up=$this->input->post($update);
			 		$del=$this->input->post($delete);
			  		$pub=$this->input->post($publish); 
			 		
			  		$arr['web_id']=$web;	
			  		$arr['grp_sec_create']= $cr;
			  		$arr['grp_sec_read'] = $rd;
			  		$arr['grp_sec_update']=$up;	
			  		$arr['grp_sec_delete']=$del;	
			  		$arr['grp_sec_pub']=$pub;
			  		$arr['grp_id']=$id;
			  
			  
			  $this->model_cmsinuser->insert_grp_rights($arr); 
			  }
			  
		}
		 
	}
	
	
  
	
	function upd_user_rec(){
	
	 $this->load->model('ems/model_cmsinuser');	
	 $id=$this->input->post('id');
	 $arr['usr_uname']=$this->input->post('usr_uname');
	 $arr['usr_phone']=$this->input->post('usr_phone');
	 $arr['usr_email']=$this->input->post('usr_email');
	 $passwd=$this->input->post('usr_pass');
	 
		if($passwd !=''){
		 $hash_passwd=generatePassword($passwd);
		 $arr['usr_pass']=$hash_passwd;
		}else{
		   
		  $result=$this->model_cmsinuser->getUserpasswd($id);   	
		  $arr['usr_pass']=$result[0]['usr_pass'];	
		 
		}
	 
	$arr['usr_msg']=$this->input->post('usr_msg');
	 $arr['usr_grp_id']=$this->input->post('usr_grp_id');
	if($_POST['pub_val']==''){
			$status=1;
			}else{
				
			$status=$_POST['pub_val'];	
			}
	 $arr['usr_pub_status']=$status;
	 
	 $this->model_cmsinuser->upd_user_rec_db($arr,$id);
	  log_insert($this->uri->segment(2),'update a record in');
	 $this->session->set_flashdata('message', _okMsg('<p>User updated successfully.</p>'));
	 redirect($this->config->item('base_url') . 'ems/cmsInUsers/edit/id/'.$id);
		
	}
	
	
	
	public function listSites(){
		
	$this->load->model('ems/model_cmsinuser');	
	$siteList['siteList'] = $this->model_cmsinuser->getSiteList();
	return $siteList;
	//$this->load->view('ems/managesites/manage',$siteList);	
		 
	}
	
	public function listGroups(){
		
	$this->load->model('ems/model_cmsinuser');	
	$siteList['groupList'] = $this->model_cmsinuser->getGroupList();
	return $siteList;
	//$this->load->view('ems/managesites/manage',$siteList);	
		 
	}
    
	
	public function getGroupTable(){
    $this->load->model('ems/model_cmsinuser');	
	$this->layout = '';
	$gid = $_POST['gid'];	
	
	sections_table($gid);
	}
	
	
	//This function changes publish/unpublish states
	public function changeState(){
	 $this->load->model('ems/model_cmsinuser');	
	 $id = $_POST['id'];
	 $chk = $_POST['chk'];
	 $result=$this->model_cmsinuser->changeState($id,$chk);
	 if($result){
	 $this->session->set_flashdata('message', _okMsg('<p>Changes updated successfully.</p>'));
	 $message='<p>Changes updated successfully.</p>';
	  $this->load->view('ems/cmsInUsers/add',$message);
	 }
	}
	
	
	public function edit(){
	$this->load->model('ems/model_cmsinuser');
	
	
	$id = $this->uri->segment(5);
		if($id)
		{	
		 $siteList=$this->listSites();	
	     $data['groups']=$this->listGroups();	 
		 
	        $data['siteList']=$siteList;
	       
			$data['results']=$this->model_cmsinuser->getRec($id);
			//debug($data);
			if(!empty($data))
			{
				$this->load->view('ems/cmsInUsers/edit',$data);
				
			}

		}
	}
	public function publish()
	{
		$this->layout = '';
		$this->load->model('ems/model_cmsinuser');
		$id = $_POST['id'];
		$status= $_POST['pub_status'];
		$result=$this->model_cmsinuser->publishStatus($status,$id);
	}
	public function delete()
	{
		$this->layout = '';
		$this->load->model('ems/model_cmsinuser');
		$id = $_POST['id'];
		 log_insert($this->uri->segment(2),'delete a record in');
		$result=$this->model_cmsinuser->delete($id);

	}
        
        public function checkUsers() {
            $this->layout = '';
            $this->load->model('ems/model_cmsinuser');
            $id = $_POST['id'];
            $result = $this->model_cmsinuser->getUsers($id);

            echo $result[0]['usr_level'];
            exit;
        }
		
}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */