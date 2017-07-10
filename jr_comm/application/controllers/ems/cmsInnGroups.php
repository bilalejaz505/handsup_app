<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CmsInnGroups extends CI_Controller {
	public $layout = 'admin_inner';
	function __construct() {
		parent::__construct();
		$this->layout = 'admin_inner'; 	
        checkAdminSession();
    }
	//main index function for the controller dashboard

	//loding the main view

	/*public function index(){
	$this->load->view('ems/cmsInnGroups/manage');

	}*/
	public function index(){
		$this->manage();
	}
	public function manage(){
	$this->load->model('ems/model_cmsingroups');	

	$groupList['groupList'] = $this->model_cmsingroups->getGroupList();

	$this->load->view('ems/cmsInnGroups/manage',$groupList);		

	}
	public function add(){
	 $siteList=$this->listSections();	
	 $this->load->view('ems/cmsInnGroups/add',$siteList);	
	}
	//This function insert group

	 public function insert_grp(){
	 $this->load->model('ems/model_cmsingroups');	
	 $arr['eng_grp_title']=$this->input->post('eng_web_title');
	 $arr['isAdmin']='0';	
	 $arr['site_id']=$this->session->userdata('site_id');
	 if($_POST['pub_val']==''){

			$status=1;

			}else{
			$status=$_POST['pub_val'];	

			}
	 $arr['grp_pub']=$status;
	 $insert_id=$this->model_cmsingroups->insert_rec($arr);

	 $this->insert_grp_rights($insert_id);

	 log_insert($this->uri->segment(2),'add a record in');

	 $this->session->set_flashdata('message', _okMsg('<p>Group added successfully.</p>'));

	 redirect($this->config->item('base_url') . 'ems/cmsInnGroups/manage');  	 

	}

	

	//This function is called with in insert group

	//it takes the group id and insert group rights.

	public function insert_grp_rights($id){

		$section = $this->input->post('select');
		if(!empty($section)) {
              foreach($section as $web){
			  		$sec=$web;

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
			  		$arr['site_id']=$this->session->userdata('site_id');

			  		$arr['secn_id']= $sec;

					$arr['grp_sec_create']= $cr;

			  		$arr['grp_sec_read'] = $rd;

			  		$arr['grp_sec_update']=$up;	

			  		$arr['grp_sec_delete']=$del;	

			  		$arr['grp_sec_pub']=$pub;

			  		$arr['grp_id']=$id;

			  

			  $this->model_cmsingroups->insert_grp_rights($arr); 

			  }

			  

		}

		 

	}
	public function update_grp(){
//          echo"hi";
	 $this->load->model('ems/model_cmsingroups');
//          echo"model Loaded";
	 $arr['eng_grp_title']=$this->input->post('eng_web_title');
	 if($_POST['pub_val']==''){
			$status=1;
			}else{
			$status=$_POST['pub_val'];	
			}
	 $arr['grp_pub']=$status;
	 $gid=$this->input->post('gid');
	 $this->model_cmsingroups->update_grp_rec($arr,$gid);
//         echo"update_grp_rec"; echo"hi";
	 $this->model_cmsingroups->delete_group_rights($gid);
//         echo"delete_group_rights";
	 $this->insert_grp_rights($gid);
//         echo"insert_grp_rights";

	 log_insert($this->uri->segment(2),'update a record in');
//         echo"log_insert";
	 $this->session->set_flashdata('message', _okMsg('<p>Group updated successfully.</p>'));
//         echo"set_flashdata";
	 redirect($this->config->item('base_url') . 'ems/cmsInnGroups/edit/id/'.$gid);

	} 

	public function upd_grp_rights($gid){
		$website = $this->input->post('select');
		if(!empty($website)) {
              foreach($website as $web){
			  		$sec=$web;

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

			 		

			  		$arr['secn_id']=$web;	

			  		$arr['grp_sec_create']= $cr;

			  		$arr['grp_sec_read'] = $rd;

			  		$arr['grp_sec_update']=$up;	

			  		$arr['grp_sec_delete']=$del;	

			  		$arr['grp_sec_pub']=$pub;

			  		$arr['grp_id']=$gid;

					

			        $this->load->model('ems/model_cmsingroups'); 

			        

//				    $checksite=$this->model_cmsingroups->check_site($web,$gid);

					

//					if($checksite){

					$this->model_cmsingroups->update_grprights_rec($arr,$gid,$web);  

						

//					}

//					

//					else{

//						

//					$this->model_cmsingroups->insert_grp_rights($arr); 

//					 	

//					}

						

			 }

			

			  

		}

		 

	}

	

	public function listSections(){

		

	$this->load->model('ems/model_cmsingroups');	

	$siteList['siteList'] = $this->model_cmsingroups->getSectionList();

	return $siteList;

	//$this->load->view('ems/managesites/manage',$siteList);	

		 

	}

    public function publish()

	{

		$this->layout = '';

		$this->load->model('ems/model_cmsingroups');

		$id = $_POST['id'];

		$status= $_POST['pub_status'];

		$result=$this->model_cmsingroups->publishStatus($status,$id);

	}

	

	//This function changes publish/unpublish states

	public function changeState(){

	 $this->load->model('ems/model_cmsingroups');	

	 $id = $_POST['id'];

	 $chk = $_POST['chk'];
	 $result=$this->model_cmsingroups->changeState_db($id,$chk);
	 if($result){

	 $this->session->set_flashdata('message', _okMsg('<p>Changes updated successfully.</p>'));

	 $message='<p>Changes updated successfully.</p>';

	  $this->load->view('ems/cmsInnGroups/add',$message);

	 }

	}


	public function edit(){

		

	$id = $this->uri->segment(5);

		if($id)

		{	

		 $siteList=$this->listSections();
	        $data['siteList']=$siteList;

	        $this->load->model('ems/model_cmsingroups');

			$data['results']=$this->model_cmsingroups->getRec($id);

			//debug($data);

			if(!empty($data))

			{

				$this->load->view('ems/cmsInnGroups/edit',$data);

			}



		}

	}
	public function delete()

	{		$this->layout = '';

		$this->load->model('ems/model_cmsingroups');

		$id = $_POST['id'];

		//$id=array_unique(explode(',',$id));	

		$result=$this->model_cmsingroups->delete($id);
		 log_insert($this->uri->segment(2),'delete a record in');



	}
public function sortCol(){

	$this->layout = '';

        $this->layout = '';

        $req = $_GET['example'];

        foreach($req as $k=>$r) {

            $tmp = explode('_',$r);

            $ids[$tmp[1]] = $k;

        }

        $this->load->model('ems/model_cmsingroups');

        $this->model_cmsingroups->srtColUpdate($ids);

	}
        
        public function checkGroups(){
            $this->layout = '';
            $this->load->model('ems/model_cmsingroups');
            $id = $_POST['id'];
            $result=$this->model_cmsingroups->getGroups($id);

            echo $result[0]['isAdmin'];
            exit;
        }

}



/* End of file admin_login.php */

/* Location: ./application/controllers/ems/admin_login.php */