<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class emailSub extends CI_Controller {

	public $layout = 'admin_inner';



	function __construct() {

		parent::__construct();
			
	}

	//main index function for the controller dashboard
	//loding the main view
	public function index(){

		//$this->load->view('ems/emailSub/manage');
		$this->manage();
			
	}

	public function manage(){
		$res='';
		$this->load->model('ems/model_emailsub');
		$data['res']=$this->model_emailsub->fetchAll();
		if(sizeof($data)>0)
		{
			$this->load->view('ems/emailSub/manage',$data);
		}
			
	}

	public function add(){


		$this->load->view('ems/emailSub/add');
			
	}

	public function save(){
		$this->load->model('ems/model_emailsub');
		$id = $this->uri->segment(5);
		$data=array();
		$loggedInUserId=$this->session->userdata('id');

				$data['eng_sub_title']=$_POST['eng_sub_title'];
				$data['arb_sub_title']=$_POST['arb_sub_title'];
				$data['chn_sub_title']=$_POST['chn_sub_title']; 
                                
                                        
                $data['meta_title_eng']= addslashes($this->input->post('meta_title_eng'));
                $data['meta_desc_eng']= addslashes($this->input->post('meta_desc_eng'));
                $data['meta_keywords_eng']= addslashes($this->input->post('meta_keywords_eng'));
                        
                $data['meta_title_arb']= addslashes($this->input->post('meta_title_arb'));
                $data['meta_desc_arb']= addslashes($this->input->post('meta_desc_arb'));
                $data['meta_keywords_arb']= addslashes($this->input->post('meta_keywords_arb'));
                        
                $data['meta_title_chn']= addslashes($this->input->post('meta_title_chn'));
                $data['meta_desc_chn']= addslashes($this->input->post('meta_desc_chn'));
                $data['meta_keywords_chn']= addslashes($this->input->post('meta_keywords_chn'));
                        
                                if ($_POST['pub_val'] == '') {
                                    $status = 1;
                                }
                                else {

                                    $status = $_POST['pub_val'];
                                }                        
                                $data['sub_pub_status']=$status;
				$data['sub_created_at']=date('Y-m-d H:i:s');
				$data['sub_created_by']=$loggedInUserId;
				$data['site_id']=$this->session->userdata('site_id');
				$result=$this->model_emailsub->save($data);
				$data2['id']=$result;
				 log_insert($this->uri->segment(2),'add a record in');
				if($result){
	
					 $this->session->set_flashdata('message', _okMsg('<p>Record added successfully.</p>'));
					
				}
				redirect($this->config->item('base_url') . 'ems/emailSub/manage');
			}
			
	public function edit()
	{
		$id = $this->uri->segment(5);
		if($id)
		{
			$this->load->model('ems/model_emailsub');
			$data['res']=$this->model_emailsub->fetchRow($id);
			//			print_r($dasta);
			if($data!=false)
			{
				$this->load->view('ems/emailSub/edit',$data);
			}

		}
		else {
			redirect($this->config->item('base_url') . 'ems/emailSub/manage');
		}



	}


	public function update(){
                        $this->load->model('ems/model_emailsub');
                        $id = $this->uri->segment(5);
                        $data=array();
                        $loggedInUserId=$this->session->userdata('id');

			$data['eng_sub_title']=$_POST['eng_sub_title'];
			$data['arb_sub_title']=$_POST['arb_sub_title'];
			$data['chn_sub_title']=$_POST['chn_sub_title'];
                        
                                
                $data['meta_title_eng']= addslashes($this->input->post('meta_title_eng'));
                $data['meta_desc_eng']= addslashes($this->input->post('meta_desc_eng'));
                $data['meta_keywords_eng']= addslashes($this->input->post('meta_keywords_eng'));
                        
                $data['meta_title_arb']= addslashes($this->input->post('meta_title_arb'));
                $data['meta_desc_arb']= addslashes($this->input->post('meta_desc_arb'));
                $data['meta_keywords_arb']= addslashes($this->input->post('meta_keywords_arb'));
                        
                $data['meta_title_chn']= addslashes($this->input->post('meta_title_chn'));
                $data['meta_desc_chn']= addslashes($this->input->post('meta_desc_chn'));
                $data['meta_keywords_chn']= addslashes($this->input->post('meta_keywords_chn'));
                
			$data['sub_updated_at']=date('Y-m-d H:i:s');
			$data['sub_updated_by']=$loggedInUserId;
                        
                        if ($_POST['pub_val'] == '') {
                            $status = 1;
                        }
                        else {

                            $status = $_POST['pub_val'];
                        }
                        $data['sub_pub_status'] = $status;                        
			
			$res['result']=$this->model_emailsub->update($data,$id);

                        log_insert($this->uri->segment(2),'update a record in');
			if($res==true){
	
					$data2['msg']='Record updated successfully.';
					
				}
				redirect($this->config->item('base_url') . 'ems/emailSub/edit/id/'.$id);

			
	}

	public function delete()
	{
		$this->layout = '';
		$this->load->model('ems/model_emailsub');
		$id = $_POST['id'];
		 log_insert($this->uri->segment(2),'delete a record in');
		$result=$this->model_emailsub->delete($id);

	}

	public function publish()
	{
		$this->layout = '';
		$this->load->model('ems/model_emailsub');
		$id = $_POST['id'];
		$status= $_POST['pub_status'];
		$result=$this->model_emailsub->publishStatus($status,$id);
	}

	public function deletePhoto()
	{
		$this->layout = '';
		$this->load->model('ems/model_emailsub');
		$id = $_POST['id'];
		$result=$this->model_emailsub->deletePhoto($id);
	}
        
     public function sortCol() {
        //print_r($_GET['example']);exit;
        $this->layout = '';
        $req = $_GET['example'];
        foreach($req as $k=>$r) {
            $tmp = explode('_',$r);
            $ids[$tmp[1]] = $k;
        }
        //print_r($ids);
        $this->load->model('ems/model_emailsub');
        $this->model_emailsub->srtColUpdate($ids);
        
    }	        
}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */