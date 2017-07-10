<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller {

    public $layout = 'admin_inner';

    function __construct() {
        parent::__construct();
        $this->layout = 'admin_inner';
        checkAdminSession();
		$this->load->model('ems/model_menu');
		$this->load->model('ems/model_contents');
		
    }
     public function index() {
        
		$this->manage();
    }
    public function manage() {
        
		$data = array();
		$data['menus'] =  $this->model_menu->fetchAll();
		$this->load->view('ems/menu/manage',$data);
		
    }
	 public function addMenu() {
        
		$data = array();
		
		$this->load->view('ems/menu/add',$data);
		
    }
	
	public function save() {
        
		$data = array();
		$loggedInUserId = $this->session->userdata('id');
		$data = $this->input->post();
		$data['menu_created_at'] = date('Y-m-d H:i:s');
		$data['menu_created_by'] = $loggedInUserId;
		
		$insert_id = $this->model_menu->save($data);
		
		log_insert($this->uri->segment(2), 'add a record in');
		$this->session->set_flashdata('message', _okMsg('<p>Menu added successfully.</p>'));
        redirect($this->config->item('base_url') . 'ems/menu/manage/');
    }
	
	public function edit() {
        
		
		$id = $this->uri->segment(5); 
		$data['result'] = $this->model_menu->fetchRow($id);
		$this->load->view('ems/menu/edit', $data);
    }
	 public function update() {
        
        $id = $this->uri->segment(5); 
		$loggedInUserId = $this->session->userdata('id');
		
		$data = array();
        $data['title'] = $this->input->post('title'); 
        $data['menu_updated_at'] = date('Y-m-d H:i:s');
        $data['menu_updated_by'] = $loggedInUserId;
        
		
		$res['result'] = $this->model_menu->update($data, $id);
		log_insert($this->uri->segment(2), 'edit a record in');
        
        if ($res == true) {
            $this->session->set_flashdata('message', _okMsg('<p>Record Updated Successfully.</p>'));
        }
        redirect($this->config->item('base_url') . 'ems/menu/edit/id/'.$id);
    }
	
	public function addMenuPages() {
        
		
		
		$id = $this->uri->segment(5); 
		$move_to_trash = 0;
		$data = array();
		$menu = array();
		$data['result'] = $this->model_menu->fetchRow($id);
		$data['pages'] = $this->model_contents->fetchAll($move_to_trash);
		$data['menu_pages'] = $this->model_menu->fetchMenuPages($id);
		
		foreach($data['menu_pages'] as $page){
			$menu[] = $page->page_id;
			}
		$data['menu_ids'] = $menu;	
		$this->load->view('ems/menu/addMenuPages', $data);
    }
	
		public function saveMenuPages() {
         
		 $data  = array();
		 $i = 0;
		 $data['menu_id'] = $this->input->post('menu_id');
		 $parant_ids = $this->input->post('parant_id');
		 $position = $this->input->post('position');
		 $data['position'] = 0;
		 $previous_pages = $this->model_menu->fetchMenuPages($data['menu_id']);
		 $previous_pages_ids = array();
		 $pages = $this->input->post('page_id');
		 foreach($previous_pages as $value){
			 $previous_pages_ids[] = $value->page_id;
			 
			 }
			
		 // $this->model_menu->deleteSaveMenu($data['menu_id']);
		 foreach($pages as $page){
			 
			 if(!in_array($page,$previous_pages_ids)){
				
			  $data['parent_id'] = $parant_ids[$i];
			  $data['position'] = $position[$i];
			  $data['page_id'] = $page;
			  if($data['position'] == 0){
				  $data['position'] = $this->model_menu->maxPosition() + 1;
				  }
			  $this->model_menu->saveMenuPage($data);
			  //$data['position'] = $data['position'] + 1;
			 }
			 $i++;
			 }
			 foreach($previous_pages_ids as $page){
				  if(!in_array($page,$pages)){
					  $this->model_menu->deleteSaveMenuSinglePage($data['menu_id'],$page); 
					  
					  }
				 
				 }
			 
			 $this->session->set_flashdata('message', _okMsg('<p>Page Added Successfully.</p>'));
			// redirect($this->config->item('base_url') . 'ems/menu/manageMenuPages/'.$this->input->post('menu_id'));
			 redirect($this->config->item('base_url') . 'ems/menu');
    }
	
	public function manageMenuPages() {
        
		$data = array();
		$id = $this->uri->segment(4); 
		$move_to_trash = 0;
		$parrent_id = 0;
		$data['menu_id'] = $id;
		$data['menus'] =  $this->model_menu->fetchAll();
		$data['pages'] = $this->model_contents->fetchAll($move_to_trash);
		$data['menu_pages'] = $this->model_menu->fetchMenuParrentPages($id,$parrent_id);
		$this->load->view('ems/menu/manageMenuPages',$data);
		
    }
	
	
	 public function menu_pos_update() {
	  $this->model_menu->delete_menu($_REQUEST['id']);
       foreach($_REQUEST['sortable'] as $key => $val){
		if(!empty($val['item_id'])){
		$data = array();
		$data['page_id']   = $val['item_id']; 
        $data['menu_id']   = $_REQUEST['id']; 
        $data['parent_id'] = isset($val['parent_id'])?$val['parent_id']:0;
        $data['position']  = $key;
		$this->model_menu->saveMenuPage($data);
		
	   }

	   }
          log_insert($this->uri->segment(2), 'save a record in');
        
        if ($res == true) {
            $this->session->set_flashdata('message', _okMsg('<p>Record Saved Successfully.</p>'));
        }
		
	
    }
	
	

}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */