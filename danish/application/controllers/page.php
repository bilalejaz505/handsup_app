<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('my_model');
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function test($num1, $num2)
	{
		if($num1=='save'){
		echo 'save';
		}
	}

public function loadform(){
	$allData['records'] = $this->my_model->fetch_data();
	$this->load->view('form', $allData);
}

public function insert()
{
	$name=$this->input->post('name');
	$email=$this->input->post('email');
	$mobile=$this->input->post('mobile');
	$data['name']=$name;
	$data['email']=$email;
	$data['mobile']=$mobile;
    $savedId = $this->my_model->save($data);
		redirect('page/loadform');
}
	}
