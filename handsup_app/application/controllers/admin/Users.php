<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Users extends CI_Controller {



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
		
		if($user_role != 1 && $user_role != 3)
		{
			redirect($this->config->item('base_url') . 'admin/error');
		}

		//$res = checkLevels(2);

		//checkAuth($res);

    }

	

	

	public function index()

	{

		$data = array();

		$data['users']	 = 	$this->Model_general->getAll('users');

		$data['content'] = 'users/manage';

		$data['class'] = 'users'; 

		$this->load->view('default',$data);	

		

	}
	
	
	public function add()

	{

		$data = array();
		
		$data['countries'] = $this->Model_general->getAll('countries');
		
		$data['content'] = 'users/add';

		$data['class'] = 'users'; 

		$this->load->view('default',$data);	

		

	}
	
	
	public function edit($id)

	{

		$data = array();

		$data['countries']	 = 	$this->Model_general->getAll('countries');

		$data['user']	 = 	$this->Model_general->getRow($id, 'users');
		
		$country = $this->Model_general->getRow($data['user']->country, 'countries');
		
		$data['cities'] = $this->Api_model->getMutipleRows('city', 'countrycode', $country->code);
		
		$data['countrycode'] = $country->code;
		
		$data['user']->id = $id;
		
		$data['content'] 	 =  'users/edit';

		$data['class'] = 'users';

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
		
		$country = $this->Model_general->getSingleRow('countries', array('code'=>$data['country']));
		
		$data['country'] = $country->id;
		
		$checkEmail = $this->Api_model->getMutipleRows('users', 'email', $data['email']);
		
		if(count($checkEmail)>0)
		{
			$this->session->set_flashdata('message', '<p style="color:red; text-align:center;">Email already exist.</p>');			

			redirect($this->config->item('base_url') . 'admin/users/add');
		}
		
		$data['password'] = md5($data['password']);

		$data['created_at'] = date('Y-m-d H:i:s');
		
		$error=array();
  
		$extension=array("jpeg","jpg","png","gif","JPEG","JPG","PNG","GIF");
	    if($_FILES["image"]["name"] != '')
		{
			$file_name=$_FILES["image"]["name"];
			$file_tmp=$_FILES["image"]["tmp_name"];
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);
			if(in_array($ext,$extension))
			{
				if(!file_exists("uploads/users/".$file_name))
				{
					move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"],"uploads/users/".$file_name);
					$data['image_url'] = base_url().'uploads/users/'.$file_name;
				}
				else
				{
					$filename=basename($file_name,$ext);
					$newFileName=$filename.time().".".$ext;
					move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"],"uploads/users/".$newFileName);
					$data['image_url'] = base_url().'uploads/users/'.$newFileName;
				}
			}
			else
			{
				array_push($error,"$file_name, ");
			}			
		}
		$insert_id = $this->Model_general->save('users', $data);
	
		
		
		if($insert_id)
		{
			$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been saved successfully.</p>');			

			redirect($this->config->item('base_url') . 'admin/users');
		}
		else
		{
			$this->session->set_flashdata('message', '<p style="color:red; text-align:center;">Data not saved. Please try later.</p>');			

			redirect($this->config->item('base_url') . 'admin/users');
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
		
		$country = $this->Model_general->getSingleRow('countries', array('code'=>$data['country']));
		
		$data['country'] = $country->id;
		
		
		if($data['password'] != '')
		{
		
			$data['password'] = md5($data['password']);
		}
		else
		{
			unset($data['password']);
		}
		$extension=array("jpeg","jpg","png","gif","JPEG","JPG","PNG","GIF");
	    if($_FILES["image"]["name"] != '')
		{
			$file_name=$_FILES["image"]["name"];
			$file_tmp=$_FILES["image"]["tmp_name"];
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);
			if(in_array($ext,$extension))
			{
				if(!file_exists("uploads/users/".$file_name))
				{
					move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"],"uploads/users/".$file_name);
					$data['image_url'] = base_url().'uploads/users/'.$file_name;
				}
				else
				{
					$filename=basename($file_name,$ext);
					$newFileName=$filename.time().".".$ext;
					move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"],"uploads/users/".$newFileName);
					$data['image_url'] = base_url().'uploads/users/'.$newFileName;
				}
			}
			else
			{
				array_push($error,"$file_name, ");
			}			
		}
		
		$update = $this->Model_general->updateRow('users', $data,$id);
		
		$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been updated successfully.</p>');			

		redirect($this->config->item('base_url') . 'admin/users/edit/'.$id);

		
	}
	
	public function getCity()
	{
		$response = array(); 
		
		$country_code = $this->input->post('code');
		
		$response = $this->Api_model->getMutipleRows('city', 'countrycode', $country_code);
		
		$city = '';
		
		foreach($response as $res){
			$city .= '<option value="'.$res['id'].'">'.$res['eng_name'].'</option>';
		}
		
		echo $city;
		exit;
		
		
	}


	public function deleteData($id)

	{

		

		$delete = $this->Model_general->deleteRow('users',$id);

		$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been deleted successfully.</p>');			

		redirect($this->config->item('base_url') . 'admin/users');

		

	}

	

	

}

