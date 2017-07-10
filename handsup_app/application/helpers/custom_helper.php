<?php



if (!defined('BASEPATH'))



 exit('No direct script access allowed');



function checkAdminSession()
{
   	$CI = & get_Instance();
   	$check = $CI->session->userdata('user');
	if ($CI->input->is_ajax_request()) {
		if($check)
		{
			return true;
		}else
		{
			$data['session_out'] = 'true';
			echo json_encode($data);
			exit();
		}
	}else
	{
		if($check)
		{
			return true;
		}else
		{
			redirect($CI->config->item('base_url') . 'admin/login');
		}
	}
}

function getUserRole($id)
{
	$CI = & get_Instance();
	
	$CI->load->model('Model_general');
	
	$getRole = $CI->Model_general->getRow($id, 'user_roles');
	
	return $getRole->user_role;
	
}