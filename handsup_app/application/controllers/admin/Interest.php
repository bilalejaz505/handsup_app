<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class interest extends CI_Controller {



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

		$data['interests']	 = 	$this->Model_general->getAll('interests');

		$data['content'] = 'interests/manage';

		$data['class'] = 'interests'; 

		$this->load->view('default',$data);	

		

	}

	

	public function add()

	{

		$data = array();

		$data['content'] = 'interests/add';

		$data['class'] = 'interests'; 

		$this->load->view('default',$data);	

		

	}

	

	public function edit($id)

	{

		$data = array();

		$data['interest']	 = 	$this->Model_general->getRow($id, 'interests');

		$data['content'] 	 =  'interests/edit';

		$data['class'] = 'interests';

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
		
		$dataImg['place_id'] = $insert_id;
		
		$error=array();
    	$extension=array("jpeg","jpg","png","gif");
	    if($_FILES["image"]["name"] != '')
		{
			$file_name=$_FILES["image"]["name"];
			$file_tmp=$_FILES["image"]["tmp_name"];
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);
			if(in_array($ext,$extension))
			{
				if(!file_exists("uploads/interest/".$file_name))
				{
					move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"],"uploads/interest/".$file_name);
					$data['image'] = base_url().'uploads/interest/'.$file_name;
				}
				else
				{
					$filename=basename($file_name,$ext);
					$newFileName=$filename.time().".".$ext;
					move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"],"uploads/interest/".$newFileName);
					$data['image'] = base_url().'uploads/interest/'.$newFileName;
				}
			}
			else
			{
				array_push($error,"$file_name, ");
			}			
		}
		
		
		
		$insert_id = $this->Model_general->save('interests', $data);
		
		
		if($insert_id)
		{
			$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been saved successfully.</p>');			

			redirect($this->config->item('base_url') . 'admin/interest');
		}
		else
		{
			$this->session->set_flashdata('message', '<p style="color:red; text-align:center;">Data not saved. Please try later.</p>');			

			redirect($this->config->item('base_url') . 'admin/interest');
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

		
		$error=array();
    	$extension=array("jpeg","jpg","png","gif");
	    if($_FILES["image"]["name"] != '')
		{
			$file_name=$_FILES["image"]["name"];
			$file_tmp=$_FILES["image"]["tmp_name"];
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);
			if(in_array($ext,$extension))
			{
				if(!file_exists("uploads/interest/".$file_name))
				{
					move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"],"uploads/interest/".$file_name);
					$data['image'] = base_url().'uploads/interest/'.$file_name;
				}
				else
				{
					$filename=basename($file_name,$ext);
					$newFileName=$filename.time().".".$ext;
					move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"],"uploads/interest/".$newFileName);
					$data['image'] = base_url().'uploads/interest/'.$newFileName;
				}
			}
			else
			{
				array_push($error,"$file_name, ");
			}			
		}
		
		
		$update = $this->Model_general->updateRow('interests', $data,$id);
		
		$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been updated successfully.</p>');			

		redirect($this->config->item('base_url') . 'admin/interest/edit/'.$id);

		
	}

	public function deleteData($id)

	{

		

		$delete = $this->Model_general->deleteRow('interests',$id);

		$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been deleted successfully.</p>');			

		redirect($this->config->item('base_url') . 'admin/interest');

		

	}

	

	

}

