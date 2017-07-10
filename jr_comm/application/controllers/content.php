<?php

class Content extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ems/model_configuration');
        $this->load->model('ems/model_contents');
        $this->load->model('ems/model_content_images');
		$this->load->library('email');
    }
    
    public function index()
    {
		
        if (!$this->session->userdata('lang')) {
            $this->session->set_userdata(array('lang' => 'eng')); /* If no language is selected, set to default ENGLISH */
        }
       
     	$data = array();
	    $page_title = $this->uri->segment(2);
		$page_title = str_replace('_',' ',$page_title);
		
		$page = getPageId($page_title);
		
	   // $page_id =  $this->uri->segment(4);
		$page_id = $page;
		$data['page_id']  = $page_id;
        $data['lang'] = $this->session->userdata('lang');  
	    $data['conents'] = $this->model_contents->page_content($page_id);
		
				
		$this->load->view("layouts/header", $data);
		$this->load->view($data['conents'][0]->tpl, $data);	 
        $this->load->view("layouts/footer", $data);
                
    }
   public function detail()
    {
    
        $page_title = $this->uri->segment(3);
		$page_title = str_replace('_',' ',$page_title);
		
		$page = getPageId($page_title);
		$page_id = $page;
       // $page_id =  $this->uri->segment(3);

        if (!$this->session->userdata('lang')) {
            $this->session->set_userdata(array('lang' => 'eng')); /* If no language is selected, set to default ENGLISH */
        }
        
      
        $data = array();
        $data['lang'] = $this->session->userdata('lang');  
		
        $data['result'] = $this->model_contents->fetchRow($page_id);
		
		foreach($this->model_contents->front_end_content($data['result']->parant_id) as $val){
		  $data['pagination'][] = $val->id;
		}
		
		
		
		
        $this->load->view("layouts/header", $data);
        $this->load->view("detail", $data);
        $this->load->view("layouts/footer", $data);
                
    }
	
	  public function submit() {
        $rec['res']=$this->model_configuration->fetchRow();
        $response = $this->input->post('g-recaptcha-response');

        $req = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6Ld5EgUTAAAAAPFS0E5wLMTe3ncrF0SB7nCNidZU&response=' . $response);
        $req = json_decode($req);

        if (!$req->success) {
            if ($this->session->userdata('lang') == 'eng') {
                $this->session->set_flashdata('emailStatus', 'Please click on "I\'m not a robot"');
            } else {
                $this->session->set_flashdata('emailStatus', 'الرجاء الضغط على " أنا لست الروبوت"');
            }
            redirect('contact');
        }

        $this->form_validation->set_error_delimiters('<p>', '<p></br>');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run()) { /* Validation check */

            $data = array();
            $name = $this->input->post('name');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
            $service = $this->input->post('service') ? $this->input->post('service') : "";

            $ip = '';
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
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
    <td width=\"230\"><span class=\"gray_12_bold\">Telephone:</span></td><td><span class=\"gray_12\">&nbsp; $phone</span></td>
   </tr>

  <tr>     
    <td width=\"230\"><span class=\"gray_12_bold\">Message:</span></td><td><span class=\"gray_12\">&nbsp; $message</span></td>
  </tr>
</table>
<p>&nbsp;</p>






</body>
</html>

";
            $bodytext .= '<p style="font-size: 90%; margin:0; background:#aaaaaa; padding:1em 2em 1em 0.6em; color:#555555; text-shadow:0 1px 0 #c5c5c5; border-bottom:1px solid #9d9d9d;">A form has been submitted on ' . date("l jS \of F Y h:i:s A") . ', via: ' . base_url() . 'contact/ [IP ' . $ip . ']</p>';


            $this->email->set_newline("\r\n");
            $this->email->set_mailtype("html");
            $this->email->from($email);
		  //  $this->email->to( $rec['res']->from_email);
		   // $this->email->to("imran.shoukat@edesign.com.sa"); /* Admin Email */
            $this->email->to($rec['res']->reachus_email); /* Test Email */
            $this->email->subject('A comment from ' . $name);
            $this->email->message($bodytext);
            if ($this->email->send()) {
                $stat = '';
                if ($this->session->userdata('lang') == 'eng') {
                    $stat = 'Your message was sent successfully. Thanks.';
                } else {
                    $stat = ' تم إرسال رسالتك بنجاح. شكر. ';
                }
                $this->session->set_flashdata('emailStatus', $stat);
                redirect('contact');
            } else {
                show_error($this->email->print_debugger());
            }
        } else { /* validation */
            $this->session->set_flashdata('emailStatus', validation_errors() );
            redirect('contact');
        }
    }

      public function checkCaptcha() {
        $response = $this->input->post('g-recaptcha-response');

        $req = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6Ld5EgUTAAAAAPFS0E5wLMTe3ncrF0SB7nCNidZU&response=' . $response);
        $req = json_decode($req);

        if (!$req->success) {
            echo 0;
        } else {
            echo 1;
        }
    }
	
	public function preview($page_id)
    {

       if (!$this->session->userdata('lang')) {
            $this->session->set_userdata(array('lang' => 'eng')); /* If no language is selected, set to default ENGLISH */
        }
       
     	$data = array();
	   // $page_id =  $this->uri->segment(4);
		
		$data['form_content'] = $this->input->post();
		$data['preview'] = 1;
		$data['page_id']  = $page_id;
        $data['lang'] = $this->session->userdata('lang');  
	    $data['conents'] = $this->model_contents->page_content($page_id);
		
				
		$this->load->view("layouts/header", $data);
		$this->load->view($data['conents'][0]->tpl, $data);	 
        $this->load->view("layouts/footer", $data);
    }
	  
	  
	  
	   public function detailPreview($page_id)
    {


      //  $page_id =  $this->uri->segment(3);

        if (!$this->session->userdata('lang')) {
            $this->session->set_userdata(array('lang' => 'eng')); /* If no language is selected, set to default ENGLISH */
        }
        
      
        $data = array();
		$data['form_content'] = $this->input->post();
		$data['preview'] = 1;
        $data['lang'] = $this->session->userdata('lang');  
		
        $data['result'] = $this->model_contents->fetchRow($page_id);
		
		foreach($this->model_contents->front_end_content($data['result']->parant_id) as $val){
		  $data['pagination'][] = $val->id;
		}
		
		
		
		
        $this->load->view("layouts/header", $data);
        $this->load->view("detail", $data);
        $this->load->view("layouts/footer", $data);
                
    }
	
	
}