<?php

class Logout extends CI_Controller {

    function index()
    {
       $this->session->unset_userdata('user');
					redirect(lang_base_url());
       /* redirect('index.php');*/
    }
}