<?php

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ems/model_configuration');
        $this->load->model('ems/model_contents');
        $this->load->model('ems/model_slider');
        $this->load->model('ems/model_contact');
        $this->load->model('ems/model_content_images');
    }
    
    public function index()
    {

        if (!$this->session->userdata('lang')) {
            $this->session->set_userdata(array('lang' => 'eng')); /* If no language is selected, set to default ENGLISH */
        }
        
       
        $data = array();
        $data['social']=$this->model_configuration->fetchRowSocialLink();
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
 // contact
        $data['content'] = $this->model_contents->fetchRow(17);
        $data['res'] = $this->model_contact->fetchAll('contact');

             

        $this->load->view("layouts/header", $data);
        $this->load->view("contact", $data);
        $this->load->view("layouts/footer", $data);
                
    }
     public function submit() {

        $this->load->model('ems/model_configuration');
        $rec=$this->model_configuration->fetchRow();

        $this->load->library('email');
        
         
        $this->form_validation->set_error_delimiters('<p>', '<p></br>');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        
        if ($this->form_validation->run()) { 
        

            $data = array();
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $company = $this->input->post('company');
            $title = $this->input->post('title');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
    /*----------------------------------------------*/
                $ip = '';
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            
            $ip= base_url().$ip;
            $date =date('Y-m-d');
            $bodytext="
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
<title>Untitled Document</title>
<style type=\"text/css\">
<!--
.gray_12{font-family:\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif; font-size:12px; color:#666666; font-weight:normal; }
.gray_12_bold{font-family:\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif; font-size:12px; color:#666666; font-weight:bold; }
.gray_15_bold{font-family:\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif; font-size:15px; color:#666666; font-weight:bold; }
.gray_10{font-family:\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif; font-size:10px; color:#666666; font-weight:normal; }
-->
</style>
</head>

<body>
<table width=\"707\" cellpadding=\"8\" border=\"2\">
    <tr>    
    <td width=\"230\"><span class=\"gray_12_bold\">Subject:</span></td><td><span class=\"gray_12\">&nbsp; $subject</span></td>
   </tr>

   <tr>    
    <td width=\"230\"><span class=\"gray_12_bold\">Name:</span></td><td><span class=\"gray_12\">&nbsp; $name</span></td>
   </tr>

    <tr>    
    <td width=\"230\"><span class=\"gray_12_bold\">Email:</span></td><td><span class=\"gray_12\">&nbsp; $email</span></td>
   </tr>

    <tr>    
    <td width=\"230\"><span class=\"gray_12_bold\">Title:</span></td><td><span class=\"gray_12\">&nbsp; $title</span></td>
   </tr>
    <tr>    
    <td width=\"230\"><span class=\"gray_12_bold\">Company Name:</span></td><td><span class=\"gray_12\">&nbsp; $company</span></td>
   </tr>
    <tr>    
    <td width=\"230\"><span class=\"gray_12_bold\">Telephone:</span></td><td><span class=\"gray_12\">&nbsp; $phone</span></td>
   </tr>

  <tr>     
    <td width=\"230\"><span class=\"gray_12_bold\">Message:</span></td><td><span class=\"gray_12\">&nbsp; $message</span></td>
  </tr>
  <tr>
  <td width=\"230\"><span class=\"gray_12_bold\">Email Form send from :</span>
               </td><td><span class=\"gray_12\">&nbsp; $ip</span></td>
    </tr>
    <tr>    
  <td width=\"230\"><span class=\"gray_12_bold\">Email form has been submitted on :</span>
               </td><td><span class=\"gray_12\">&nbsp; $date</span></td>
  </tr>
</table>
<p>&nbsp;</p>






</body>
</html>

";
    /*----------------------------------------------*/
        
                $this->email->set_newline("\r\n");
                $this->email->set_mailtype("html");
                $this->email->from($email);
                $this->email->to($rec->reachus_email); /* Admin Email */
                $this->email->subject('eDesign contact us form');
                $this->email->message($bodytext);
                   if ($this->email->send()) {
                    if (!$this->session->userdata('lang')) {
                    $this->session->set_userdata(array('lang' => 'eng')); /* Setting Default Language to English at start */
                }
                if ($this->session->userdata('lang') == 'eng'){
                    $msg = 'Form Submitted Sucessfully!';
                    $this->session->set_flashdata('message', $msg );
                    redirect('contact');
                   }
                if ($this->session->userdata('lang') == 'arb'){
                    $msg = 'تشكيل مقدم بنجاح !';
                    $this->session->set_flashdata('message', $msg );
                    redirect('ar/contact');
                }

                }
                 else {
                    show_error($this->email->print_debugger());
                }
                 
            
        }else { /* validation */

            $this->session->set_flashdata('message', validation_errors() );
            if($lang== 'eng'){
                redirect('contact');
            }else{
                redirect('ar/contact');
            }
            
        }
    }
 public function career() {
		 
       
        if (!$this->session->userdata('lang')) {
            $this->session->set_userdata(array('lang' => 'eng')); /* If no language is selected, set to default ENGLISH */
        }
        
       
        $data = array();
        $data['social']=$this->model_configuration->fetchRowSocialLink();
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
 // contact
        $data['content'] = $this->model_contents->fetchRow(17);
        $data['res'] = $this->model_contact->fetchAll('contact');

             

        $this->load->view("layouts/header", $data);
        $this->load->view("career", $data);
        $this->load->view("layouts/footer", $data);
		 
		 }
	
  public function submitCv() {

        $this->load->model('ems/model_configuration');
        $rec=$this->model_configuration->fetchRow();
        $this->load->library('email');
        
         
        $this->form_validation->set_error_delimiters('<p>', '<p></br>');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
        if (empty($_FILES['user_file']['name']))
        {
         $this->form_validation->set_rules('user_file[]', 'File', 'required');
        }
       
        $this->form_validation->set_rules('position', 'Position', 'required');
       /* $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('jobtitlte', 'Job Title', 'required');
        $this->form_validation->set_rules('comments', 'Comments', 'required');*/
        if ($this->form_validation->run()) { 
            $data = array();
            $data['first_name'] = $this->input->post('fname');
            $data['last_name'] = $this->input->post('lname');
            $data['email'] = $this->input->post('email');
            $data['mobile'] = $this->input->post('mobile');
            $data['division'] = $this->input->post('position');
           // $file = $this->input->post('file_cv');
        
            $data['file_name'] = $this->uploadCv();
            
    /*----------------------------------------------*/
                $ip = '';
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            
            $data['ip']= base_url().'contact/'.$ip;
            $data['created_at'] =date('Y-m-d');
            $bodytext="
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
<title>Untitled Document</title>
<style type=\"text/css\">
<!--
.gray_12{font-family:\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif; font-size:12px; color:#666666; font-weight:normal; }
.gray_12_bold{font-family:\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif; font-size:12px; color:#666666; font-weight:bold; }
.gray_15_bold{font-family:\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif; font-size:15px; color:#666666; font-weight:bold; }
.gray_10{font-family:\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif; font-size:10px; color:#666666; font-weight:normal; }
-->
</style>
</head>

<body>
<table width=\"707\" cellpadding=\"8\" border=\"2\">
   
   <tr>    
    <td width=\"230\"><span class=\"gray_12_bold\">Name:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['first_name']." ".$data['last_name']."</span></td>
   </tr>

    <tr>    
    <td width=\"230\"><span class=\"gray_12_bold\">Email:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['email']."</span></td>
   </tr>
    <tr>    
    <td width=\"230\"><span class=\"gray_12_bold\">Mobile:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['mobile']."</span></td>
   </tr>
   <tr>    
    <td width=\"230\"><span class=\"gray_12_bold\">Division:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['division']."</span></td>
   </tr>
  <tr>
  <td width=\"230\"><span class=\"gray_12_bold\">Email Form send from :</span>
               </td><td><span class=\"gray_12\">&nbsp; ".$data['ip']."</span></td>
    </tr>
    <tr>    
  <td width=\"230\"><span class=\"gray_12_bold\">Email form has been submitted on :</span>
               </td><td><span class=\"gray_12\">&nbsp; ".$data['created_at']."</span></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>

";
    /*----------------------------------------------*/
              //  $this->email->set_protocol("smtp");
                $this->email->set_newline("\r\n");
                $this->email->set_mailtype("html");
                $this->email->from($data['email']);
                $this->email->to($rec->reachus_email); /* Admin Email */
                $this->email->subject('Nesma Trading contact us career form');
               $path = FCPATH.'uploads/cvs/'.$data['file_name'];
               
                $this->email->attach($path);

                $this->email->message($bodytext);
                   if ($this->email->send()) {
					   $data['type'] = 1;
					   $this->model_contact->save('contact_forms',$data);
                    if (!$this->session->userdata('lang')) {
                    $this->session->set_userdata(array('lang' => 'eng')); /* Setting Default Language to English at start */
                }
                if ($this->session->userdata('lang') == 'eng'){
                    $msg = 'Form Submitted Sucessfully!';
                    $this->session->set_flashdata('message', $msg );
                    redirect('contact/career');
                   }
                if ($this->session->userdata('lang') == 'arb'){
                    $msg = 'تشكيل مقدم بنجاح !';
                    $this->session->set_flashdata('message', $msg );
                    redirect('contact/career');
                }

                }
                 else {
                    show_error($this->email->print_debugger());
                }
                 
            
        }else { /* validation */

            $this->session->set_flashdata('message', validation_errors() );

           redirect('contact#tab3');
        }
    }
    public function uploadCv() {

        $this->load->library('ali_upload');
        $config['upload_path'] = './uploads/cvs';
        $config['allowed_types'] = 'pdf|doc|docx';
        $this->ali_upload->setConfig($config);
         if ($this->ali_upload->multi_uploadContents($_FILES['user_file'], 'user_file[]')) {
            $files = $this->ali_upload->files;
            return $files[0];
        } else {
            echo "ERROR - " . $this->ali_upload->error;
        }
    } 
  
}