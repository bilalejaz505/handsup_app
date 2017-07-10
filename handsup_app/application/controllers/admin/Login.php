<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Login extends CI_Controller {



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

		

		//$res = checkLevels(2);

		//checkAuth($res);

    }

	

	public function index()

	{

		

		if($this->session->userdata('user'))

	   {

		    redirect($this->config->item('base_url') . 'admin/dashboard');

		   

	   }else

	   {

		   $this->load->view('login');

	   }

				

		

	}

    

	public function validate()

	{



		$data = array();

		$post_data = $this->input->post();

		$checkUser = false;

		

		foreach($post_data as $key => $value)

		{

			//if($key != 'submit_btn' && $key!='')

			$data[$key] = $value;

		}





		$user_type = 2; //2 is the eDesign admin type



		$user = $this->Model_general->validateLogin($data['username'],$data['password']);

	    

		if($user){

					

			$data = array();

					

			$this->session->set_userdata('user', $user->id);
			
			$this->session->set_userdata('user_role', $user->user_role_id);

			if($user->user_role_id == 1 || $user->user_role_id == 2)
			{
				redirect($this->config->item('base_url') . 'admin/dashboard');
			}
			elseif($user->user_role_id == 3)
			{
				redirect($this->config->item('base_url') . 'admin/users');
			}
			elseif($user->user_role_id == 4)
			{
				redirect($this->config->item('base_url') . 'admin/group');
			}
			elseif($user->user_role_id == 5)
			{
				redirect($this->config->item('base_url') . 'admin/project');
			}


		}else{



			$data = array();	

			$this->session->set_flashdata('message', '<p style="color:red; text-align:center;">Username or password incorrect.</p>');			

			redirect($this->config->item('base_url') . 'admin/login');

			

		}



	}



	public function logout()

	{

		$data = array();

		$arr_update = array();

		$user = $this->session->userdata('user');

		$arr_update['id'] = $user['id'];

		//$this->Model_user->update($data,$arr_update);

		$this->session->unset_userdata('user');

		

		redirect($this->config->item('base_url') . 'admin/login');

		

	}

	

}

