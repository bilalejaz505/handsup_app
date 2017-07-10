<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Language extends CI_Controller {



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

		checkAdminSession();

		//$res = checkLevels(2);

		//checkAuth($res);

    }

	

	

	public function index()

	{

		$data = array();

		$data['languages']	 = 	$this->Model_general->getAll('languages');

		$data['content'] = 'languages/manage';

		$data['class'] = 'languages'; 

		$this->load->view('default',$data);	

		

	}

	

	public function add()

	{

		$data = array();

		$data['content'] = 'languages/add';

		$data['class'] = 'languages'; 

		$this->load->view('default',$data);	

		

	}

	

	public function edit($id)

	{

		$data = array();

		$data['language']	 = 	$this->Model_general->getRow($id, 'languages');

		$data['content'] 	 =  'languages/edit';

		$data['class'] = 'languages';

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
		
		$data['created_at'] = date('Y-m-d H:i:s');
		
		
		
		$insert_id = $this->Model_general->save('languages', $data);
		
		
		if($insert_id)
		{
			$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been saved successfully.</p>');			

			redirect($this->config->item('base_url') . 'admin/language');
		}
		else
		{
			$this->session->set_flashdata('message', '<p style="color:red; text-align:center;">Data not saved. Please try later.</p>');			

			redirect($this->config->item('base_url') . 'admin/language');
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

		
		
		$update = $this->Model_general->updateRow('languages', $data,$id);
		
		$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been updated successfully.</p>');			

		redirect($this->config->item('base_url') . 'admin/language/edit/'.$id);

		
	}

	public function deleteData($id)

	{

		

		$delete = $this->Model_general->deleteRow('languages',$id);

		$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been deleted successfully.</p>');			

		redirect($this->config->item('base_url') . 'admin/language');

		

	}

	

	

}

