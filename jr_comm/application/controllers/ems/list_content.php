<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class list_content extends CI_Controller {

    public $layout = 'admin_inner';

    function __construct() {
        parent::__construct();
        $this->layout = 'admin_inner';
        checkAdminSession();
		$this->load->model('ems/model_contents');
		$this->load->model('ems/model_content_images');
		$this->load->model('ems/model_career');



    }

    //main index function for the controller dashboard
    //loding the main view
    public function index() {
       $this->manage();
    }

    public function manage() {
        $data = array();
	    $id = $this->uri->segment(4);
		
	    $data['list_content'] = $this->model_contents->fetch_list_content($id);
		$data['tpl_name'] = fetchTemplate($id);		
        $this->load->view('ems/list_content/manage', $data);
    }

    public function add() {

        $data = array();
		$data['tpl_id'] = $this->uri->segment(4);
		$data['template'] = fetchTemplate($data['tpl_id']);
		if($data['template']=='contact-us' || true){
			$this->load->library('google_maps');

			$config['center'] = '23.8859, 45.0792';
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
		$data['list_content_dropdown'] = $this->model_contents->list_content_dropdown();
		$this->load->view('ems/list_content/add', $data);
    }

   //$
	public function jobManage() {

        $data = array();
		 
		
		$id = $this->uri->segment(5);

		if($id) {
		 
		$data['all_jobs'] = $this->model_career->fetchAlljobs('job_applications', $id);
		if (!empty($data)) {
               
                $this->load->view('ems/list_content/jobmanage', $data);
		}


		}

        

    }
	    public function jobEdit() {

          $data = array();

       

        $id = $this->uri->segment(5);

        if ($id) {            

            $data['jobs'] = $this->model_career->fetch($id,'job_applications');
            if (!empty($data)) {
               
                $this->load->view('ems/list_content/edit_job', $data);

            }

        }

    }

  public function deleteJob() {
        $this->layout = '';
        $id = $_POST['id'];
        log_insert($this->uri->segment(2), 'delete a record in');
        $result = $this->model_career->deleteJob($id);
        echo $result;
       // $this->deletePhotos($id);
    }
	//$
    public function edit() {
          
        $id = $this->uri->segment(7);
		if($id == ''){
		$id = $this->uri->segment(5); }
		$data = array();
		
        if ($id) {            
            $data['result'] = $this->model_contents->fetchRow($id);
			if($data['result']->version != 0){
				$forTemplateOfVersion = $this->model_contents->fetchRow($this->uri->segment(5));
				$data['template'] = fetchTemplate($forTemplateOfVersion->parant_id);
				$data['check_request_to_view_version_page'] = 1;
				
				}else{
					$data['template'] = fetchTemplate($data['result']->parant_id);
					$data['total_versions'] =  $this->model_contents->countPageVersions($id);
					}
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
			
			$data['page_id'] = $this->uri->segment(5);
			$data['list_content_dropdown'] = $this->model_contents->list_content_dropdown();
                       if (!empty($data)) {
                $this->load->view('ems/list_content/edit', $data);
            }
        }
    }

    public function publish() {
        $this->layout = '';
        $id = $_POST['id'];
        $status = $_POST['pub_status'];
        $result = $this->model_contents->publishStatus($status, $id);
    }

    public function delete() {
        $this->layout = '';
        $id = $_POST['id'];
        log_insert($this->uri->segment(2), 'delete a record in');
        $result = $this->model_contents->delete($id);
        $this->deletePhotos($id);
    }

}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */