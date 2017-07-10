<?php


class Page extends CI_Controller


{


    public function __construct()


    {


        parent::__construct();


        $this->load->model('ems/model_configuration');


        $this->load->model('ems/model_contents');


        $this->load->model('ems/model_content_images');

        $this->load->model('model_login');

        $this->load->model('job_model');


        $this->load->library('pagination');


        $this->load->library('email');


        if (!$this->session->userdata('lang')) {
            $this->session->set_userdata(array('lang' => 'arb'));

            /*if($this->uri->segment(1) == 'ar')

            {

                $this->session->set_userdata(array('lang' => 'arb'));

            }else

            {

                $this->session->set_userdata(array('lang' => 'eng'));

            }*/


        } else {


            $lang = $this->session->userdata('lang');


            $segment = $this->uri->segment(1);


            if ($lang == 'eng') {


                $url = base_url();


                if ($segment == 'ar') {


                    $this->session->set_userdata(array('lang' => 'arb'));


                }


            } else if ($lang == 'arb') {


                if ($segment == '' || $segment == 'page') {


                    $this->session->set_userdata(array('lang' => 'eng'));


                } else if ($segment == 'ar') {


                    $this->session->set_userdata(array('lang' => 'arb'));


                }


            }


        }


    }


    public function index($page_title = 'Home')


    {


        $data = array();


        $lang = $this->session->userdata('lang');


        if ($lang == 'eng') {


            $segment = $this->uri->segment(2);


        } else {


            $segment = $this->uri->segment(3);


        }


        if ($segment != '') {


            $page_title = $segment;


        }


        if (is_numeric($page_title)) {


            $page = $page_title;


        } else {


            $page_title = str_replace('_', ' ', $page_title);


            $page = getPageId($page_title);


        }


        $page_id = $page;


        $data['page_id'] = $page_id;


        $data['lang'] = $lang;


        $contents = $this->model_contents->page_content($page_id);


        $parent_id = getParentPageId($contents[0]->id);


        if ($parent_id == '' || $parent_id == 0) {


            $parent_id = $contents[0]->id;


        }

        $contents[0]->tpl = 'home';
        echo $data['content'] = $contents[0]->tpl;


        $data['contents'] = $contents;


        $data['parent_id'] = $parent_id;


        $this->load->view("layouts/default", $data);


    }


    public function postCalculatorData()

    {

        $data = array();

        $lang = $this->session->userdata('lang');


        $data = $this->input->post();

        $data['downpayment'] = str_replace('%', '', $this->input->post('downpayment'));

        $data['ballonpayment'] = str_replace('%', '', $this->input->post('ballonpayment'));

        $data['from_home'] = 1;

        $data['lang'] = $lang;


        $data['content'] = 'finance_cal';

        $this->load->view("layouts/default", $data);


    }


    public function csr_event_detail($page_title = 'Home')


    {

        $data = array();

        $lang = $this->session->userdata('lang');


        if ($lang == 'eng') {


            $segment = $this->uri->segment(3);


        } else {


            $segment = $this->uri->segment(4);


        }


        if ($segment != '') {


            $page_title = $segment;


        }


        $page_id = $page_title;


        $data['lang'] = $lang;


        $contents = $this->model_contents->page_content($page_title);


        $parent_id = getParentPageId($contents[0]->id);


        if ($parent_id == '' || $parent_id == 0) {


            $parent_id = $contents[0]->id;


        }


        $data['contents'] = $contents;


        $data['content'] = 'csr_event_detail';

        $data['page_id'] = $page_id;

        $data['parent_id'] = $parent_id;


        $this->load->view("layouts/default", $data);

    }

    public function news_detail($page_title = 'Home')


    {


        $data = array();


        $lang = $this->session->userdata('lang');


        if ($lang == 'eng') {


            $segment = $this->uri->segment(3);


        } else {


            $segment = $this->uri->segment(4);


        }


        if ($segment != '') {


            $page_title = $segment;


        }


        $page_id = $page_title;


        $data['lang'] = $lang;


        $contents = $this->model_contents->page_content($page_title);


        $parent_id = getParentPageId($contents[0]->id);


        if ($parent_id == '' || $parent_id == 0) {


            $parent_id = $contents[0]->id;


        }


        $data['contents'] = $contents;


        $data['content'] = 'news-detail';

        $data['page_id'] = $page_id;

        $data['parent_id'] = $contents[0]->parant_id;


        $this->load->view("layouts/default", $data);


    }


    public function company_detail($page_title = 'Home')


    {


        $data = array();


        $lang = $this->session->userdata('lang');


        if ($lang == 'eng') {


            $segment = $this->uri->segment(3);


        } else {


            $segment = $this->uri->segment(4);


        }


        if ($segment != '') {


            $page_title = $segment;


        }


        $page_id = $page_title;


        $data['lang'] = $lang;


        $contents = $this->model_contents->page_content($page_title);


        $parent_id = getParentPageId($contents[0]->id);


        if ($parent_id == '' || $parent_id == 0) {


            $parent_id = $contents[0]->id;


        }


        $data['contents'] = $contents;


        $data['content'] = 'company-detail';

        $data['page_id'] = $page_id;

        $data['parent_id'] = $contents[0]->parant_id;


        $this->load->view("layouts/default", $data);


    }

    public function project_detail($page_title = 'Home')


    {


        $data = array();


        $lang = $this->session->userdata('lang');


        if ($lang == 'eng') {


            $segment = $this->uri->segment(3);


        } else {


            $segment = $this->uri->segment(4);


        }


        if ($segment != '') {


            $page_title = $segment;


        }


        $page_id = $page_title;


        $data['lang'] = $lang;


        $contents = $this->model_contents->page_content($page_title);


        $parent_id = getParentPageId($contents[0]->id);


        if ($parent_id == '' || $parent_id == 0) {


            $parent_id = $contents[0]->id;


        }


        $data['contents'] = $contents;


        $data['content'] = 'project-detail';

        $data['page_id'] = $page_id;

        $data['parent_id'] = $contents[0]->parant_id;


        $this->load->view("layouts/default", $data);


    }

    public function industory_detail($page_title = 'Home')


    {


        $data = array();


        $lang = $this->session->userdata('lang');


        if ($lang == 'eng') {


            $segment = $this->uri->segment(3);


        } else {


            $segment = $this->uri->segment(4);


        }


        if ($segment != '') {


            $page_title = $segment;


        }


        $page_id = $page_title;


        $data['lang'] = $lang;


        $contents = $this->model_contents->page_content($page_title);


        $parent_id = getParentPageId($contents[0]->id);


        if ($parent_id == '' || $parent_id == 0) {


            $parent_id = $contents[0]->id;


        }


        $data['contents'] = $contents;


        $data['content'] = 'industory-detail';

        $data['page_id'] = $page_id;

        $data['parent_id'] = $contents[0]->parant_id;


        $this->load->view("layouts/default", $data);


    }

    public function album_detail($page_title = 'Home')


    {

        $data = array();

        $lang = $this->session->userdata('lang');


        if ($lang == 'eng') {


            $segment = $this->uri->segment(3);


        } else {


            $segment = $this->uri->segment(4);


        }


        if ($segment != '') {


            $page_title = $segment;


        }


        $page_id = $page_title;


        $data['lang'] = $lang;


        $contents = $this->model_contents->page_content($page_title);


        $parent_id = getParentPageId($contents[0]->id);


        if ($parent_id == '' || $parent_id == 0) {


            $parent_id = $contents[0]->id;


        }


        $data['contents'] = $contents;


        $data['content'] = 'album_detail';

        $data['page_id'] = $page_id;

        $data['parent_id'] = $parent_id;


        $this->load->view("layouts/default", $data);


    }

    public function hotel_detail($page_title = 'Home')


    {


        $data = array();


        $lang = $this->session->userdata('lang');


        if ($lang == 'eng') {


            $segment = $this->uri->segment(3);


        } else {


            $segment = $this->uri->segment(4);


        }


        if ($segment != '') {


            $page_title = $segment;


        }


        $page_id = $page_title;


        $data['lang'] = $lang;


        $contents = $this->model_contents->page_content($page_id);


        $parent_id = getParentPageId($contents[0]->id);


        if ($parent_id == '' || $parent_id == 0) {


            $parent_id = $contents[0]->id;


        }


        $data['contents'] = $contents;


        $data['content'] = 'hotel-detail';

        $data['page_id'] = $page_id;

        $data['parent_id'] = $contents[0]->parant_id;


        $this->load->view("layouts/default", $data);


    }


    public function detail()


    {


        $page_title = $this->uri->segment(3);


        $page_title = str_replace('_', ' ', $page_title);


        $page = getPageId($page_title);


        $page_id = $page;


        // $page_id =  $this->uri->segment(3);


        if (!$this->session->userdata('lang')) {


            $this->session->set_userdata(array('lang' => 'eng')); /* If no language is selected, set to default ENGLISH */


        }


        $data = array();


        $data['lang'] = $this->session->userdata('lang');


        $data['result'] = $this->model_contents->fetchRow($page_id);


        foreach ($this->model_contents->front_end_content($data['result']->parant_id) as $val) {


            $data['pagination'][] = $val->id;


        }


        $this->load->view("layouts/header", $data);


        $this->load->view("detail", $data);


        $this->load->view("layouts/footer", $data);


    }


    public function submit()
    {


        $rec['res'] = $this->model_configuration->fetchRow();


        $lang = $this->session->userdata('lang');


        $this->form_validation->set_error_delimiters('<p>', '<p></br>');

            $v_name = "Name";

            $v_phone = "Phone";

            $v_email = "Email";

            $message = "Message";



        /*if($this->input->post('subject')){

            $this->form_validation->set_rules('subject', 'Subject', 'required');

        }*/

        $this->form_validation->set_rules('name', $v_name, 'required');


        $this->form_validation->set_rules('message', $message, 'required');

        $this->form_validation->set_rules('email', $v_email, 'required|valid_email');


            $this->form_validation->set_message('required', '%s can not be blank.');

            $this->form_validation->set_message('valid_email', 'Please enter a valid email address.');



        if ($this->form_validation->run()) { /* Validation check */


            $data = array();


            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $company = $this->input->post('company');
            $phone = $this->input->post('phone');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $message = $this->input->post('message');


            $data['inq_user'] = $name;

            $data['inq_email'] = $email;

            $data['company'] = $company;
            $data['inq_phone'] = $phone;
            $data['mobile'] = $mobile;
            $data['city'] = $address;
            $data['inq_desc'] = $message;

            $sub_html = '';


            $ip = '';


            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {


                $ip = $_SERVER['HTTP_CLIENT_IP'];


            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {


                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];


            } else {


                $ip = $_SERVER['REMOTE_ADDR'];


            }


            $bodytext = "



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



    <td width=\"230\"><span class=\"gray_12_bold\">Name:</span></td><td><span class=\"gray_12\">&nbsp; $name</span></td>



   </tr>



    <tr>    



    <td width=\"230\"><span class=\"gray_12_bold\">Email:</span></td><td><span class=\"gray_12\">&nbsp; $email</span></td>



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



            $this->email->to($rec['res']->from_email);




            $this->email->subject('Contact Feedback From ' . $name);


            $this->email->message($bodytext);


            if ($this->email->send()) {


                $stat = '';

                $this->model_contents->saveContactUs($data);


                //$this->model_contents->saveContactUs($data);
                $stat = 'Your message has been sent successfully. Thanks.';
                $this->session->set_flashdata('message', $stat);
                $contact_id = getPageIdbyTemplate('contact_us');
                $title = implode('_', ' ', getPageTitle($contact_id));
                redirect('page/'.$title);

                if ($lang == 'eng') {

                    $stat = 'Your message has been sent successfully. Thanks.';

                } else {

                    $stat = ' تم ارسال رسالتك بنجاح. شكراً ';

                }

                $result['msg'] = $stat;

                $result['success'] = true;

                $result['reset'] = 1;

                echo json_encode($result);
                exit();


            } else {


                show_error($this->email->print_debugger());


            }


        } else { /* validation */


            if ($lang == 'eng') {


                $result['msg'] = validation_errors();

                $result['error'] = true;

                echo json_encode($result);
                exit();

                redirect('page/'.$this->input->post('page_title'));

            } else {

                $result['error'] = true;

                $result['msg'] = validation_errors();

                echo json_encode($result);
                exit();


            }


        }


    }


    public function checkCaptcha()
    {


        $response = $this->input->post('g-recaptcha-response');


        $req = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6Ld5EgUTAAAAAPFS0E5wLMTe3ncrF0SB7nCNidZU&response=' . $response);


        $req = json_decode($req);


        if (!$req->success) {


            echo 0;


        } else {


            echo 1;


        }


    }


    public function search()

    {

        $lang = $this->session->userdata('lang');

        $items = array();

        $item_name = $this->input->post('item_title');

        if ($this->input->post('item_title')) {

            $items = getAllData($item_name);

        }


        $option = '';

        $data = array();

        $data['title'] = $item_name;


        $data['lang'] = $lang;

        if ($items) {

            $data['items'] = $items;


        } else {

            if ($this->input->post('item_title')) {

                if ($lang == 'eng') {

                    $data['message'] = 'No result found';

                } else {

                    $data['message'] = 'لم يتم العثور على نتائج';

                }

            }


        }


        $this->load->view("layouts/header", $data);


        $this->load->view("search", $data);


        $this->load->view("layouts/footer", $data);


    }


    public function preview($page_id)


    {


        $data = array();


        $lang = $this->session->userdata('lang');


        $data['page_id'] = $page_id;


        //$data = array();


        // $page_id =  $this->uri->segment(4);


        $data['form_content'] = $this->input->post();


        //print_r($data['form_content']);exit();


        $data['preview'] = 1;


        $data['page_id'] = $page_id;


        $data['lang'] = $this->session->userdata('lang');


        $contents = $this->model_contents->page_content($page_id);


        $data['contents'] = $contents;


        $data['content'] = $contents[0]->tpl;

        $parent_id = getParentPageId($data['contents'][0]->id);


        if ($parent_id == '' || $parent_id == 0) {


            $parent_id = $contents[0]->id;


        }


        if ($data['contents'][0]->parant_id != 0) {


            $contents_parant = $this->model_contents->page_content($data['contents'][0]->parant_id);

            $parent_id = $contents[0]->parant_id;


            if ($contents_parant[0]->tpl == 'news') {

                $data['content'] = 'news-detail';

            } elseif ($contents_parant[0]->tpl == 'hotels') {

                $data['content'] = 'hotel-detail';

            } elseif ($contents_parant[0]->tpl == 'career') {


                $data['content'] = 'career_detail';

            } elseif ($contents_parant[0]->tpl == 'csr') {


                $data['content'] = 'csr_event_detail';

            } elseif ($contents_parant[0]->tpl == 'industory') {


                $data['content'] = 'industory-detail';

            } elseif ($contents_parant[0]->tpl == 'companies-listing') {


                $data['content'] = 'company-detail';

            } elseif ($contents_parant[0]->tpl == 'projects-listing') {


                $data['content'] = 'project-detail';

            }


        }


        $data['parent_id'] = $parent_id;


        $this->load->view("layouts/default", $data);


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


        foreach ($this->model_contents->front_end_content($data['result']->parant_id) as $val) {


            $data['pagination'][] = $val->id;


        }


        $this->load->view("layouts/header", $data);


        $this->load->view("detail", $data);


        $this->load->view("layouts/footer", $data);


    }


    public function SaveQuote()
    {

        $data = array();

        //personal information form fields

        /*   foreach($_POST as $key =>$value){

                     if($key != 'sdgds' && )

                     $user[$key] = $value;

                 }*/

        $lang = $this->session->userdata('lang');


        $data['name'] = $this->input->post('name');

        $data['email'] = $this->input->post('email');

        $data['phone'] = $this->input->post('phone');

        $data['category'] = $this->input->post('category_id');

        $data['sub_category'] = $this->input->post('sub_category_id');

        $data['sub_sub_category'] = $this->input->post('sub_sub_category_id');

        $data['product'] = $this->input->post('product_id');

        $data['message'] = $this->input->post('message');


        $quote_id = $this->model_contents->SaveQuote($data);

        if ($quote_id) {

            if ($lang == 'eng') {

                $this->session->set_flashdata('message', 'Quote Request Sent Successfully');

            } else {

                $this->session->set_flashdata('message', 'تم ارسال رسالتك بنجاح. شكراً');

            }


            redirect(lang_base_url() . 'page/' . $this->input->post('page_title'));

        } else {

            $this->session->set_flashdata('message', 'Failed Saving Quote');

            redirect(lang_base_url() . 'page/' . $this->input->post('page_title'));

        }


    }


    public function login()
    {


        $lang = $this->session->userdata('lang');

        $this->form_validation->set_rules('email', 'Email', 'required');

        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE) {


            $this->session->set_flashdata('message', 'Email and password required!');

            redirect($this->config->item('base_url'));

        } else {


            $result = $this->model_login->login($this->input->post('email'), $this->input->post('password'));


            if ($result) {

                foreach ($result as $row) {

                    $user = (array)$row;

                    $this->session->set_userdata('user', $user);


                }


                $result['msg'] = 'Logged in successfully';

                $result['success'] = true;

                echo json_encode($result);
                exit();


            } else {

                if ($lang == 'eng') {

                    $result['msg'] = 'Email or Password is incorrect';

                } else {

                    $result['msg'] = 'البريد الإلكتروني أو كلمة المرور غير صحيحة';

                }


                $result['success'] = false;

                echo json_encode($result);
                exit();

                /*if($lang == 'eng'){

                    $this->session->set_flashdata('message', 'Invalid Email or password.');

                redirect($this->config->item('base_url') . 'page/home');

                } else {

                    $this->session->set_flashdata('message', 'Invalid Email or password.');

                redirect($this->config->item('base_url') . 'ar/page/home');

                } */

            }

        }


    }


    public function forgot_password()

    {


        $lang = $this->session->userdata('lang');

        $data['lang'] = $lang;

        $this->load->view("layouts/header", $data);

        $this->load->view("forgot_password", $data);

        $this->load->view("layouts/footer", $data);

    }


    public function logged_in()

    {


        $lang = $this->session->userdata('lang');

        $data['lang'] = $lang;

        if ($this->session->userdata('user')) {

            $this->load->view("layouts/header", $data);

            $this->load->view("login", $data);

            $this->load->view("layouts/footer", $data);

        } else {

            redirect(lang_base_url());

        }

    }


    public function recoverPassword()

    {


        $lang = $this->session->userdata('lang');


        $email = $this->input->post('email');

        $check_pass = $this->model_login->check_password($email);

        if ($check_pass) {

            $random_password = generateRandomString();


            $data['password'] = $random_password;


            $result = $this->model_login->new_password($data, $email);


            $mail_to = $this->send_new_email($email, $random_password);

            if ($mail_to) {

                $this->session->set_flashdata('message', ($lang == 'eng' ? 'Your password has been changed and login detail has been sent to your registered email address' : 'لقد تم إنشاء حسابك و معلومات تسجيل الدخول أرسلت إلى بريدك الإلكتروني'));


            }


            redirect(lang_base_url() . 'page/forgot_password');


        } else {

            $this->session->set_flashdata('message', ($lang == 'eng' ? 'Email Dont Exist' : 'البريد الإلكتروني غير موجود'));

            redirect(lang_base_url() . 'page/forgot_password');

        }


    }


    public function send_new_email($email, $random_password)
    {


        $message = '';

        $message .= "Use below detail to login";

        $message .= "<br/><br/><b>User Name &nbsp;:</b>&nbsp;" . $email;

        $message .= "<br/><b>User Password &nbsp;:</b>&nbsp;" . $random_password;

        $body = $message;

        $subject = "Your New Password and Login Details are: ";

        $headers = "MIME-Version: 1.0" . "\r\n";

        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

        $headers .= 'From:<FAS Hotels>' . "\r\n";

        if (mail($email, $subject, $body, $headers)) {

            return true;

        }


    }


    public function uploadCv($file = 'cv')
    {


        $this->load->library('ali_upload');

        $config['upload_path'] = './uploads/cv';

        $config['allowed_types'] = 'pdf|doc|docx';

        $this->ali_upload->setConfig($config);

        if ($this->ali_upload->multi_uploadContents($_FILES[$file], $file . '[]')) {

            $files = $this->ali_upload->files;

            return $files[0];


        }

    }


    public function career_message($msg_id)

    {


        if (!$this->session->userdata('lang')) {

            $this->session->set_userdata(array('lang' => 'eng')); /* If no language is selected, set to default ENGLISH */

        }


        $data['page_id'] = 'career_message';

        $data['lang'] = $this->session->userdata('lang');


        $fetch_msg_id = getFrontEndDataByTpl('career_message');


        $data['content'] = $fetch_msg_id[0]->tpl;


        $data['msg_id'] = $msg_id;


        $data['contents'] = $fetch_msg_id;


        $this->load->view("layouts/default", $data);


    }


    public function career_detail()

    {


        $page_id = $this->uri->segment(3);

        // $page_id =  $this->uri->segment(3);


        if (!$this->session->userdata('lang')) {

            $this->session->set_userdata(array('lang' => 'eng')); /* If no language is selected, set to default ENGLISH */

        }


        $data = array();

        $data['lang'] = $this->session->userdata('lang');


        $data['result'] = $this->model_contents->fetchRow($page_id);


        foreach ($this->model_contents->front_end_content($data['result']->parant_id) as $val) {

            $data['pagination'][] = $val->id;

        }


        //$data['content'] = 'career_detail';

        // $this->load->view("layouts/default", $data);


        $this->load->view("layouts/header", $data);


        $this->load->view("career_detail", $data);


        $this->load->view("layouts/footer", $data);


    }


    public function applyforjob($job_id)

    {


        if (!$this->session->userdata('lang')) {

            $this->session->set_userdata(array('lang' => 'eng')); /* If no language is selected, set to default ENGLISH */

        }


        $data['page_id'] = 'career_form';

        $data['lang'] = $this->session->userdata('lang');


        $fetch_career_id = getFrontEndDataByTpl('career_form');


        $data['content'] = $fetch_career_id[0]->tpl;


        $data['job_id'] = $job_id;


        $data['contents'] = $fetch_career_id;


        $this->load->view("layouts/default", $data);


    }


    public function save_job()


    {


        $rec['res'] = $this->model_configuration->fetchRow();


        $this->form_validation->set_rules('first_name', 'First Name', 'required');

        $this->form_validation->set_rules('last_name', 'Last Name', 'required');

        $this->form_validation->set_rules('dob', 'Date of Birth', 'required');

        $this->form_validation->set_rules('gender', 'Gender', 'required');

        $this->form_validation->set_rules('countries', 'Country', 'required');

        $this->form_validation->set_rules('cities', 'City', 'required');

        $this->form_validation->set_rules('tel_phone', 'Telephone Number', 'required');


        if ($this->session->userdata('lang') == 'eng') {

            $this->form_validation->set_message('required', 'This %s field is required.');

        } else {

            $this->form_validation->set_message('required', 'هذه %s الخانة مطلوبة');

        }


        $data = array();

        $data['new_id'] = $new_id = $this->input->post('new_id');

        $data['first_name'] = $fname = $this->input->post('first_name');

        $data['last_name'] = $lname = $this->input->post('last_name');

        //$data['dob'] = $dob = $this->input->post('dob');

        $data['dob'] = $dob = $this->input->post('day') . '/' . $this->input->post('month') . '/' . $this->input->post('year');


        $data['gender'] = $gender = $this->input->post('gender');

        $data['country'] = $country = $this->input->post('countries');

        $data['city'] = $city = $this->input->post('cities');

        $data['tel_phone'] = $phone = $this->input->post('tel_phone');


        $data['cv'] = $this->uploadCv('cv');


        //$data['created_at'] = date('Y-m-d H:i:s');


        $user_id = $this->job_model->save($data);


        /*----------------------------------------------*/

        $ip = '';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

            $ip = $_SERVER['HTTP_CLIENT_IP'];

        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        } else {

            $ip = $_SERVER['REMOTE_ADDR'];

        }


        $data['ip'] = lang_base_url() . 'page/' . $_POST['page_title'] . '/' . $ip;

        $data['created_at'] = date('Y-m-d');

        $bodytext = "

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

    <td width=\"230\"><span class=\"gray_12_bold\">First Name:</span></td><td><span class=\"gray_12\">&nbsp;" . $data['first_name'] . "</span></td>

   </tr>

   <tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Last Name:</span></td><td><span class=\"gray_12\">&nbsp;" . $data['last_name'] . "</span></td>

   </tr>

   <tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Gender:</span></td><td><span class=\"gray_12\">&nbsp;" . $data['gender'] . "</span></td>

   </tr>

   <tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Date of Birth:</span></td><td><span class=\"gray_12\">&nbsp;" . $data['dob'] . "</span></td>

   </tr>   

    <tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Country:</span></td><td><span class=\"gray_12\">&nbsp; " . $data['country'] . "</span></td>

   </tr>

    <tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">City:</span></td><td><span class=\"gray_12\">&nbsp; " . $data['city'] . "</span></td>

   </tr>  

    <tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Telephone Number:</span></td><td><span class=\"gray_12\">&nbsp; " . $data['tel_phone'] . "</span></td>

   </tr>



  

  <tr>

  <td width=\"230\"><span class=\"gray_12_bold\">Email Form send from :</span>

               </td><td><span class=\"gray_12\">&nbsp; " . $data['ip'] . "</span></td>

    </tr>

    <tr>    

  <td width=\"230\"><span class=\"gray_12_bold\">Email form has been submitted on :</span>

               </td><td><span class=\"gray_12\">&nbsp; " . $data['created_at'] . "</span></td>

  </tr>

</table>

<p>&nbsp;</p>

</body>

</html>



";

        /*----------------------------------------------*/

        /*$config = Array(

        'protocol' => 'smtp',

        'smtp_host' => 'mail.nred.co',

        'smtp_port' => 25,

        'smtp_user' => 'web@nred.co',

        'smtp_pass' => 'nred_co'

        );

    $this->email->initialize($config);*/


        $this->email->set_newline("\r\n");

        $this->email->set_mailtype("html");

        $this->email->from($data['email']);

        //$this->email->from($data['email']);

        $this->email->to($rec->reachus_email); /* Admin Email */

        $this->email->subject('A New Job Application');

        $this->email->message($bodytext);

        $file_to_attach = FCPATH . 'uploads/cv/' . $filename;

        $this->email->attach($file_to_attach);

        if ($this->email->send()) {

            if ($this->session->userdata('lang') == 'eng' || $this->session->userdata('lang') == 'egypt_eng') {

                $this->session->set_flashdata('message', 'Application has been Received Successfully.');

            } else {

                $this->session->set_flashdata('message', 'لقد قمت بالتسجيل بنجاح. يمكنك تسجيل الدخول الآن');

            }


        }


        redirect(lang_base_url() . 'page/career_message/');

        //redirect('page/Job_Applicant');

    }


    public function find_position()

    {


        $data['lang'] = $this->session->userdata('lang');


        $j_type = $this->input->post('job_type');

        $c_level = $this->input->post('career_level');

        $c_location = $this->input->post('career_location');


        if ($this->input->post('job_type') && $this->input->post('career_level') && $this->input->post('career_location')) {

            $jobs = $this->job_model->fetch_jobs($j_type, $c_level, $c_location);

            $data['j_type'] = $j_type;

            $data['c_level'] = $c_level;

            $data['c_location'] = $c_location;

            $data['search_jobs'] = $jobs;

            $data['search'] = 1;

        }


        $fetch_career = getFrontEndDataByTpl('career');


        $data['content'] = $fetch_career[0]->tpl;

        $data['page_id'] = $fetch_career[0]->id;

        $data['contents'] = $fetch_career;


        $this->load->view("layouts/default", $data);


    }


    public function cities()
    {


        $lang = $this->session->userdata('lang');

        $country_code = $this->input->post('country_code');


        $cities = $this->job_model->fetchCities($country_code);


        foreach ($cities as $city) {


            $city_name = ($lang == 'eng' ? $city->name : $city->arb_name);


            ?>

            <option value="<?php echo $city->name; ?>"><?php echo $city_name; ?></option>

        <?php }


    }


    public function cities_select()
    {


        $lang = $this->session->userdata('lang');

        $country_code = $this->input->post('country_code');

        $city_select = $this->input->post('city_select');


        $cities = $this->job_model->fetchCities($country_code);

        foreach ($cities as $city) {


            $city_name = ($lang == 'eng' ? $city->name : $city->arb_name);


            ?>

            <option value="<?php echo $city->name; ?>" <?php if ($city_select == $city->id) {
                echo "selected";
            } ?>><?php echo $city_name; ?></option>

        <?php }


    }


}