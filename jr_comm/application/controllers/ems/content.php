<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content extends CI_Controller {

    public $layout = 'admin_inner';

    function __construct() {
        parent::__construct();
        $this->layout = 'admin_inner';
        checkAdminSession();
		$this->load->model('ems/model_contents');
		$this->load->model('ems/model_content_images');
    }
     public function index() {
        
		$this->manage();
    }
    public function manage() {
        
		$data = array();
		$move_to_trash = 0;
        $data['pages'] = $this->model_contents->fetchAll($move_to_trash);
		
		$this->load->view('ems/contents/manage', $data);
    }
	
	public function versions() {
        
		$data = array();
        $id = $this->uri->segment(4);
		$data['versions'] = $this->model_contents->fetchAllVersion($id);
		
		$data['page_id'] = $id;
		$this->load->view('ems/contents/manageVersions', $data);
    }
	
	public function versionsListing() {
        
		$data = array();
        $id = $this->uri->segment(4);
		$data['versions'] = $this->model_contents->fetchAllVersion($id);
		
		$data['page_id'] = $id;
		$this->load->view('ems/contents/manageVersionsListing', $data);
    }
	
	public function trashPages() {
        
		$data = array();
		$move_to_trash = 1;
        $data['pages'] = $this->model_contents->fetchAll($move_to_trash);
		$this->load->view('ems/contents/manageTrashPages', $data);
    }
	
	 public function edit() {
        
		$id = $this->uri->segment(7);
		if($id == ''){
		$id = $this->uri->segment(5); }
		$data = array();
		
		
       	$data['page_id'] = $this->uri->segment(5);
        $data['result'] = $this->model_contents->fetchRow($id);
		if($data['template']=='contact-us' || true){
			$this->load->library('google_maps');
				$map_cordinates = content_detail('location',$data['result']->id);
				$config['center'] = $map_cordinates;
				$map_cordinates = explode(',',$map_cordinates);
				$config['zoom'] = '5';
				$config['onclick'] = '

				var lat = event.latLng.lat();
				var lng = event.latLng.lng();
				$("#location").val(lat+","+ lng);

				$("#overlay_map").fadeOut(500);
				';
				$this->google_maps->initialize($config);
				
				$data['map']= $this->google_maps->create_map();
		}
		$data['total_versions'] =  $this->model_contents->countPageVersions($id);
		$this->load->view('ems/contents/edit', $data);
    }

   
	public function addNewPage() {
		
		if($data['template']=='contact-us' || true){
			$this->load->library('google_maps');

			$config['center'] = '37.4419, -122.1419';
			$config['zoom'] = '5';
			$config['onclick'] = '
			
			var lat = event.latLng.lat();
					var lng = event.latLng.lng();
			$("#location").val(lat+","+ lng);
			
			$("#overlay_map").fadeOut(500);
			';
			$this->google_maps->initialize($config);
			
			$data['map'] = $this->google_maps->create_map();
		}
	
       		$this->load->view('ems/contents/add', $data);
	 }
   
     public function savePage() {
        
		$data = array();
        $loggedInUserId = $this->session->userdata('id');

        $data['eng_title'] = addslashes($this->input->post('eng_title'));
		$data['arb_title'] = addslashes($this->input->post('arb_title'));
		$data['eng_sub_title'] = addslashes($this->input->post('eng_sub_title'));
		$data['arb_sub_title'] = addslashes($this->input->post('arb_sub_title'));
		$data['chn_title'] = addslashes($this->input->post('chn_title'));
		
        $data['display_to_home'] = addslashes($this->input->post('display_to_home'));
		$data['job_type'] = addslashes($this->input->post('job_type'));
        $data['career_level'] = addslashes($this->input->post('career_level'));
        $data['career_location'] = addslashes($this->input->post('career_location'));

        $data['meta_title_eng'] = addslashes($this->input->post('meta_title_eng'));
        $data['meta_desc_eng'] = addslashes($this->input->post('meta_desc_eng'));
        $data['meta_keywords_eng'] = addslashes($this->input->post('meta_keywords_eng'));
		

        $data['meta_title_arb'] = addslashes($this->input->post('meta_title_arb'));
        $data['meta_desc_arb'] = addslashes($this->input->post('meta_desc_arb'));
        $data['meta_keywords_arb'] = addslashes($this->input->post('meta_keywords_arb'));
		
		$data['meta_title_chn'] = addslashes($this->input->post('meta_title_chn'));
        $data['meta_desc_chn'] = addslashes($this->input->post('meta_desc_chn'));
        $data['meta_keywords_chn'] = addslashes($this->input->post('meta_keywords_chn'));
		
		$data['pro_date'] = addslashes($this->input->post('eng_pro_date'));
		$data['country_id'] = addslashes($this->input->post('country_id'));
		$data['archive'] = addslashes($this->input->post('archive'));
		$data['eng_location'] = addslashes($this->input->post('eng_location'));
        $data['arb_location'] = addslashes($this->input->post('arb_location'));
	
	    $data['parant_id'] = addslashes($this->input->post('tpl_id'));
		$redirect_check = $data['parant_id'];
		
		if($this->input->post('tpl_name') == 'industory'){
			$data['tpl'] = addslashes('industory-companies');
		}elseif($this->input->post('tpl_name') == 'our_projects'){
		   $data['tpl'] = addslashes('projects-listing');
		}elseif($this->input->post('tpl_name') == 'photogallery'){
			$data['tpl'] = addslashes('albums-listing');
		}else if($this->input->post('tpl_name') == 'our_companies'){
		   $data['tpl'] = addslashes('companies-listing');
	    }else{
			$data['tpl'] = addslashes($this->input->post('tpl'));
		}
		
		$data['version'] = 0 ;
		
		$data['type'] = 'page';	
	
        $data['pub_status'] = 1;
        $data['content_created_at'] = date('Y-m-d H:i:s');
		$data['content_updated_at'] = date('Y-m-d H:i:s');
        $data['content_created_by'] = $loggedInUserId;
		if($this->input->post('tpl_name') == 'about_financial_statement'){
		   $target_dir = "uploads/pdf/";
		   
		   $files = $_FILES;

		   foreach($files as $key=>$val){

			if($val["name"] != "") {
			 $name = explode('.', $val['name']);
			 $target_file = $target_dir . GUID() . "." . $name[1];
			 move_uploaded_file($val["tmp_name"], $target_file);

			 $data['file'] = $target_file;
		}}}
        $id = $this->model_contents->save($data);
		
		//file_upload($_FILES,$id);
		foreach($_POST as $key => $val){
			
			
			$ar = array(
			'meta_title_eng','meta_desc_eng',
			'meta_keywords_eng','meta_title_arb',
			'meta_desc_arb','meta_keywords_arb','meta_title_chn',
			'meta_desc_chn','meta_keywords_chn','tpl','pub_status','eng_title','eng_sub_title','arb_title','arb_sub_title','chn_title','tpl_id','display_to_home','eng_pro_date','eng_location','arb_location','catalog_pdf_file','archive','job_type','career_level','career_location','country_id');
			if(!in_array($key ,$ar) and !empty($val)){
			
			$arr = array(
			'post_id' => $id,
			'meta_key' => $key,
			'meta_value' => $val
				
			);
		
		if( strpos($arr['meta_key'],"_mkey_hdn") !== false){
			$image_explode = explode('script/',$arr['meta_value']); 
			$arr['meta_value'] = $image_explode[1];
			$arr['meta_value'] = str_replace(',','',$arr['meta_value']);
			}
		
			$arr['meta_value'] = str_replace('src="../../','src="../../../../',$arr['meta_value']);	
				
		$this->model_contents->save_content_detail($arr);
			}
		}
		
		
		
		
		$data['type'] = 'version';
		$data['parant_id'] = $id ;
		$data['version'] = 1 ;
		//$data['content_updated_at'] = date('Y-m-d H:i:s');
       // $data['content_updated_by'] = $loggedInUserId;
		$data['content_created_at'] = date('Y-m-d H:i:s');
		$data['content_updated_at'] = date('Y-m-d H:i:s');
        $data['content_created_by'] = $loggedInUserId;
		
		 $version_id = $this->model_contents->save($data);
		 $this->saveVersionData($_POST,$version_id);
		
        log_insert($this->uri->segment(2), 'add a record in');
        if ($version_id > 0) {
            $this->session->set_flashdata('message', _okMsg('<p>Record Added Successfully.</p>'));
        }
		
		 if($data['tpl'] == 'home' || $this->input->post('tpl_name') == 'home' || $data['tpl'] == 'products' || $this->input->post('tpl_name') == 'products' || $data['tpl'] == 'accessories' || $this->input->post('tpl_name') == 'accessories'  || $data['tpl'] == 'solutions' || $this->input->post('tpl_name') == 'solutions'){
			 if($redirect_check == ''){
				 
				redirect($this->config->item('base_url') . 'ems/content/edit/id/'.$id); 
				 }else{
				 redirect($this->config->item('base_url') . 'ems/list_content/edit/id/'.$id);
					 }

        
				 }else{
		redirect($this->config->item('base_url') . 'ems/content/edit/id/'.$id);
				 }
    }
	
	public function saveVersionData($data,$id){
		foreach($data as $key => $val){
			
			
			$ar = array(
			'meta_title_eng','meta_desc_eng',
			'meta_keywords_eng','meta_title_arb',
			'meta_desc_arb','meta_keywords_arb','meta_title_chn',
			'meta_desc_chn','meta_keywords_chn','tpl','pub_status','eng_title','eng_sub_title','arb_title','arb_sub_title','chn_title','tpl_id','display_to_home','eng_pro_date','eng_location','arb_location','catalog_pdf_file','country_id');
			if(!in_array($key ,$ar) and !empty($val)){
			
			$arr = array(
			'post_id' => $id,
			'meta_key' => $key,
			'meta_value' => $val
				
			);
		
		if( strpos($arr['meta_key'],"_mkey_hdn") !== false){
			$image_explode = explode('script/',$arr['meta_value']); 
			$arr['meta_value'] = $image_explode[1];
			$arr['meta_value'] = str_replace(',','',$arr['meta_value']);
			}
		
			$arr['meta_value'] = str_replace('src="../../','src="../../../../',$arr['meta_value']);	
				
		$this->model_contents->save_content_detail($arr);
			}
		}
		
		
		
		}
   
    public function update() {
        
        $id = $this->input->post('page_id');
		 $tpl_id = $this->input->post('tpl_id');
		$data = array();
        $loggedInUserId = $this->session->userdata('id');

        $data['eng_title'] = addslashes($this->input->post('eng_title'));
		$data['arb_title'] = addslashes($this->input->post('arb_title'));
		$data['eng_sub_title'] = addslashes($this->input->post('eng_sub_title'));
		$data['arb_sub_title'] = addslashes($this->input->post('arb_sub_title'));
		$data['chn_title'] = addslashes($this->input->post('chn_title'));
		$data['display_to_home'] = $this->input->post('display_to_home');
		$data['job_type'] = addslashes($this->input->post('job_type'));
        $data['career_level'] = addslashes($this->input->post('career_level'));
        $data['career_location'] = addslashes($this->input->post('career_location'));

        $data['meta_title_eng'] = addslashes($this->input->post('meta_title_eng'));
        $data['meta_desc_eng'] = addslashes($this->input->post('meta_desc_eng'));
        $data['meta_keywords_eng'] = addslashes($this->input->post('meta_keywords_eng'));
		
		$data['pro_date'] = addslashes($this->input->post('eng_pro_date'));
		$data['country_id'] = addslashes($this->input->post('country_id'));
		$data['archive'] = addslashes($this->input->post('archive'));
		$data['eng_location'] = addslashes($this->input->post('eng_location'));
        $data['arb_location'] = addslashes($this->input->post('arb_location'));

        $data['meta_title_arb'] = addslashes($this->input->post('meta_title_arb'));
        $data['meta_desc_arb'] = addslashes($this->input->post('meta_desc_arb'));
        $data['meta_keywords_arb'] = addslashes($this->input->post('meta_keywords_arb'));
		
		$data['meta_title_chn'] = addslashes($this->input->post('meta_title_chn'));
        $data['meta_desc_chn'] = addslashes($this->input->post('meta_desc_chn'));
        $data['meta_keywords_chn'] = addslashes($this->input->post('meta_keywords_chn'));
		
		
	//	file_upload($_FILES,$id);
		
		//$data['parant_id'] = addslashes($this->input->post('tpl_id'));
		//$redirect_check = $data['parant_id'];
		$data['type'] = 'page';	
		
		 if($this->input->post('tpl_name') == 'industory'){
			$data['tpl'] = addslashes('industory-companies');
		}elseif($this->input->post('tpl_name') == 'photogallery'){
			$data['tpl'] = addslashes('albums-listing');
		}elseif($this->input->post('tpl_name') == 'our_projects'){
		   $data['tpl'] = addslashes('projects-listing');
		}else if($this->input->post('tpl_name') == 'our_companies'){
		   $data['tpl'] = addslashes('companies-listing');
		 }else{
			$data['tpl'] = addslashes($this->input->post('tpl'));
		}
		if($this->input->post('tpl_name') == 'about_financial_statement'){
		   $target_dir = "uploads/pdf/";
		   
		   $files = $_FILES;

		   foreach($files as $key=>$val){

			if($val["name"] != "") {
			 $name = explode('.', $val['name']);
			 $target_file = $target_dir . GUID() . "." . $name[1];
			 move_uploaded_file($val["tmp_name"], $target_file);

			 $data['file'] = $target_file;
		}}}
        $data['content_updated_at'] = date('Y-m-d H:i:s');
        $data['content_updated_by'] = $loggedInUserId;
        $res['result'] = $this->model_contents->update($data, $id);
		$data['parant_id'] = addslashes($this->input->post('tpl_id'));
		$redirect_check = $data['parant_id'];
		$data['tpl'] = addslashes($this->input->post('tpl'));
		
		
	    $this->model_contents->delete_content_detail($id);
	   
		foreach($_POST as $key => $val){
			
			
			$ar = array(
			'meta_title_eng','meta_desc_eng',
			'meta_keywords_eng','meta_title_arb',
			'meta_desc_arb','meta_keywords_arb','meta_title_chn',
			'meta_desc_chn','meta_keywords_chn','tpl','pub_status','eng_title','eng_sub_title','arb_title','arb_sub_title','chn_title','tpl_id','display_to_home','eng_pro_date','eng_location','arb_location','catalog_pdf_file','archive','job_type','career_level','career_location','country_id');
			if(!in_array($key ,$ar) and !empty($val)){
			
		$arr = array(
		'post_id' => $id,
		'meta_key' => $key,
		'meta_value' => $val
			
		);
		if( strpos($arr['meta_key'],"_mkey_hdn") !== false){
			$image_explode = explode('script/',$arr['meta_value']); 
			$arr['meta_value'] = $image_explode[1];
			$arr['meta_value'] = str_replace(',','',$arr['meta_value']);
			}
				
			
			$arr['meta_value'] = str_replace('src="../../','src="../../../../',$arr['meta_value']);	
				
			
		   $this->model_contents->save_content_detail($arr);
			}
		}
	
		
		
		$countVersion =  $this->model_contents->countPageVersions($id);
		
		$data['version'] = $countVersion + 1;
		$data['type'] = 'version';
		$data['pub_status'] = 0;
		$data['parant_id'] = $id;
		
		$version_id = $this->model_contents->save($data);
		 $this->saveVersionData($_POST,$version_id);		
		log_insert($this->uri->segment(2), 'edit a record in');
        
        if ($res == true) {
            $this->session->set_flashdata('message', _okMsg('<p>Record Updated Successfully.</p>'));
        }
		if($data['tpl'] == 'home' || $this->input->post('tpl_name') == 'home' || $data['tpl'] == 'products' || $this->input->post('tpl_name') == 'products' || $data['tpl'] == 'accessories' || $this->input->post('tpl_name') == 'accessories'  || $data['tpl'] == 'solutions' || $this->input->post('tpl_name') == 'solutions') {
			
			 if($redirect_check == ''){
				 $this->session->set_flashdata('historygobackmain', _okMsg("go back to main listing screen"));
				redirect($this->config->item('base_url') . 'ems/content/edit/id/'.$id); 
				 }else{
				 redirect($this->config->item('base_url') . 'ems/list_content/edit/id/'.$id);
					 }

        
				 }else{
		redirect($this->config->item('base_url') . 'ems/content/edit/id/'.$id);
				 }
    }
   
   
    public function publish() {
        $this->layout = '';
        $this->load->model('ems/model_contents');
        $id = $_POST['id'];
        $status = $_POST['pub_status'];
        $result = $this->model_contents->publishStatus($status, $id);
    }
	
	 public function checkUniquePageTitle() {
        $this->layout = '';
        $this->load->model('ems/model_contents');
        $title = $_POST['page_title'];
      echo $result = $this->model_contents->checkUniquePageTitle($title).'@@';
    }
	
	 public function trash() {
        $this->layout = '';
        $id = $_POST['id'];
		$data['move_to_trash'] = $_POST['move_to_trash'];
        log_insert($this->uri->segment(2), 'move to trash in');
		$result = $this->model_contents->update($data, $id);
        echo 'true';
    }
	 public function delete() {
        $this->layout = '';
		
         $id = $_POST['id'];
       
		log_insert($this->uri->segment(2), 'delete a record in');
        $result = $this->model_contents->delete($id);
       echo 'true';
    }
	 public function deleteImage() {
        $this->layout = '';
		$id = $_POST['id'];
		$imageName = $_POST['image_name'];
		$imageType = $_POST['image_type'];
       
		log_insert($this->uri->segment(2), 'delete a record in');
     
	   $photos =  content_detail($imageType,$id);
	   
	   $photo = str_replace($imageName,'',$photos);
	    $result = $this->model_contents->deleteImage($photo,$imageType,$id);
        echo 'true' ;
    }
	
	public function sortable() {
	
		if(isset($_POST['id']) and !empty($_POST['id'])){

			$id = $_POST['id'];

			for ($i = 0; $i < count($_POST['id']); $i++) {
			
				$data = array(
						"sort_order" => $i,
						);
				
				$result = $this->model_contents->update($data, $_POST['id'][$i]);
			}

		}
	}
}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */