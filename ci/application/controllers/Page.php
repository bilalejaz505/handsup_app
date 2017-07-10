<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('my_model');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function testing($num, $num2='')
	{
		
		if ($num == 'save')
		{
			echo 'save';
		}elseif ($num == 'update'){
			echo 'update';
			echo $num2;
		}elseif ($num == 'delete'){
			echo 'delete';
		}
		
	}


	public function load_form()
	{
		$allData['records'] = $this->my_model->fetch_data();
		//echo '<pre>';print_r($allData['records']);exit();
		//$data['abc'] = 'This is my abc string';
		$this->load->view('my_view', $allData);
	}

	public function save()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$dataArr['name'] = $name;
		$dataArr['email'] = $email;
		$dataArr['timestamp'] = date('Y-m-d H:i:s');
		//echo 'here';exit();
		$savedId = $this->my_model->save($dataArr);
		redirect('page/load_form');
	}
}
