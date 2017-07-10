<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class AdminUsers extends CI_Controller {



	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */



	public function __construct()

    {

        parent::__construct();

       

	   	$this->load->model('Model_general');
		$this->load->model('Api_model');

		checkAdminSession();
		
		$user_role = $this->session->userdata('user_role');
		
		if($user_role != 1)
		{
			redirect($this->config->item('base_url') . 'admin/error');
		}

		//$res = checkLevels(2);

		//checkAuth($res);

    }

	

	

	public function index()

	{

		$data = array();

		$data['users']	 = 	$this->Model_general->getAll('admin');

		$data['content'] = 'admin/manage';

		$data['class'] = 'admin'; 

		$this->load->view('default',$data);	

		

	}
	
	
	public function add()

	{

		$data = array();
		
		$data['roles']	 = 	$this->Model_general->getAll('user_roles');
		
		$data['content'] = 'admin/add';

		$data['class'] = 'admin'; 

		$this->load->view('default',$data);	

		

	}
	
	
	public function edit($id)

	{

		$data = array();

		$data['user']	 = 	$this->Model_general->getRow($id, 'admin');
		
		$data['roles']	 = 	$this->Model_general->getAll('user_roles');
		
		$data['content'] 	 =  'admin/edit';

		$data['class'] = 'admin';

		$this->load->view('default',$data);

	}
	
	
	public function save()

	{

		$data = array();

		$post_data = $this->input->post();

		

		foreach($post_data as $key => $value)
		{
			if($key != 'form_type')
			{
				$data[$key] = $value;
			}
		}
		
		if($data['status'])
		{
			$data['status'] = 1;
		}
		else
		{
			$data['status'] = 0;
		}
		
		
		$checkEmail = $this->Api_model->getMutipleRows('admin', 'username', $data['username']);
		
		if(count($checkEmail)>0)
		{
			$this->session->set_flashdata('message', '<p style="color:red; text-align:center;">Username already exist.</p>');			

			redirect($this->config->item('base_url') . 'admin/adminUsers/add');
		}
		
		$data['password'] = md5($data['password']);

		$data['created_at'] = date('Y-m-d H:i:s');
		
		$error=array();
  
		$insert_id = $this->Model_general->save('admin', $data);
	
		
		
		if($insert_id)
		{
			$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been saved successfully.</p>');			

			redirect($this->config->item('base_url') . 'admin/adminUsers');
		}
		else
		{
			$this->session->set_flashdata('message', '<p style="color:red; text-align:center;">Data not saved. Please try later.</p>');			

			redirect($this->config->item('base_url') . 'admin/adminUsers');
		}

	}
	
	public function update($id)

	{
		
		$data = array();

		$update_by = array();

		$post_data = $this->input->post();

		

		

		foreach($post_data as $key => $value)
		{
			if($key != 'form_type')
			{
				$data[$key] = $value;	
			}
		}
		
		
		if($data['status'])
		{
			$data['status'] = 1;
		}
		else
		{
			$data['status'] = 0;
		}
		
		
		if($data['password'] != '')
		{
		
			$data['password'] = md5($data['password']);
		}
		else
		{
			unset($data['password']);
		}
		
		$update = $this->Model_general->updateRow('admin', $data,$id);
		
		$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been updated successfully.</p>');			

		redirect($this->config->item('base_url') . 'admin/adminUsers/edit/'.$id);

		
	}
	
	public function deleteData($id)

	{

		

		$delete = $this->Model_general->deleteRow('admin',$id);

		$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been deleted successfully.</p>');			

		redirect($this->config->item('base_url') . 'admin/adminUsers');

		

	}

	

	

}

