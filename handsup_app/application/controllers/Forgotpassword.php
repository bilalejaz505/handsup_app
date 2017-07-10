<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Forgotpassword extends CI_Controller {



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

		

		//$res = checkLevels(2);

		//checkAuth($res);

    }

	

	public function index()
	{
		$varification_code = $this->uri->segment(3);
		if($varification_code != '')
		{
			$user = $this->Model_general->getSingleRow('users', array('varification_code'=>$varification_code));
			if($user)
			{
				$data['varification_code']=$varification_code;
				$this->load->view('forgotpassword', $data);
			}
			else
			{
				show_404();	
			}
		}
		else
		{
			show_404();
		}
			
	}
	
	public function save()
	{
		$password = $this->input->post('password');
		$varification_code = $this->input->post('varification_code');
		$cnfrm_password = $this->input->post('cnfrm_password');
		if($password != $cnfrm_password)
		{
			$this->session->set_flashdata('message', '<p style="color:red; text-align:center;">Password & confirm password mismatch.</p>');
			redirect($this->config->item('base_url') . 'forgotpassword/index/'.$varification_code);
		}
		else
		{
			$data['password'] = md5($this->input->post('password'));
			$update = $this->Api_model->updateRow('users', $data, 'varification_code', $varification_code);
			$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Password updated successfully.</p>');
			redirect($this->config->item('base_url') . 'forgotpassword/index/'.$varification_code);
		}
		
		
	}

}

