<?php

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ems/model_configuration');
        $this->load->model('ems/model_contents');
        $this->load->model('ems/model_members');
        $this->load->model('ems/model_slider');
        $this->load->model('ems/model_content_images');
		//$res = checkLevels(2);
		//checkAuth($res);
    }
    
    public function index($page)
    {

        if (!$this->session->userdata('lang')) {
            $this->session->set_userdata(array('lang' => 'eng')); /* If no language is selected, set to default ENGLISH */
        }
        
       
     	$data = array();
	    $data['social']=$this->model_configuration->fetchRowSocialLink();
        $data['menu'] = 'about';
        $data['lang'] = $this->session->userdata('lang');  
        $data['sliderList'] = $this->model_slider->fetchAllSlides(0); // slider  
        /* Re-arraning the MenuLabels into array for easy-use in views */
        $this->load->model('ems/model_clientmenus');
        $temp = $this->model_clientmenus->fetchAll();
        $menus = array();
        foreach ($temp as $menu) {
            $id = $menu['MenuID'];
            $menus[$id] = array('eng' => $menu['Title_en'], 'arb' => $menu['Title_ar'], 'menu_pub_status' => $menu['menu_pub_status']);
        }
        $data['menuLabels'] = $menus;
        //$data['pagemenu']=$this->model_clientmenus->fetchChildmenu(2);

        //var_dump($data['menuLabels']);exit;
        /* end of re-arrangings */
 // about Profile
        $data['profile'] = $this->model_contents->fetchRow(2);
  //    $data['bannerphotos'] = $this->model_content_images->fetchBannerImages(2);  these images are not in use off this page
  //    $data['sidephotos_profile'] = $this->model_content_images->fetchSideImages(2);
// about history
        $data['history'] = $this->model_contents->fetchRow(3);
// team and board members
        $data['members'] = $this->model_members->fetchAll(2);        

        $this->load->view("layouts/header", $data);
        $this->load->view("about", $data);
        $this->load->view("layouts/footer", $data);
                
    }
  
}