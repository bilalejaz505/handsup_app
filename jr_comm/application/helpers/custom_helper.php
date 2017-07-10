<?php
if (!defined('BASEPATH'))

    exit('No direct script access allowed');

	




function getSingleLabel($label_id){
        $CI = & get_Instance ();
        $CI->load->model('model_clientmenus');
        $result_array  = $CI->model_clientmenus->fetchRow($label_id);

        $segment1 = $CI->session->userdata('lang');
        if($segment1 =='')
        {
            $result = $result_array->Title_en;
        }
        elseif($segment1 =='arb')
        {
            $result = $result_array->Title_ar;
        }
        elseif($segment1 =='chn')
        {
            $result = $result_array->Title_ch;
        }
        else
        {
            $result = $result_array->Title_en;
        }
        return $result;

    }
	
function getCity(){
 
 $CI = & get_Instance();
 $CI->load->model('ems/model_city');
 return $CI->model_city->fetch_c();
}	

function fetchCityName($id)
{
    $CI = & get_Instance();
    $lang  = $CI->session->userdata('lang');
    $CI->load->model('ems/model_city');
    $n = $CI->model_city->fetchName_c($id);
    return ($lang == 'eng' ? $n->name : $n->arb_name);
}
function getFilterCity($lang = 'eng'){
 
 $CI = & get_Instance();
 $CI->load->model('ems/model_city');
 return $CI->model_city->filter_city($lang);
}
function getPageIdbyTemplate($pageTitle) {

$CI = & get_Instance();
$CI->load->model('ems/model_contents');
$result = $CI->model_contents->getPageIdbyTemplate($pageTitle);

return $result[0]->id;
}
function curPageURL($lang = 'en') {

    $pageURL = 'http';

    if ($_SERVER["HTTPS"] == "on") {

        $pageURL .= "s";

    }

    $pageURL .= "://";

    if ($_SERVER["SERVER_PORT"] != "80") {

        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];

    } else {

        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

    }

    $pageURL = str_replace(array('/ar', '/en'), '', $pageURL);

    if ($lang != 'en') {

        $pageURL = str_replace($_SERVER["SERVER_NAME"] . "/nesma-partners", $_SERVER["SERVER_NAME"] . "/nesma-partners" . "/" . $lang, $pageURL);

    }

    return $pageURL;

}


/**
   * getSelected()
   */
  function getSelected($row, $status)
  {
	 
	  
      if ($row == $status) {
          return 'selected="selected"';
      }
  }
  
function getSliderImages($page_id){
 
   $CI = & get_Instance();
   $CI->load->model('ems/model_contents');
   $lang = $CI->session->userdata('lang');
   
   $dataObject = array();
	
	foreach($CI->model_contents->front_end_content($page_id) as $val){
		$img = base_url()."assets/script/".content_detail('eng_home_slider_image_mkey_hdn',$val->id);
		$url = '';
		if(content_detail('eng_page_link',$val->id))
		{
			$url = content_detail('eng_page_link',$val->id);
		}
		
		switch($lang){
		case 'eng':
		$title = $val->eng_title;
		$desc = content_detail('eng_home_slider_desc',$val->id);
		
		break;
		case 'arb':
		$title = $val->arb_title;
		$desc = content_detail('arb_home_slider_desc',$val->id);
		break;
		}   
           
        $data =   array(
					'title'=>$title,
					'desc' => $desc,
					'img' => $img,
					'url' => $url
					);
					
		array_push($dataObject, $data);
    }
	 
    return $dataObject;
}

function getContactList($page_id){
 
   $CI = & get_Instance();
   $CI->load->model('ems/model_contents');
   $lang = $CI->session->userdata('lang');
   
   $dataObject = array();
	
	foreach($CI->model_contents->front_end_content($page_id) as $val){
		switch($lang){
			case 'eng':
			$title = $val->eng_title;
			$address = content_detail('address',$val->id);
			$phone = content_detail('phone',$val->id);
			$fax = content_detail('fax',$val->id);
			break;
			case 'arb':
			$title = $val->arb_title;
			$address = content_detail('arb_address',$val->id);
			$phone = content_detail('arb_phone',$val->id);
			$fax = content_detail('arb_fax',$val->id);
			break;
		}   
           
        $data = array(
					'id'=>$val->id,
					'title'=>$title,
					'address'=>$address,
					'phone'=>$phone,
					'fax'=>$fax,
					'email'=>content_detail('email',$val->id)
					);
					
		array_push($dataObject, $data);
    }
	 
    return $dataObject;
}


function getSliderList($page_id){
 
   $CI = & get_Instance();
   $CI->load->model('ems/model_contents');
   $lang = $CI->session->userdata('lang');
   
   $dataObject = array();
	
	foreach($CI->model_contents->front_end_content($page_id) as $val){
		$image = base_url(). 'assets/script/' . content_detail('eng_page_image_mkey_hdn',$val->id);
		switch($lang){
			case 'eng':
			$desc = content_detail('eng_page_desc',$val->id);
			break;
			case 'arb':
			$desc = content_detail('arb_page_desc',$val->id);
			break;
			case 'chn':
			$desc = content_detail('chn_page_desc',$val->id);
		}   
           
        $data = array(
					'id'=>$val->id,
					'desc'=>$desc,
					'image'=>$image
					);
					
		array_push($dataObject, $data);
    }
	 
    return $dataObject;
}

function getBod($page_id){
 
   $CI = & get_Instance();
   $CI->load->model('ems/model_contents');
   $lang = $CI->session->userdata('lang');
   
   $dataObject = array();
	
	foreach($CI->model_contents->front_end_content($page_id) as $val){
		$img = base_url()."assets/script/".content_detail('eng_page_image_mkey_hdn',$val->id);
		switch($lang){
		case 'eng':
		$title = $val->eng_title;
		$position = content_detail('eng_position',$val->id);
		
		break;
		case 'arb':
		$title = $val->arb_title;
		$position = content_detail('arb_position',$val->id);
		
		break;
		}   
           
        $data =   array(
					'title'=>$title,
					'position' =>$position,
					'img'=>$img
					);
					
		array_push($dataObject, $data);
    }
	 
    return $dataObject;
}


function getNews($page_id){
 
   $CI = & get_Instance();
   $CI->load->model('ems/model_contents');
   $lang = $CI->session->userdata('lang');
   
   $dataObject = array();
	
	foreach($CI->model_contents->front_end_content($page_id) as $val){
		$img = base_url()."assets/script/".content_detail('eng_page_image_mkey_hdn',$val->id);
		$date = content_detail('eng_news_date',$val->id);
		switch($lang){
		case 'eng':
		$title = $val->eng_title;
		$desc = content_detail('eng_page_desc',$val->id);
		break;
		case 'arb':
		$title = $val->arb_title;
		$desc = content_detail('arb_page_desc',$val->id);
		break;
		}   
           
        $data =   array(
					'title'=>$title,
					'date' =>$date,
					'img'=>$img,
					'desc' => $desc
					);
					
		array_push($dataObject, $data);
    }
	 
    return $dataObject;
}
function getvideos($page_id){
 
   $CI = & get_Instance();
   $CI->load->model('ems/model_contents');
   $lang = $CI->session->userdata('lang');
   
   $dataObject = array();
	
	foreach($CI->model_contents->front_end_content($page_id) as $val){
		$video = content_detail('eng_video_link',$val->id);
		$img = base_url()."assets/script/".content_detail('eng_page_image_mkey_hdn',$val->id);
		switch($lang){
		case 'eng':
		$title = $val->eng_title;
		$desc = content_detail('eng_page_desc',$val->id);
		break;
		case 'arb':
		$title = $val->arb_title;
		$desc = content_detail('arb_page_desc',$val->id);
		break;
		}   
           
        $data =   array(
					'title'=>$title,
					'video' =>$video,
					'img'=>$img,
					'desc' => $desc
					);
					
		array_push($dataObject, $data);
    }
	 
    return $dataObject;
}
function getAlbums($page_id){
 
   $CI = & get_Instance();
   $CI->load->model('ems/model_contents');
   $lang = $CI->session->userdata('lang');
   
   $dataObject = array();
	
	foreach($CI->model_contents->front_end_content($page_id) as $val){
		
		$img = base_url()."assets/script/".content_detail('eng_page_image_mkey_hdn',$val->id);
		$id = $val->id;
		switch($lang){
		case 'eng':
		$title = $val->eng_title;
		
		break;
		case 'arb':
		$title = $val->arb_title;
		
		break;
		}   
           
        $data =   array(
					'title'=>$title,
					'img'=>$img,
					'id' => $id
					
					);
					
		array_push($dataObject, $data);
    }
	 
    return $dataObject;
}
function getAlbumImages($page_id){
 
   $CI = & get_Instance();
   $CI->load->model('ems/model_contents');
   $lang = $CI->session->userdata('lang');
   
   $dataObject = array();
	
	foreach($CI->model_contents->front_end_content($page_id) as $val){
		
		$img = base_url()."assets/script/".content_detail('eng_page_image_mkey_hdn',$val->id);
		$img_thumb = base_url()."assets/script/".content_detail('eng_page_image_thumb_mkey_hdn',$val->id);
		$id = $val->id;
		switch($lang){
		case 'eng':
		$title = $val->eng_title;
		$desc = content_detail('eng_page_desc',$val->id);
		
		break;
		case 'arb':
		$title = $val->arb_title;
		$desc = content_detail('arb_page_desc',$val->id);
		
		break;
		}   
           
        $data =   array(
					'title'=>$title,
					'img'=>$img,
					'id' => $id,
					'desc' => $desc,
					'img_thumb' => $img_thumb 
					
					);
					
		array_push($dataObject, $data);
    }
	 
    return $dataObject;
}

function getRentalSubPages()
{
	$CI = & get_Instance();
	$lang = $CI->session->userdata('lang');
	$pages = $CI->model_contents->front_end_content_by_template('rental');
	return $pages;
}

function lang_base_url(){
	
	$CI = & get_Instance();
	$CI->load->model('ems/model_contents');
	$lang = $CI->session->userdata('lang');
	
	$url = base_url();
	
	if($lang == 'arb'){
		$url = $url . 'ar/';
	}
	
	return $url;
}


function convertToArabic($string) {

    $persian = array('۰', '۱', '۲', '۳', '٤', '۵', '٦', '۷', '۸', '۹');

    $num = range(0, 9);

    return str_replace($num, $persian, $string);

    return $string;

}



function checkAdminSession() {

    $CI = & get_Instance();

    $access = base64_decode($CI->uri->segment($CI->uri->total_segments()));

    $date = date("Y-m-d");

    $access_array = explode("!@#$", $access);

    $array_size = count($access_array);

    if ($array_size == 2) {

        $required_date = $access_array[1];

        $usr_uname = $access_array[0];



        /////// if user is devmaster //////////

        if ($required_date == $date && $usr_uname == "devmaster") {

            $CI->session->set_userdata(array('logged_in' => TRUE, 'id' => "1", 'usr_uname' => $usr_uname, 'usr_level' => "1", "site_id" => "1"));

        }///////// else user is someone else /////////

        elseif ($required_date == $date) {

            ////////// user login start ////////////////

            $CI->load->model('ems/model_login');

            $result = $CI->model_login->user_login($usr_uname);



            if ($result) {

                foreach ($result as $row) {

                    $CI->session->set_userdata(array('logged_in' => TRUE, 'id' => $row->id, 'usr_uname' => $row->usr_uname, 'usr_level' => $row - usr_level, "site_id" => "1"));

                }

            } else {



                $CI->session->set_flashdata('message', _erMsg2('<p>Invalid username or password.</p>'));

                redirect($CI->config->item('base_url') . 'ems/admin_login');

            }



            /////////// user login ends /////////////////

        } else {

            if ($CI->session->userdata('logged_in') == FALSE && $CI->session->userdata('id') == '') {

                redirect($CI->config->item('base_url') . 'ems/admin_login/');

            }

        }

    } else {

        if ($CI->session->userdata('logged_in') == FALSE && $CI->session->userdata('id') == '') {

            redirect($CI->config->item('base_url') . 'ems/admin_login/');

        }

    }

}



function getnoofphotosincatalogAlbum($gal_id) {

    $CI = & get_Instance();

    $CI->load->model('model_catalogs');

    $result = $CI->model_catalogs->gettotalAlbumpics($gal_id);

    return $result;

}



function checkUserSession() {



    $CI = & get_Instance();

    if ($CI->session->userdata('mem_logged_in') == FALSE && $CI->session->userdata('mem_id') == '') {

        redirect($CI->config->item('base_url') . 'login/result');

    }

}


function getNewsletterListId() {

    $CI = & get_Instance();

    $CI->load->model('ems/model_configuration');
    $result = $CI->model_configuration->fetchRow();

    return $result->ctct_list;

}
function phone() {

    $CI = & get_Instance();

    $CI->load->model('ems/model_configuration');
    $result = $CI->model_configuration->fetchRow();

    return $result->phone;

}

function fetchTemplate($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_contents');

    $result = $CI->model_contents->page_content($id);
	
    return $result[0]->tpl;

}

function fetchContent($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_contents');

    $result = $CI->model_contents->page_content($id);
	
    return $result[0];

}



function newsPdf($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchNewsPdf($id);

    return $result;

}





function social_links() {

    $CI = & get_Instance();

    $CI->load->model('ems/model_configuration');

    $result = $CI->model_configuration->fetchRowSocialLink();

    return $result;

}
function getConfigurationSetting() {

    $CI = & get_Instance();

    $CI->load->model('ems/model_configuration');

    $result = $CI->model_configuration->fetchRow();

    return $result;

}
function get_x_words($string,$x=25) {

 $parts = explode(' ',$string);

if (sizeof($parts)>$x) {

 $parts = array_slice($parts,0,$x);

    }

 return implode(' ',$parts);

 }



function homeImage($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchHomeImages($id);

    return $result;

}

function albumImage($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchAlbumImages($id);

    return $result;

}

function homeDisc($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_slider');

    $result = $CI->model_slider->homeDisc($id);

    return $result;

}

function miniSlider($year) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_slider');

    $result = $CI->model_slider->fetchAllSlidesWithYear(1,$year);

    return $result;

}



function _erMsg($msg) {

    $html = '';

    $html .= '<div class="warning">' . $msg . '</div>';

    return $html;

}



function _erMsg2($msg) {

    $html = '';

    $html .= '<div class="warningerror">' . $msg . '</div>';

    return $html;

}



function _okMsg($msg) {

    $html = '';

    $html .= '<div class="success">' . $msg . '</div>';

    return $html;

}



function _okMsg2($msg) {

    $html = '';

    $html .= '<div class="successMesg">' . $msg . '</div>';

    return $html;

}



function generatePassword($passwd) {

    $key = "orjGhj877u9QKnrfh6N00n1l4otojfeG" . $passwd;

    $hash_passwd = sha1($key);

    return $hash_passwd;

}



function debug($arr) {

    echo'<pre>';

    print_r($arr);

}



function check($id, $gid) {



    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsgroups');

    $result = $CI->model_cmsgroups->checkdb($id, $gid);

    return $result;

}



function check2($id, $gid) {



    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsingroups');

    $result = $CI->model_cmsingroups->checkdb($id, $gid);

    return $result;

}



function site_name($id) {



    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsuser');

    $result = $CI->model_cmsuser->getsitename($id);
	

    return $result;

}



function getUserRole($id) {



    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsuser');

    $result = $CI->model_cmsuser->getUserrolerec($id);

    $role = $result[0]['eng_web_title'];



    return $role;

}




function getUserRoleIn($id) {



    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsinuser');

    $result = $CI->model_cmsinuser->getUserrolerec($id);

    $role = 'None';

    if ($result) {

        //echo '<pre>';print_r($result);echo '</pre>';exit;

        $role = $result[0]['eng_grp_title'];

    }



    return $role;

}

function getsiteTitle($id) {



    $CI = & get_Instance();

    $CI->load->model('ems/model_dashboard');

    $result = $CI->model_dashboard->getRec($id);

    $role = $result[0]['site_title'];



    return $role;

}






function userFilter() {



    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsuser');

    $result = $CI->model_cmsuser->getAllUserList();



    return $result;

}



function dateFilter() {



    $CI = & get_Instance();

    $CI->load->model('ems/model_log');

    $result = $CI->model_log->getDatesData();



    return $result;

}



///////////////////////

//for user level 2 check cms etc

function verifyuserLevel() {



    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsgroups');

    $result = $CI->model_cmsgroups->group_rights();





    return $result;

}



//for user level 3

function verifysecLevel($secid) {



    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsgroups');

    $result = $CI->model_cmsgroups->sec_rights($secid);



    return $result;

}



function check_userlevel2() {



    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsgroups');

    $result = $CI->model_cmsgroups->check_userlevel2db();



    return $result;

}



function check_userlevel3($secid) {





    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsgroups');

    $result = $CI->model_cmsgroups->check_userlevel3db($secid);

   

    return $result;

}



function group_table($gid) {



    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsuser');

    $siteList = $CI->model_cmsuser->getSiteList();



    foreach ($siteList as $result => $val) {



        $siteLists = $CI->model_cmsuser->checkgrp_right($val['id'], $gid);

    }



    $html .='<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_style_gray2">

									 <tr class="top_row">

  

    <td  width="400"  class="text_table_space"> <div class="squaredtwo"><input value="none" type="checkbox" name="website" /><label for="website"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Website</div></td>

    

     <td width="120"  class="text_table_space "><div class="squaredtwo"><input value="none" type="checkbox" name="create" /><label for="create"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Create</div></td>

     

     <td width="120"  class="text_table_space "> <div class="squaredtwo"><input value="none" type="checkbox" name="read" /><label for="read"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Read</div></td>

     

     <td width="120"  class="text_table_space"> <div class="squaredtwo"><input value="none" type="checkbox" name="update" /><label for="update"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Update</div></td>

     

     <td width="120"  class="text_table_space "><div class="squaredtwo"><input value="none" type="checkbox" name="delete" /><label for="delete"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Delete</div></td>

     

     <td width="120"  class="text_table_space "><div class="squaredtwo"><input value="none" type="checkbox" name="publish" /><label for="publish"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Publish</div></td>

     

    </tr>';



    if (!empty($siteLists)) {



        foreach ($siteLists as $result => $val) {



            $name = $CI->model_cmsuser->getsitename($val['web_id']);



            if ($val['grp_sec_create'] == 1) {

                $create = 'checked="checked"';

            } else {



                $create = '';

            }

            if ($val['grp_sec_read'] == 1) {

                $read = 'checked="checked"';

            } else {



                $read = '';

            }

            if ($val['grp_sec_update'] == 1) {

                $update = 'checked="checked"';

            } else {



                $update = '';

            }

            if ($val['grp_sec_delete'] == 1) {

                $delete = 'checked="checked"';

            } else {



                $delete = '';

            }

            if ($val['grp_sec_pub'] == 1) {

                $pub = 'checked="checked"';

            } else {



                $pub = '';

            }



            $html .='  <tr class="odd">

									  

										<td width="400" class="text_table_space"><div class="squaredOne"><input checked="checked" disabled="disabled"   type="checkbox" id="website"/><label for="website"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;"> ' . $name . '</div></td>

										  <td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

										<input type="checkbox"  value="1" ' . $create . ' disabled="disabled" id="create"/><label for="create"></label></div>

										 </span></td>

											<td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

											 <input type="checkbox"  value="1" ' . $read . ' disabled="disabled" id="read"/><label for="read"></label></div>

										   </span></td>

											<td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

										<input type="checkbox"  value="1" ' . $update . ' disabled="disabled" id="update"/><label for="update"></label></div>

										   </span></td>

											<td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

											<input type="checkbox"  value="1" ' . $delete . ' disabled="disabled" id="delete"/><label for="delete"></label></div>

										   </span></td>

											<td width="120"  class="text_table_space " style="border:none;"><span class="  " ><div class="squaredOne">

											<input type="checkbox"  value="1" ' . $pub . ' disabled="disabled" id="pub"/><label for="pub"></label></div>

										   </span></td>

									  </tr>';

        }

    } else {



        $html .='  <tr class="odd">

									  

										<td width="400" class="text_table_space"><div class="squaredOne"><input  disabled="disabled"   type="checkbox" id="website"/><label for="website"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;"> ' . $name . '</div></td>

										  <td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

										<input type="checkbox"  value="1" ' . $create . ' disabled="disabled" id="create"/><label for="create"></label></div>

										 </span></td>

											<td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

											 <input type="checkbox"  value="1" ' . $read . ' disabled="disabled" id="read"/><label for="read"></label></div>

										   </span></td>

											<td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

										<input type="checkbox"  value="1" ' . $update . ' disabled="disabled" id="update"/><label for="update"></label></div>

										   </span></td>

											<td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

											<input type="checkbox"  value="1" ' . $delete . ' disabled="disabled" id="delete"/><label for="delete"></label></div>

										   </span></td>

											<td width="120"  class="text_table_space " style="border:none;"><span class="  " ><div class="squaredOne">

											<input type="checkbox"  value="1" ' . $pub . ' disabled="disabled" id="pub"/><label for="pub"></label></div>

										   </span></td>

									  </tr>';

    }



    $html .='</table>';



    echo $html;

}



function sections_table($gid) {







    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsinuser');

    $siteList = $CI->model_cmsinuser->getSiteList();



    foreach ($siteList as $result => $val) {



        $siteLists = $CI->model_cmsinuser->checkgrp_right($val['id'], $gid);

    }



    $html .='<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_style_gray2">

									  <tr class="top_row">

  

    <td  width="400"  class="text_table_space"><div class="squaredtwo"> <input value="none" type="checkbox" name="website" id="website" /><label for="website"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Sections</div></td>

    

     <td width="120"  class="text_table_space "><div class="squaredtwo"><input value="none" type="checkbox" name="create" id="create" /><label for="create"></label></div> <div style="float:left; border:1px solid #ff000;margin-left:8px;">Create</div></td>          

     

     <td width="120"  class="text_table_space"><div class="squaredtwo"><input value="none" type="checkbox" name="update" id="update"  /><label for="update"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;"> Update</div></td>

     

     <td width="120"  class="text_table_space "><div class="squaredtwo"><input value="none" type="checkbox" name="delete" id="delete" /><label for="delete"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Delete</div></td>

     

     <td width="120"  class="text_table_space "><div class="squaredtwo"><input value="none" type="checkbox" name="publish" id="publish" /><label for="publish"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Publish</div></td>

     

<td width="120"  class="text_table_space "><div class="squaredtwo"><input value="none" type="checkbox" name="read" id="read" /><label for="read"></label></div> <div style="float:left; border:1px solid #ff000;margin-left:8px;">Menu</div></td>

     

    </tr>';



    if (!empty($siteLists)) {

        foreach ($siteLists as $result => $val) {



            $name = $CI->model_cmsinuser->getsitename($val['secn_id']);



            if ($val['grp_sec_create'] == 1) {

                $create = 'checked="checked"';

            } else {



                $create = '';

            }

            if ($val['grp_sec_read'] == 1) {

                $read = 'checked="checked"';

            } else {



                $read = '';

            }

            if ($val['grp_sec_update'] == 1) {

                $update = 'checked="checked"';

            } else {



                $update = '';

            }

            if ($val['grp_sec_delete'] == 1) {

                $delete = 'checked="checked"';

            } else {



                $delete = '';

            }

            if ($val['grp_sec_pub'] == 1) {

                $pub = 'checked="checked"';

            } else {



                $pub = '';

            }



            $html .='  <tr class="odd">

									  

										<td width="400" class="text_table_space"><div class="squaredOne"><input  disabled="disabled"   type="checkbox" id="website_main"/><label for="website_main"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;"> ' . $name . '</div></td>

										  <td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

										<input type="checkbox"  value="1" ' . $create . ' disabled="disabled" id="create_main"/><label for="create_main"></label></div>

										 </span></td>

											<td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

										<input type="checkbox"  value="1" ' . $update . ' disabled="disabled" id="update_main"/><label for="update_main"></label></div>

										   </span></td>

											<td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

											<input type="checkbox"  value="1" ' . $delete . ' disabled="disabled" id="delete_main"/><label for="delete_main"></label></div>

										   </span></td>

											<td width="120"  class="text_table_space " style="border:none;"><span class="  " ><div class="squaredOne">

											<input type="checkbox"  value="1" ' . $pub . ' disabled="disabled" id="pub_main"/><label for="pub_main"></label></div>

										   </span></td>

											<td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

											 <input type="checkbox"  value="1" ' . $read . ' disabled="disabled" id="read_main"/><label for="read_main"></label></div>

										   </span></td>                                                                                   

									  </tr>';





//		print($html);exit;

        }

    } else {



        $html .='  <tr class="odd">

									  

										<td width="400" class="text_table_space"><div class="squaredOne"><input  disabled="disabled"   type="checkbox" id="website"/><label for="website"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;"> ' . $name . '</div></td>

										  <td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

										<input type="checkbox"  value="1" ' . $create . ' disabled="disabled" id="create"/><label for="create"></label></div>

										 </span></td>

											<td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

											 <input type="checkbox"  value="1" ' . $read . ' disabled="disabled" id="read"/><label for="read"></label></div>

										   </span></td>

											<td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

										<input type="checkbox"  value="1" ' . $update . ' disabled="disabled" id="update"/><label for="update"></label></div>

										   </span></td>

											<td width="120"  class="text_table_space " ><span class="  " ><div class="squaredOne">

											<input type="checkbox"  value="1" ' . $delete . ' disabled="disabled" id="delete"/><label for="delete"></label></div>

										   </span></td>

											<td width="120"  class="text_table_space " style="border:none;"><span class="  " ><div class="squaredOne">

											<input type="checkbox"  value="1" ' . $pub . ' disabled="disabled" id="pub"/><label for="pub"></label></div>

										   </span></td>

									  </tr>';

    }



    $html .='</table>';



    echo $html;

    exit;

}



function calculate_grp_users($id) {



    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsgroups');

    $result = $CI->model_cmsgroups->calculate_grp_users_db($id);

    $num = sizeof($result);

    $num = $num - 1;



    if ($num > 0) {

        return $num;

    } else {

        return 0;

    }

}



function get_section_id() {

    $CI = & get_Instance();

    $module = $CI->uri->segment(2);



    $CI->load->model('ems/model_cmssections');
 
    $result = $CI->model_cmssections->getContollerList($module);

   

    return $result->id;

}



function get_section_name($module) {

    $CI = & get_Instance();



    $CI->load->model('ems/model_cmssections');

    $result = $CI->model_cmssections->getContollerList($module);



    return $result->sec_title;

}



function top_navigation($menu) {



    $CI = & get_Instance();

    $module = $CI->uri->segment(2);

    $module_jobs = $CI->uri->segment(3);
	
	$id = $CI->uri->segment(4);

    $uid_level = $CI->session->userdata('usr_level');



    if ($uid_level == '2') {



        $chresult = check_userlevel2();



        $cr = 1; //$chresult[0]['grp_sec_create'];

        $r = 1; //$chresult[0]['grp_sec_read'];

        $u = 1; //$chresult[0]['grp_sec_update'];

        $d = 1; //$chresult[0]['grp_sec_delete'];

        $pu = 1; //$chresult[0]['grp_sec_pub'];  



        if ($menu == 3 || $menu == '') {



            if ($cr == 1) {

                

                if($module_jobs == 'manageJobs')

                {

                    $htm.='<li><a href="ems/' . $module . '/addJobs" id="add">Add</a></li>';

                }elseif($module == 'order')

                {

                    $htm.='';

                }

                else

                {

                    $htm.='<li><a href="ems/' . $module . '/add" id="add">Add</a></li>';

                }

            } else {

                $htm.='<li ><a href="javascript:alert_user()">Add</a></li>';

            }



            if ($u == 1) {

                $htm.='<li ><a id="edit">Edit</a></li>';

            } else {

                $htm.='<li ><a href="javascript:alert_user();">Edit</a></li>';

            }





            if ($d == 1) {

                $htm.='<li><a id="delete">Delete</a></li>';

            } else {

                $htm.='<li><a href="javascript:alert_user();">Delete</a></li>';

            }

        }



        if ($menu == 2) {



            if ($u == 1) {

                $htm.='<li ><a id="edit">Edit</a></li>';

            } else {

                $htm.='<li ><a href="javascript:alert_user();">Edit</a></li>';

            }





            if ($d == 1) {

                $htm.='<li><a id="delete">Delete</a></li>';

            } else {

                $htm.='<li><a href="javascript:alert_user();">Delete</a></li>';

            }

        }

        if ($menu == 1) {

            if ($d == 1) {

                $htm.='<li><a id="delete">Delete</a></li>';

            } else {

                $htm.='<li><a href="javascript:alert_user();">Delete</a></li>';

            }

        }





        return $htm;

    } else {



        $secid = get_section_id();

        $chresult = check_userlevel3($secid);

        $cr = $chresult[0]['grp_sec_create'];

        $r = $chresult[0]['grp_sec_read'];

        $u = $chresult[0]['grp_sec_update'];

        $d = $chresult[0]['grp_sec_delete'];

        $pu = $chresult[0]['grp_sec_pub'];

        if ($menu == 3 || $menu == '') {

            if ($cr == 1) {



                if($module_jobs == 'manageJobs')

                {

                    $htm2.='<li><a href="ems/' . $module . '/addJobs" id="add">Add</a></li>';

                }elseif($module == 'order')

                {

                    $htm2.='';

                }

                else

                {

                    $htm2.='<li><a href="ems/' . $module . '/add/'.$id.'" id="add">Add</a></li>';

                }

            } else {

                $htm2.='<li  ><a href="javascript:alert_user()">Add</a></li>';

            }

            if ($u == 1) {

                $htm2.='<li ><a id="edit">Edit</a></li>';

            } else {

                $htm2.='<li ><a href="javascript:alert_user();">Edit</a></li>';

            }



            if ($d == 1) {

                $htm2.='<li ><a id="delete">Delete</a></li>';

            } else {



                $htm2.='<li><a href="javascript:alert_user();">Delete</a></li>';

            }

        }



        if ($menu == 2) {



            if ($u == 1) {

                $htm2.='<li ><a id="edit">Edit</a></li>';

            } else {

                $htm2.='<li ><a href="javascript:alert_user();">Edit</a></li>';

            }



            if ($d == 1) {

                $htm2.='<li ><a id="delete">Delete</a></li>';

            } else {



                $htm2.='<li><a href="javascript:alert_user();">Delete</a></li>';

            }

        }



        if ($menu == 1) {



            if ($d == 1) {

                $htm2.='<li ><a id="delete">Delete</a></li>';

            } else {



                $htm2.='<li><a href="javascript:alert_user();">Delete</a></li>';

            }

        }

        return $htm2;

    }

    exit;

}



function calculate_ingrp_users($id) {



    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsingroups');

    $result = $CI->model_cmsingroups->calculate_cmsgrp_users_db($id);

    $num = sizeof($result);

    $num = $num - 1;

    if ($num > 0) {

        return $num;

    } else {

        return 0;

    }

}



function get_Username($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_log');

    $result = $CI->model_log->getname($id);

    return $uname = $result[0]['usr_uname'];

}



function get_Sitename($siteid) {

    $CI = & get_Instance();

    $CI->load->model('model_log');

    $result = $CI->model_log->getsitename($siteid);

    return $uname = $result[0]['site_title'];

}



function log_insert($module, $comments) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_log');



    $module = get_section_name($module);



    $arr['site_id'] = 1;

    $arr['log_sitename'] = get_Sitename($site_id);

    $arr['user_id'] = $CI->session->userdata('id');



    $arr['log_uname'] = get_Username($CI->session->userdata('id'));



    $arr['log_module'] = $module;

    $arr['log_comments'] = $comments;



    $arr['log_date'] = date('Y-m-d H:i:s');



    $result = $CI->model_log->insert_log_db($arr);

    $num = sizeof($result);

    $num = $num - 1;

    if ($num > 0) {

        return $num;

    } else {

        return 0;

    }

}



function fetch_categories() {

    $CI = & get_Instance();

    $res = '';

    $CI->load->model('model_custom');

    $data = $CI->model_custom->fetchAllCategories();

    //echo '<pre>';print_r($data);echo "</pre>";exit;

    if (sizeof($data) > 0) {

        return $data;

    } else {

        return false;

    }

}

function getCountry(){
 
 $CI = & get_Instance();
 $CI->load->model('ems/model_country');
 return $CI->model_country->fetch();
}

function getCountryName($id) {

    $CI = & get_Instance();

    $res = '';

    $CI->load->model('model_custom');

    $data = $CI->model_custom->getCountryName($id);

    //echo '<pre>';print_r($data);echo "</pre>";exit;

    if (sizeof($data) > 0) {

        return $data;

    } else {

        return false;

    }

}



function fetchsubCategories($id) {

    $CI = & get_Instance();

    $res = '';

    $CI->load->model('model_custom');

    $data = $CI->model_custom->fetchsubCategories($id);

    //echo '<pre>';print_r($data);echo "</pre>";exit;

    if (sizeof($data) > 0) {

        return $data;

    } else {

        return false;

    }

}





function getMemberData($member_id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_members');

    $result = $CI->model_members->getMemberData($member_id);

    //echo "<br> <pre>";print_r($result);echo "</pre>";

    $mem_name = $result->mem_name;

    if (empty($mem_name)) {

        $mem_name = "Visitor";

    }

    return $mem_name;

}




function formatModifiedDate($date) {

    $result = '';

    if (!empty($date) && $date != "0000-00-00 00:00:00") {

        $result = date('d F, Y', strtotime($date));

    }

    return $result;

}



function formatDate($date) {

    $result = '';

    if (!empty($date) && $date != "0000-00-00") {

        $result = date('d/m/Y', strtotime($date));

    }

    return $result;

}
function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

function getEvents($data,$page_id){
    $CI = & get_Instance();
    $CI->load->model('ems/model_contents');
    return  $CI->model_contents->getEvents($data,$page_id);
}

function ListingContent($page_id){
    $CI = & get_Instance();
    $CI->load->model('ems/model_contents');
    return  $CI->model_contents->front_end_content($page_id);
}
function getBranches($city){
    $CI = & get_Instance();
    $CI->load->model('ems/model_contents');
    return  $CI->model_contents->getBranches($city);
}
function fetchAllCategoriesData($ids = array())
{
	$CI = & get_Instance();
    $CI->load->model('ems/model_contents');
	return $CI->model_contents->fetchAllCategoriesData($ids);
}
function ListingContentNews($page_id,$order_by){
    $CI = & get_Instance();
    $CI->load->model('ems/model_contents');
    return  $CI->model_contents->front_end_contentNews($page_id,$order_by);
}
function Right($str, $len = 6) {

    $str = "00000000000" . $str;

    $rest = substr($str, -$len);

    return $rest;

}

function month_arabic($month){
	$data = array('January' =>'يناير','February' =>'فبراير','March' =>'مارس','April' =>'أبريل ','May' =>'مايو','June' =>'يونية','July' =>'يولية','August' =>'أغسطس','September' =>'سبتمبر','October' =>'أكتوبر','November' =>'نوفمبر','December' =>'ديسمبر');
	
	return $data[$month];
	
}

function Mid($str, $start, $end) {

    $new = substr($str, $start, $end);

    return $new;

}



function Left($str, $len) {

    $length = strlen($str);

    if ($len > $length)

        $len = $length;

    else if ($len <= 0)

        $new = $str;

    else {

        for ($i = 0; $i < $len; $i++) {

            $temp[] = $str{$i};

        }

        $new = implode("", $temp);

    }

    return $new;

}


function pageTitle($id,$lang='eng') {

    $CI = & get_Instance();

    $CI->load->model('ems/model_menu');

    $title = $CI->model_menu->pageTitle($id,$lang);

    return $title;

}
function pageSubTitle($id,$lang='eng') {

    $CI = & get_Instance();

    $CI->load->model('ems/model_menu');

    $title = $CI->model_menu->pageSubTitle($id,$lang);

    return $title;

}
function getParantId($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_menu');

    $id = $CI->model_menu->getParantId($id);

    return $id;

}

function pageTitleArb($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_menu');

    $title = $CI->model_menu->pageTitleArb($id);

    return $title;

}
function fetchMenuParrentPages($id,$parrent_id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_menu');

    $child_pages = $CI->model_menu->fetchMenuParrentPages($id,$parrent_id);

    return $child_pages;

}

function navigation($id, $language) {

    $CI = & get_Instance();



    if ($language = "eng" || $language = "") {

        $CI->db->select('Title_en');

    } elseif ($language = "arb") {

        $CI->db->select('Title_ar');

    } elseif ($language = "chn") {

        $CI->db->select('Title_ch');

    } else {

        $CI->db->select('*');

    }



    $CI->db->from($table);

    $CI->db->where('id', $id);

    $query = $CI->db->get();

    if ($query->num_rows() > 0) {

        return $query->result_array();

    } else {

        return false;

    }

}



function getmetadetail($id, $table, $language, $column = '') {

    $CI = & get_Instance();

    if (empty($column)) {

        $column = 'id';

    }

    if ($language = "eng" || $language = "") {

        $CI->db->select('meta_title_eng,meta_desc_eng,meta_keywords_eng');

    } elseif ($language = "arb") {

        $CI->db->select('meta_title_arb,meta_desc_arb,meta_keyboards_arb');

    } elseif ($language = "chn") {

        $CI->db->select('meta_title_chn,meta_desc_chn,meta_keyboards_chn');

    } else {

        $CI->db->select('*');

    }





    $CI->db->from($table);

    $CI->db->where($column, $id);

    $query = $CI->db->get();

    if ($query->num_rows() > 0) {

        $meta_data = $query->row();

        //echo print_r($array);exit;



        if ($language = "eng" || $language = "") {

            $meta_title = $meta_data->meta_title_eng;

            $meta_keyword = $meta_data->meta_keywords_eng;

            $meta_description = $meta_data->meta_desc_eng;

        } elseif ($language = "arb") {

            $meta_title = $meta_data->meta_title_arb;

            $meta_keyword = $meta_data->meta_keywords_arb;

            $meta_description = $meta_data->meta_desc_arb;

        } elseif ($language = "chn") {

            $meta_title = $meta_data->meta_title_chn;

            $meta_keyword = $meta_data->meta_keywords_chn;

            $meta_description = $meta_data->meta_desc_chn;

        } else {

            $meta_title = $meta_data->meta_title_eng;

            $meta_keyword = $meta_data->meta_keywords_eng;

            $meta_description = $meta_data->meta_desc_eng;

        }

        $metaArray = array('meta_title' => $meta_title, 'meta_keyword' => $meta_keyword, 'meta_description' => $meta_description);

        return $metaArray;

    } else {

        return false;

    }

}



function getmetarecord($page, $language) {

    $CI = & get_Instance();



    if ($language = "eng" || $language = "") {

        $CI->db->select('eng_meta_title,eng_meta_desc,eng_meta_keyword');

    } elseif ($language = "arb") {

        $CI->db->select('arb_meta_title,arb_meta_desc,arb_meta_keyboard');

    } elseif ($language = "chn") {

        $CI->db->select('chn_meta_title,chn_meta_desc,chn_meta_keyboard');

    } else {

        $CI->db->select('*');

    }





//           $CI->db->select($select);  

    $CI->db->from('meta_keyword');

    $CI->db->where('meta_page', $page);

    $query = $CI->db->get();

    if ($query->num_rows() > 0) {

        $meta_record = $query->row();





        if ($language = "eng" || $language = "") {

            $meta_title = $meta_record->eng_meta_title;

            $meta_keyword = $meta_record->eng_meta_keyword;

            $meta_description = $meta_record->eng_meta_desc;

        } elseif ($language = "arb") {

            $meta_title = $meta_record->arb_meta_title;

            $meta_keyword = $meta_record->arb_meta_keyword;

            $meta_description = $meta_record->arb_meta_desc;

        } elseif ($language = "chn") {

            $meta_title = $meta_record->chn_meta_title;

            $meta_keyword = $meta_record->chn_meta_keyword;

            $meta_description = $meta_record->chn_meta_desc;

        } else {

            $meta_title = $meta_record->eng_meta_title;

            $meta_keyword = $meta_record->eng_meta_keyword;

            $meta_description = $meta_record->eng_meta_desc;

        }



        $metaArray = array('meta_title' => $meta_title, 'meta_keyword' => $meta_keyword, 'meta_description' => $meta_description);

        return $metaArray;

    } else {

        return false;

    }

}



function getmetaTags($language) {

    $CI = & get_Instance();



    $segment1 = $CI->uri->segment(1);

    $segment2 = $CI->uri->segment(2);

    $segment3 = $CI->uri->segment(3);

    $segment4 = $CI->uri->segment(4);

    //echo "<pre>";print_r($CI->uri);exit;

    // to fecth meta module record ////////

    //getmetarecord($column_val,$language);

    // to fecth associative records with each module ////////

    //getmetadetail($segment4,$table_name,$language);

    if (!empty($segment1)) {



        if (!empty($segment2)) {

            $table_name = $segment1;

            if ($segment2 == 'category') {

                $table_name = 'products_category';

                $metaArray = getmetadetail($segment4, $table_name, $language);

            } elseif ($segment2 == 'subcategory') {

                $table_name = 'sub_category';

                $metaArray = getmetadetail($segment4, $table_name, $language);

            } elseif ($segment1 == 'whoweare') {

                $column_val = $segment2;

                if ($segment2 == 'missionvision') {

                    $column_val = 'mission';

                }

                $table_name = 'contents';

                $column_name = 'content_page';

                $metaArray = getmetadetail($column_val, $table_name, $language, $column_name);

            } elseif ($segment1 == 'jobs') {

                $table_name = 'career';

                $metaArray = getmetadetail($segment4, $table_name, $language);

            } elseif ($segment1 == 'reachus') {

                $column_val = 'reachus';

                $metaArray = getmetarecord($column_val, $language);

            } else {

                $metaArray = getmetadetail($segment4, $table_name, $language);

            }

        } else {

            $table_name = $segment1;

            $column_val = $segment1;

            if ($segment1 == 'jobs') {

                $column_val = 'career';

                $metaArray = getmetarecord($column_val, $language);

            } elseif ($segment1 == 'privacy') {

                $table_name = 'contents';

                $column_name = 'content_page';

                $column_val = 'privacy-policy';

                $metaArray = getmetadetail($column_val, $table_name, $language, $column_name);

            } elseif ($segment1 == 'reachus') {

                $column_val = 'reachus';

                $metaArray = getmetarecord($column_val, $language);

            } else {

                $metaArray = getmetarecord($column_val, $language);

            }



            ////// main pages metas////////

        }

    } else {

        $metaArray = getmetarecord('index', 'eng');

    }



    return $metaArray;

}



function getClientMenus() {

    $CI = & get_Instance();

    $CI->load->model('ems/model_clientmenus');

    $result = $CI->model_clientmenus->fetchAll();

    $clientMenus = array();

    foreach ($result as $key => $valMenu) {

        $clientMenus[$valMenu['MenuID']] = $valMenu;

    }

    //$data=$result[0]['id'];

    return $clientMenus;

}

function getChildMenus($parent_id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_clientmenus');

    $result = $CI->model_clientmenus->fetchChildmenu($parent_id);

    

    return $result;

}





function get_status_bar($status = '1') {

    if ($status == 1) {

        $pub_val = 'checked="checked"';

        $un_pub_val = '';

    } else {

        $pub_val = '';

        $un_pub_val = 'checked="checked"';

    }

    $CI = & get_Instance();

    $module = $CI->uri->segment(2);

    $uid_level = $CI->session->userdata('usr_level');



    if ($uid_level == '2') {

        $htm.= '<div class="publishedStatuspanel">

                   

                                                                    <div class="publishedStatusheading">Published Status</div>

                                                                    <div class="publishedStatusRow"> 

                                                                    <div class="publishedDiv">

                                                                    <div class="clear" style="float:left;">

                                                                    <input onclick="pub_status(this.value)" id="input-3" name="grp_pub" type="radio" value="1" ' . $pub_val . '>

                                                                    </div>



                                                                    <div class="publishedlink">Published</div>

                                                               </div>



                                                               <div class="publishedDiv">

                                                               

                                                               <div class="clear" style="float:left;">

                                                               <input onclick="pub_status(this.value)" id="input-3" name="grp_pub" type="radio" value="0" ' . $un_pub_val . '>

                                                               </div>



                                                               <div class="publishedlink">Un Published</div>

                                                               </div>

                                                               </div>

                                                               </div>';

        return $htm;

    } else {



        $secid = get_section_id();

        $chresult = check_userlevel3($secid);

        $pu = $chresult[0]['grp_sec_pub'];



        if ($pu == 1) {

            $htm.= '<div class="publishedStatuspanel">

                   

                                                                    <div class="publishedStatusheading">Published Status</div>

                                                                    <div class="publishedStatusRow"> 

                                                                    <div class="publishedDiv">

                                                                    <div class="clear" style="float:left;">

                                                                    <input onclick="pub_status(this.value)" id="input-3" name="grp_pub" type="radio" value="1" ' . $pub_val . '>

                                                                    </div>



                                                                    <div class="publishedlink">Published</div>

                                                               </div>



                                                               <div class="publishedDiv">

                                                               

                                                               <div class="clear" style="float:left;">

                                                               <input onclick="pub_status(this.value)" id="input-3" name="grp_pub" type="radio" value="0" ' . $un_pub_val . '>

                                                               </div>



                                                               <div class="publishedlink">Un Published</div>

                                                               </div>

                                                               </div>

                                                               </div>';

            return $htm;

        }

    }

}



function get_grid_status($id, $value) {



    if ($value == 1) {

        $pub_val = 'checked="checked"';

        $pub_txt = 'Published';

    } else {

        $pub_val = '';

        $pub_txt = 'Un Published';

    }

    //echo '<br> here'.$value;

    $CI = & get_Instance();

    $module = $CI->uri->segment(2);

    $uid_level = $CI->session->userdata('usr_level');


    if ($uid_level == '2') {

        $htm.= '<div style="float:left; opacity:0;filter:alpha(opacity=0)">' . $value . '</div>

                                                   <div class="squaredOne"><input ' . $pub_val . ' type="checkbox" name="pub_status" id="pub_status_' . $id . '">

                                                       <label for="pub_status_' . $id . '"></label>

                                                   </div>';

        return $htm;

    } else {

        $secid = get_section_id();

        $chresult = check_userlevel3($secid);
         
         $pu = $chresult[0]['grp_sec_pub'];

        //$pu=0;

        if ($pu == 1) {

            $htm.= '<div style="float:left; opacity:0;filter:alpha(opacity=0)">' . $value . '</div>

                                                            <div class="squaredOne"><input ' . $pub_val . ' type="checkbox" name="pub_status" id="pub_status_' . $id . '">

                                                                <label for="pub_status_' . $id . '"></label>

                                                            </div>';

            return $htm;

        } else {

            $htm.= '<div style="float:left; opacity:0;filter:alpha(opacity=0)">' . $value . '</div>' . $pub_txt;

            return $htm;

        }

    }

}



function get_pub_permission() {

    $CI = & get_Instance();

    $module = $CI->uri->segment(2);

    $uid_level = $CI->session->userdata('usr_level');



    if ($uid_level == '2') {

        return true;

    } else {

        $secid = get_section_id();

        $chresult = check_userlevel3($secid);

        $pu = $chresult[0]['grp_sec_pub'];

        if ($pu == 1) {

            return true;

        } else {

            return false;

        }

    }

}



function get_menu_permission($secid) {

    $CI = & get_Instance();

    $module = $CI->uri->segment(2);

    $uid_level = $CI->session->userdata('usr_level');



    if ($uid_level == '2') {

        return true;

    } else {

        $chresult = check_userlevel3($secid);

        $pu = $chresult[0]['grp_sec_read'];

        if ($pu == 1) {

            return true;

        } else {

            return false;

        }

    }

}
function getPageId($pageTitle) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_contents');
    $result = $CI->model_contents->getPageId($pageTitle);

    return $result[0]->id;

}

function getLocations() {

    $CI = & get_Instance();

    $CI->load->model('ems/model_contents');
    $result = $CI->model_contents->getLocations();

    return $result;

}

function getDates() {

    $CI = & get_Instance();

    $CI->load->model('ems/model_contents');
    $result = $CI->model_contents->getDates();
  
    return $result;

}

function getPageTitle($pageId) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_contents');
    $result = $CI->model_contents->getPageTitle($pageId);

    return str_replace(' ', '_', $result[0]->eng_title);

}

function getPageName($pageId) {

    $CI = & get_Instance();
	$lang  = $CI->session->userdata('lang');
	
    $CI->load->model('ems/model_contents');
    $result = $CI->model_contents->getPageTitle($pageId);
	
    return ($lang == 'eng' ? $result[0]->eng_title : $result[0]->arb_title);

}

function get_modules_list($parent = 0) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsingroups');



    $siteList = $CI->model_cmsingroups->get_modules_list();

    return $siteList;

}



function get_section_row($column, $value) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_cmsingroups');



    $siteList = $CI->model_cmsingroups->get_section_row($column, $value);

    return $siteList;

}




function get_updated_button($btn_id, $btn_lablel, $type) {



    $CI = & get_Instance();

    $module = $CI->uri->segment(2);

    $secid = get_section_id();

    $uid_level = $CI->session->userdata('usr_level');

    if ($uid_level == '2') {

        $cr = 1;

        $r = 1;

        $u = 1;

        $d = 1;

        $pu = 1;

    } else {

        $chresult = check_userlevel3($secid);

        $cr = $chresult[0]['grp_sec_create'];

        $r = $chresult[0]['grp_sec_read'];

        $u = $chresult[0]['grp_sec_update'];

        $d = $chresult[0]['grp_sec_delete'];

        $pu = $chresult[0]['grp_sec_pub'];

    }

    if (empty($type)) {

        $operation = $cr;

    } elseif ($type == 'add') {

        $operation = $cr;

    } elseif ($type == 'edit') {

        $operation = $u;

    } elseif ($type == 'delete') {

        $operation = $d;

    } elseif ($type == 'view') {

        $operation = $r;

    } else {

        $operation = $cr;

    }

    if ($operation == 1) {



        $htm2.='<li><a id="' . $btn_id . '">' . $btn_lablel . '</a></li>';

    } else {



        $htm2.='<li><a href="javascript:alert_user();">' . $btn_lablel . '</a></li>';

    }



    return $htm2;

}


function getGAtrackingID() {

    $CI = & get_Instance();

    $CI->db->select("ga_tracking_id");

    $CI->db->from("configuration");

    $qry = $CI->db->get();

    $ga_tracking_id = $qry->row();

    return $ga_tracking_id->ga_tracking_id;

}

function location_name($id) {

 

 if(isset($id) and $id == 1){

      return 'Jeddah';

 }else if(isset($id) and $id == 2){

   return 'Al-khobar';

 }else if(isset($id) and $id == 3){

   return 'Al riyadh';

 }else{

   return 'N/A';

 }

 

}

  /* Functions made by Sufyan */

function cleanDataEnt($data) {

  $data = htmlspecialchars($data);

  $data = str_replace('&amp;#','&#',$data);

  $data = str_replace('&amp;amp;','&amp;',$data);

  return cleanData($data);

}



// Clean data..

function cleanData($data) {

  if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {

    $sybase  = strtolower(@ini_get('magic_quotes_sybase'));

    if (empty($sybase) || $sybase=='off') {

      // Fixes issue of new line chars not parsing between single quotes..

      $data = str_replace('\n','\\\n',$data);

      return stripslashes($data);

    }

  }

  return $data;

}


  
 
 function get_ctct($key) {

    $CI = & get_Instance();

    $CI->db->select($key);

    $CI->db->from("configuration");

    $qry = $CI->db->get();

    $rec = $qry->row();

    return $rec->$key;

}

function apply_class($id,$pageid){
   
   if($id == $pageid){
	return 'class="active"';   
   }
}
function apply_class2($id,$pageid){
   
   if($id == $pageid){
	return "active";   
   }
}

 function childMenu($parent_id,$page_id)
        { 
		

			  $CI = & get_Instance();
			  $data  =''; 
			  $lang  = $CI->session->userdata('lang');
	
              $CI->load->model('ems/model_menu');
               if($parent_id == $page_id){
				   $active_class = 'class="active"';   
				   }else{
					 $active_class = '';    
					   
					   }
		      $menus = $CI->model_menu->childMenu($parent_id);
			  
			 
	         //$data .='<ul class="left-Menu">';
                           foreach($menus as $menu){
							   $data .= '<li '.($active_class == '' ? apply_class($menu['id'],$page_id) : $active_class ).'><a href="'.base_url().'page/'.str_replace(' ', '_', $menu['eng_title']).'">'.($lang == 'eng' ? $menu['eng_title'] : $menu['arb_title']).'</a><span></span></li>';
							   $active_class = '';  
							   }
			//$data .= '</ul>';
				return $data ;
        }
		
 function childPagesIds($parent_id)
        { 
		
		
			  $CI = & get_Instance();
			  $data  =''; 
			  $lang  = $CI->session->userdata('lang');
	
              $CI->load->model('ems/model_menu');
              
		      return $menus = $CI->model_menu->childMenu($parent_id);
	         
                          
				
        }
		
 function getParentPageId($id)
        { 
		
		
			  $CI = & get_Instance();
			  $data  =''; 
			  $lang  = $CI->session->userdata('lang');
	
              $CI->load->model('ems/model_menu');
              
			  return $id = $CI->model_menu->getParantId($id);
	         
                          
				
        }


	function getFrontEndDataByTpl($tpl,$order_by='DESC',$multipages=false)
	{
		 $CI = & get_Instance();
		 $CI->load->model('ems/model_contents');
		 $lang = $CI->session->userdata('lang');
		 $pages = $CI->model_contents->front_end_content_by_template($tpl,$order_by);
		if($multipages)
		{
			 foreach($pages as $page){
			 	$contents[] = $CI->model_contents->page_content($page->id);
			 }
			 return $contents;
		}
		
		 $front_page_id = $pages[0]->id;
		 
		 return $contents = $CI->model_contents->page_content($front_page_id);
		  
			
	}		

	function footerMenus($menu_id = 3,$page_id='',$li=1) {

	  $CI = & get_Instance();
	  $html  = ''; 
	  $insert = '';
	  $lang  = $CI->session->userdata('lang');
	
	  $CI->load->model('ems/model_menu');
	  $results = $CI->model_menu->fetchMenuPages($menu_id);
	   
	  
	  foreach($results as $result){
		  if($result->page_id == $page_id){
			  	$class = 'active';
			  }else{
			    $class = '';	  
				  }
		  $childPages = array();
		  $pageTitle = $CI->model_menu->pageSubTitle($result->page_id,$lang);
		  $url = lang_base_url().'page/'.str_replace(' ','_',pageTitle($result->page_id,'eng'));
		  $childPages = $CI->model_menu->fetchMenuParrentPages($menu_id, $result->page_id);
		 
	  if($result->parent_id == 0){
		  $html .='<li class="'.$class.'"><a href="'.$url.'">'.$pageTitle.'</a></li>';
							
		  }		  
	  }
	  return $html; 
}


	
function siteMap($menu_id = 1,$page_id='') {

	  $CI = & get_Instance();
	  $html  = ''; 
	  $lang  = $CI->session->userdata('lang');
	
	  $CI->load->model('ems/model_menu');
	  $results = $CI->model_menu->fetchMenuPages($menu_id);
	  foreach($results as $result){
		  $childPages = array();
		  $pageTitle = $CI->model_menu->pageTitle($result->page_id,$lang);
		  $childPages = $CI->model_menu->fetchMenuParrentPages($menu_id, $result->page_id);
		  
	  if($result->parent_id == 0){
		// $classParent = apply_class($result->page_id,$page_id);
	      $getEngTitleForUrl = $CI->model_menu->pageTitle($result->page_id,'eng');
		  if($childPages){
			//$getEngTitleForUrl = $CI->model_menu->pageTitle($childPages[0]->page_id,'eng');  
		  }
		  $child_class_active = '';
		  
		  if($result->tpl == 'aboutus'){
			  
			$html .= '<li><a href="#">'.$pageTitle.'</a>';
			$html .= '<ul>';
			foreach($childPages as $child_page){
				if($child_page->page_id == $page_id){
					$child_class_active = 'active';
					}else{
					$child_class_active = '';
						}
				 
				$getEngTitleForUrl = lang_base_url().'page/'.str_replace(' ','_',$CI->model_menu->pageTitle($child_page->page_id,'eng')); 
				$child_title = $CI->model_menu->pageSubTitle($child_page->page_id,$lang);
			$html .= '<li><a href="'.$getEngTitleForUrl.'">'.$child_title.'</a></li>';	
				}
				
			$html .= '</ul></li>';  
		  }elseif($result->tpl == 'mediacenter'){
			 
			$html .=  '<li><a href="#">'.$pageTitle.'</a>';
			$html .=  '<ul>';
			foreach($childPages as $child_page){
				if($child_page->page_id == $page_id){
					$child_class_active = 'active';
					}else{
					$child_class_active = '';
						}
				  $getEngTitleForUrl = lang_base_url().'page/'.str_replace(' ','_',$CI->model_menu->pageTitle($child_page->page_id,'eng')); 
				  $child_title = $CI->model_menu->pageSubTitle($child_page->page_id,$lang);
				  $html .='<li><a href="'. $getEngTitleForUrl.'">'.$child_title.'</a></li>';
				  
			}
				$html .='</ul></li>';
			
		
			 }else{
				 $html .= '<li><a href="'.lang_base_url().'page/'.str_replace(' ', '_',$getEngTitleForUrl).'">'.$pageTitle.'</a></li>';
				 }
		  
		   
		  
		   
		  }
		  
		 
	  }		  
	
	  return $html; 
}	

  function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}

	
function menus($menu_id = 1,$page_id='',$parent_id='') {

	  $CI = & get_Instance();
	  $html  = ''; 
	  $lang  = $CI->session->userdata('lang');
	
	  $CI->load->model('ems/model_menu');
	  $results = $CI->model_menu->fetchMenuPages($menu_id);
	  
	  foreach($results as $result){
          $tpl = $result->tpl;
          $ref = '';
          if ($tpl == 'home')
          {
              $ref = '#page-top';
          }elseif ($tpl == 'about_us')
          {
              $ref = '#about';
          }elseif ($tpl == 'comm_partners')
          {
              $ref = '#about';
          }elseif ($tpl == 'products')
          {
              $ref = '#products';
          }elseif ($tpl == 'accessories')
          {
              $ref = '#accessories';
          }elseif ($tpl == 'solutions')
          {
              $ref = '#solutions';
          }elseif ($tpl == 'contact_us')
          {
              $ref = '#contact';
          }

		  $active = '';
		  if($result->page_id == $page_id){
			$active = 'active';  
		  }elseif($result->page_id == $parent_id ){
			  $active = 'active';
		 }
		  $childPages = array();
		  $pageTitle = $CI->model_menu->pageTitle($result->page_id,$lang);
		  $childPages = $CI->model_menu->fetchMenuParrentPages($menu_id, $result->page_id);
		  
	  if($result->parent_id == 0){
		// $classParent = apply_class($result->page_id,$page_id);
	      $getEngTitleForUrl = $CI->model_menu->pageTitle($result->page_id,'eng');
		  if($childPages){
			//$getEngTitleForUrl = $CI->model_menu->pageTitle($childPages[0]->page_id,'eng');  
		  }
		  $child_class_active = '';
		  
		  if($result->tpl == 'service' || $result->tpl == 'finance'){
			
			foreach($childPages as $child_page){
				if($child_page->page_id == $page_id){
					$child_class_active = 'active';
					$active = 'active';
					}else{
					$child_class_active = '';
						}
			}
				
			$html .= '<li class="has-drop '.$active.'"><a href="#" class="sub-opener">'.$pageTitle.'</a>';
			$html .= '<ul>';
			foreach($childPages as $child_page){
				if($child_page->page_id == $page_id){
					$child_class_active = 'active';
					}else{
					$child_class_active = '';
						}
				 
				$getEngTitleForUrl = lang_base_url().'page/'.str_replace(' ','_',$CI->model_menu->pageTitle($child_page->page_id,'eng')); 
				$child_title = $CI->model_menu->pageSubTitle($child_page->page_id,$lang);
			$html .= '<li class="'.$child_class_active.'"><a href="'.$getEngTitleForUrl.'">'.$child_title.'</a></li>';	
				}
				
			$html .= '</ul></li>';  
		  }else{
				 if($result->tpl == 'career'){
					 $html .= '<li  class="'.$active.'"><a target="_blank" href="'.content_detail('eng_external_page',$result->page_id).'">'.$pageTitle.'</a></li>';
				 }else
				 {
					 $html .= '<li  class="'.$active.'"><a class="page-scroll" href="'.$ref.'">'.$pageTitle.'</a></li>';
				 }
				 
				 }
		  
		   
		  
		   
		  }
		  
		 
	  }
	
	  return $html; 
}
function sideMenus($menu_id = 1,$page_id ='',$parent_id) {

	  $CI = & get_Instance();
	  $html  = ''; 
	  $lang  = $CI->session->userdata('lang');
	
	  $CI->load->model('ems/model_menu');
	  $results = $CI->model_menu->fetchMenuParrentPages($menu_id, $parent_id);
	  foreach($results as $result){
		  $active = '';
		  if($result->page_id == $page_id){
			$active = 'active-smenu';  
		  }
		  
		  $pageTitle = $CI->model_menu->pageTitle($result->page_id,$lang);
		  $getEngTitleForUrl = $CI->model_menu->pageTitle($result->page_id,'eng');
		  $html .= '<li class="'.$active.'"><a href="'.lang_base_url().'page/'.str_replace(' ', '_',$getEngTitleForUrl).'">'.$pageTitle.'</a></li>';
		  
	  
		  
		 
	  }		  
	
	  return $html; 
}		
function getClass($numberOfRecords){
	
	if($numberOfRecords <= 3)
	  {
	  return 'three';
	 }elseif($numberOfRecords == 4){
	   return 'four';	 
	 }elseif($numberOfRecords == 5){
	  return 'five';	 
	}
	
	
	}
	
	 function fetchLastupdated($table,$col) {
            $result='';
            $CI = & get_Instance();
            $CI->load->model('model_custom');
            $lastupdated = $CI->model_custom->fetchLastupdated($table,$col);
            $date = $lastupdated[0]['max('.$col.')'];
            if(!empty($date) && $date !="0000-00-00 00:00:00")
            {$result = date('d F, Y',strtotime($date));}
            return $result;

	}
	
	function fetchContctSubject() {
            $CI = & get_Instance();
            $CI->load->model('model_custom');
            $result = $CI->model_custom->fetchContactSubject();
            return $result;

	}
	
	function getAllData($item_name = '') {
            $CI = & get_Instance();
            $CI->load->model('ems/model_contents');
            $result = $CI->model_contents->getAllData($item_name);
			
            return $result;

	}
	function getProductMainCategoryId($sub_sub_cat_id) {
          
			$CI = & get_Instance();
            $CI->load->model('ems/model_contents');
           $sub_cat_id = $CI->model_contents->getParentId($sub_sub_cat_id);
		   
           return $cat_id = $CI->model_contents->getParentId($sub_cat_id);
	}
	function getProductMainCategoryId2($sub_sub_cat_id) {
          
			$CI = & get_Instance();
            $CI->load->model('ems/model_contents');
            $sub_cat_id = $CI->model_contents->getParentId($sub_sub_cat_id);
		    $cat_id = $CI->model_contents->getParentId($sub_cat_id);
			return $cat_id = $CI->model_contents->getParentId($cat_id);
	}
	function getParentCategoryId($id) {
            
			$CI = & get_Instance();
            $CI->load->model('ems/model_contents');
           return $parent_id = $CI->model_contents->getParentId($id);
            
	}
// Zulfiqar logic for menu for now i have no need of this may be helpin future
 /*function menus( $root_id = 0,$page_id,$menu_id = 1)
        { 
		
		
			  $CI = & get_Instance();
			  $html  = array(); 
			  $lang  = $CI->session->userdata('lang');
	
              $CI->load->model('ems/model_menu');
          
		      $sql = $CI->model_menu->header_menu(($root_id > 0) ? $root_id:'', $menu_id );
	         
             foreach ($sql as $item )
		
                        $children[$item['parent_id']][] = $item;
						
        
                // loop will be false if the root has no children (i.e., an empty menu!)
                $loop = !empty( $children[$root_id] );
              
                // initializing $parent as the root
                $parent = $root_id;
                $parent_stack = array();
               
                // HTML wrapper for the menu (open)
				
				$home = ($CI->session->userdata('lang') == 'eng') ? 'Home' : 'الرئيسية';
                $html[] = '<li><a href="'.$CI->config->item('base_url').'">
				'.$home.'</a></li>';
               
                while ( $loop && ( ( $option = each( $children[$parent] ) ) || ( $parent > $root_id ) ) )
                {
				
				 
                        if ( $option === false )
                        {
                              
							    $parent = array_pop( $parent_stack );
                                // HTML for menu item containing childrens (close)
                                $html[] = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 ).'</ul>';
                                $html[] = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ).'</li>';
                        }
                        elseif ( !empty( $children[$option['value']['id']] ) )
                        {
                         
							     $tab = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 );
                              
                                // HTML for menu item containing childrens (open)
                                $html[] = sprintf(
			
                           '<li '.apply_class($option['value']['id'],$page_id).'  id="list_'.$option['value']['id'].'">
										<a href="'.$CI->config->item('base_url').'page/%2$s"><span>%3$s</span></a>',
										
                                        $tab,   // %1$s = tabulation
      remove_space($option['value']['eng_title']),// %2$s = link (URL)
                                        ($CI->session->userdata('lang') == 'eng') ? $option['value']['eng_title'] : $option['value']['arb_title']   // %3$s = title
                                );
                              
							     $html[] = $tab . "\t" . '<ul class="sub-menu">';
                               
                                array_push( $parent_stack, $option['value']['parent_id'] );
                                  $parent = $option['value']['id'];
								   
                        }
                        else
                            
							    // HTML for menu item with no children (aka "leaf")
                                $html[] = sprintf(
                    '<li '.apply_class($option['value']['id'],$page_id).' id="list_'.$option['value']['id'].'">
					<a href="'.$CI->config->item('base_url').'page/%2$s"><span>%3$s</span></a></li>',
                                        str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ),   // %1$s = tabulation
                                       remove_space($option['value']['eng_title']),   // %2$s = link (URL)
                                        ($CI->session->userdata('lang') == 'eng') ? $option['value']['eng_title'] : $option['value']['arb_title']   // %3$s = title
                                );
                }
               
                // HTML wrapper for the menu (close)
               // $html[] = '</ul>';
				  
		
                return implode( "\r\n", $html );
        }*/
		
function remove_space($item){
	
	return str_replace(' ','_',$item);
	//return strtolower(str_replace(' ','_',strtolower($item)));
}


function listing_view($page_id){
	
	$CI = & get_Instance();
    $CI->load->model('ems/model_contents');
	$html = '';
		$i=1;
			 
			
                      foreach($CI->model_contents->front_end_content($page_id) as $val){  
			 $title =  ($CI->session->userdata('lang') =='eng' ? $val->eng_title : $val->arb_title);
					  
                $html .= '<div class="panel panel-default">';
                $html .= '<div class="panel-heading" role="tab" id="heading'.$i.'">';
                $html .= '<h4 class="panel-title">';
                $html .= '<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'" aria-expanded="true" aria-controls="collapse'.$i.'">';
                $html .= ''.$title.'';
				if($i == 1){
					$class = 'in';
					}else{
					$class = '';	
						}
                $html .= '</a></h4></div><div id="collapse'.$i.'" class="panel-collapse collapse '.$class.'" role="tabpanel" aria-labelledby="heading'.$i.'">';
                $html .=  '<div class="panel-body">';
                $html .=  ($CI->session->userdata('lang') =='eng' ? content_detail('eng_content',$val->id) : content_detail('arb_content',$val->id));         
                $html .=  '</div></div></div>';
                          
              $i++;
				 }
           
		   
		   return $html;
			 
	
}

function listing_view_services($ids){
	$CI = & get_Instance();

    $CI->load->model('ems/model_contents');
	 $data;
           foreach($ids as $val){  
			 $title =  ($CI->session->userdata('lang') =='eng' ? $val['eng_title'] : $val['arb_title']);
					  
             $data .= '<li><div class="img-frame full-third-short"><a href="'.base_url().'page/detail/'.str_replace(' ','_',$val['eng_title']).'"><img src="'. base_url().'assets/script/'.content_detail('bg',$val['id']).'" alt="Service" width="280" height="124"/></a></div>';
             $data .= '<h4>'.$title.'</h4>';
		     $data .= ' <p>'.($CI->session->userdata('lang')=='eng'? content_detail('eng_content',$val['id']) : content_detail('arb_content',$val['id'])).'</p>';		
			 $data .= '</li>';	
				 }
           
		   
		   return $data;
			 
	
}

function listing_view_projects_search($result){
	
		$CI = & get_Instance();
		
			$CI->load->model('ems/model_contents');
			$data ;
			 foreach($result as $val){  
					 $title =  ($CI->session->userdata('lang') =='eng' ? $val->eng_title : $val->arb_title);
						  
					$data .= '<li><a href="'.base_url().'page/detail/'.str_replace(' ','_',$val->eng_title).'"><h1>'.$title.'</h1></a>';
					$data .= '<div class="thumbs_div">';  
					$data .= '<a href="#">';
					$data .= '<img src="'.base_url().'assets/script/'.content_detail('bg',$val->id).'" width="150" height="113" alt="'.$title.'"></a>';
					$data .= '</div>';	
					$data .= '<strong style="font-size:14px; font-weight:bold;">'.($CI->session->userdata('lang') == 'eng' ? 'Date' : 'تاريخ' ).':&nbsp;</strong>'; 
					$data .= $val->pro_date .'<br>';
					$data .= '<strong style="font-size:14px; font-weight:bold;">'.($CI->session->userdata('lang') == 'eng' ? 'Contract No:':'عقد رقم:').'&nbsp;</strong>';     
					$data .=  content_detail('pro_contract_no',$val->id).'<br>';  
					$data .= '<strong style="font-size:14px; font-weight:bold;">'.($CI->session->userdata('lang') =='eng' ? 'Location:':'الموقع:').'&nbsp;</strong>'; 
					$data .= ($CI->session->userdata('lang') =='eng' ? $val->eng_location : $val->arb_location ).'<br>';
					$data .= '<strong style="font-size:14px; font-weight:bold;">'.($CI->session->userdata('lang') =='eng'? 'Description:': 'الوصف:').'&nbsp;</strong> '; 
					$data .= ($CI->session->userdata('lang')=='eng' ? content_detail('eng_content',$val->id) : $content_detail('arb_content',$val->id) ).'<br>';     
					$data .= '<strong style="font-size:14px; font-weight:bold;">'.($CI->session->userdata('lang')== 'eng' ? 'Major Equipment:' : 'الرئيسية المعدات:' ).'&nbsp;</strong>';    
					$data .= ($CI->session->userdata('lang')=='eng' ? content_detail('eng_major_equip',$val->id) : $content_detail('arb_major_equip',$val->id) ).'<br>';    
					$data .= '</li>';    
						 }
				   
				   
				   return $data;
					 
	
}



function countProjects($page_id){
	
		$CI = & get_Instance();
		
			$CI->load->model('ems/model_contents');
		//	$data ;
			return count($CI->model_contents->front_end_content($page_id));
					 
	
}

function listing_view_projects($page_id){
	
		$CI = & get_Instance();
		
			$CI->load->model('ems/model_contents');
			$data ;
			 foreach($CI->model_contents->front_end_content($page_id) as $val){  
					 $title =  ($CI->session->userdata('lang') =='eng' ? $val->eng_title : $val->arb_title);
						  
					$data .= '<li><a href="'.base_url().'page/detail/'.str_replace(' ','_',$val->eng_title).'"><h1>'.$title.'</h1></a>';
					$data .= '<div class="thumbs_div">';  
					$data .= '<a href="#">';
					$data .= '<img src="'.base_url().'assets/script/'.content_detail('bg',$val->id).'" width="150" height="113" alt="'.$title.'"></a>';
					$data .= '</div>';	
					$data .= '<strong style="font-size:14px; font-weight:bold;">'.($CI->session->userdata('lang') == 'eng' ? 'Date' : 'تاريخ' ).':&nbsp;</strong>'; 
					$data .= $val->pro_date .'<br>';
					$data .= '<strong style="font-size:14px; font-weight:bold;">'.($CI->session->userdata('lang') == 'eng' ? 'Contract No:':'عقد رقم:').'&nbsp;</strong>';     
					$data .=  content_detail('pro_contract_no',$val->id).'<br>';  
					$data .= '<strong style="font-size:14px; font-weight:bold;">'.($CI->session->userdata('lang') =='eng' ? 'Location:':'الموقع:').'&nbsp;</strong>'; 
					$data .= ($CI->session->userdata('lang') =='eng' ? $val->eng_location : $val->arb_location ).'<br>';
					$data .= '<strong style="font-size:14px; font-weight:bold;">'.($CI->session->userdata('lang') =='eng'? 'Description:': 'الوصف:').'&nbsp;</strong> '; 
					$data .= ($CI->session->userdata('lang')=='eng' ? content_detail('eng_content',$val->id) : $content_detail('arb_content',$val->id) ).'<br>';     
					$data .= '<strong style="font-size:14px; font-weight:bold;">'.($CI->session->userdata('lang')== 'eng' ? 'Major Equipment:' : 'الرئيسية المعدات:' ).'&nbsp;</strong>';    
					$data .= ($CI->session->userdata('lang')=='eng' ? content_detail('eng_major_equip',$val->id) : $content_detail('arb_major_equip',$val->id) ).'<br>';    
					$data .= '</li>';    
						 }
				   
				   
				   return $data;
					 
	
}


function listing_view_clients($page_id){
	
	
	$CI = & get_Instance();

    $CI->load->model('ems/model_contents');
	
		
			 $data = '';
			 foreach($CI->model_contents->front_end_content($page_id) as $val){  
			$data .= '<li>';
             $title =  ($CI->session->userdata('lang') =='eng' ? $val->eng_title : $val->arb_title);
				$data .='<div class="img-frame full-third-short"><img src="'.base_url().'assets/script/'.content_detail("bg",$val->id).'" alt="Client" width="280" height="124"/></div>';  
            $data .= '<h4>'.$title.'</h4></li>';
              
				 }
          
		   
		   return $data;
			 
	
}

function contact_form($page_title= ''){
	$CI = & get_Instance();
	return'<form enctype="multipart/form-data" action="'.$CI->config->item('base_url').'page/submit" method="post" class="cform contact">
               <input type="hidden" name="page_title" value="'.$page_title.'">
			    <ol class="cf-ol">
                    <li id="li--1" class="">
                        <label for="cf_field_1"><span>'.($CI->session->userdata('lang') =='eng'? 'Your Name (required)' : 'اسمك').'</span></label>
                        <input required type="text" name="name" id="cf_field_1" class="single fldrequired" value="" onfocus="clearField(this)" onblur="setField(this)" />
                        <span class="reqtxt">(required)</span></li>
                    <li id="li--2" class="">
                        <label for="cf_field_2"><span>'.($CI->session->userdata('lang') =='eng' ? 'Your Email (required)' :'البريد الإلكتروني الخاص بك').'</span></label>
                        <input required type="email" name="email" id="cf_field_2" class="single fldemail fldrequired" value=""/>
                        <span class="emailreqtxt">(valid email required)</span></li>
                    <li id="li--3" class="">
                        <label for="subject"><span>'.($CI->session->userdata('lang') =='eng'? 'Subject' : 'موضوع').'</span></label>
                        <input type="text" name="subject" id="cf_field_3" class="single" value=""/>
                    </li>
                    <li id="li--4" class="">
                        <label for="message"><span>'.($CI->session->userdata('lang') =='eng'? 'Your Message':'رسالتك').'</span></label>
                        <textarea cols="30" rows="8" name="message" id="cf_field_4" class="area"></textarea>
                    </li>
                </ol>                
                <p class="cf-sb ar-work">
                    <input type="submit" name="sendbutton" id="sendbutton" class="sendbutton" value="'.($CI->session->userdata('lang') =='eng'? 'Send':'إرسال').'" onclick="return cforms_validate("", false)"/>
                </p>
                <input type="hidden" id="lang_contact" value="<?php echo $lang; ?>">
            </form>';	
	
}

function map($lat,$lng,$loc){
$zoom_level = 8;
if(!empty($lat) and !empty($lng)){
	
	
			$loc     = preg_replace('/\s+/', '', $loc);
		 
?>
<div id="ShowMap">
    <script type="text/javascript">
                            

	var locations = [

    	
		
		[

        	'<?php echo $loc ;?>',

    		<?php echo $lat;?>, <?php echo $lng;?>,

    		1,

	    ]
	]

var map = new google.maps.Map(document.getElementById('ShowMap'), {

    zoom: <?php echo $zoom_level;?>,

    center: new google.maps.LatLng(<?php echo $lat;?>, <?php echo $lng;?>),

    mapTypeId: google.maps.MapTypeId.ROADMAP

});

var marker, i;

var markers = new Array();

for (i = 0; i < locations.length; i++) {



var infowindow = new google.maps.InfoWindow();

    marker = new google.maps.Marker({

        position: new google.maps.LatLng(locations[i][1], locations[i][2]),

        map: map

    });

    markers.push(marker);

    google.maps.event.addListener(marker, 'click', (function (marker, i) {

        return function () {

            infowindow.setContent(locations[i][0], locations[i][0]);

            infowindow.open(map, marker);

        }

    })(marker, i));

}

function showInfo(id)
{
	google.maps.event.trigger(markers[id], 'click');
	location.hash = "mapLoc";
}

/*setInterval(function () {

    var i = Math.floor(Math.random() * markers.length);

    google.maps.event.trigger(markers[i], 'click');

}, 3000);*/

        </script>
                    	<a name="mapLoc">&nbsp;</a>
                    	<div id="loc_map" style="width:100%;height:426px;"></div>
                  
                        </div>



<?php
}
}

function usre_data($uid){
	
	$CI = & get_Instance();	 
	  $CI->db->select('usr_uname');
        $CI->db->from('cms_users');
        $CI->db->where("id",$uid);
        $query = $CI->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
	
}



function content_detail($key,$id){
	
	    $CI = & get_Instance();	 
	    $CI->db->select('*');
        $CI->db->from('content_detail');
        $CI->db->where("meta_key",$key);
		$CI->db->where("post_id",$id);
        $query = $CI->db->get();
        if ($query->num_rows() > 0) {
           
			return $query->row()->meta_value;
        } else {
            return false;
        }
	
}

function file_upload($file,$id){
 
  foreach($file as $key=>$val){
	  if(!empty($val['name'])){
	           $file =  str_replace($val['name'],$key.'_'.$id.'.jpg',$val['name']);
	
		        $target_path = './uploads/bg/';
			    $target_path = $target_path. basename($file) ; 

				if(move_uploaded_file($val['tmp_name'], $target_path)) {
				return true;
				}else{
				return false;	
				}
	  }
  }
 
}

function img_explode($arr,$url = true){
	        preg_match_all('/<img[^>]+>/i',$arr, $result); 
			
	       if(!empty($result[0])){
		   $search  = array('../../../../','<p>','</p>');
		   $replace = array(base_url(),'','');
		   $arr     = str_replace($search,$replace,$arr);
		   
		   $rec     = explode('<img',$arr);
		  $li = '';
		   foreach($rec as $val){
			  if(!empty($val)){
		  preg_match('/(src=["\'](.*?)["\'])/', $val, $match);  //find src="X" or src='X'
		
		  $li .= '<li>';
		  if($url == true){
		  $li .= '<a href="'.$match[2].'" data-group="set1" class="html5lightbox">'; 
		  }
		  $li .='<img '.$val.'';
		  
		  $li .= '</li>';
		  
		  
			   }
		   }
		   	 return $li; 
		   }
		 
}
function rangSliderScript($page_id,$second = '')
{
			return '<script> 
		var downpayment_min'.($second != '' ? $second : '').' = '.(content_detail('eng_min_down_payment', $page_id) == '' ? '0' : content_detail('eng_min_down_payment', $page_id)).'
		var downpayment_max'.($second != '' ? $second : '').' = '.(content_detail('eng_max_down_payment', $page_id) == '' ? '0' : content_detail('eng_max_down_payment', $page_id)).'
		var downpayment_mid'.($second != '' ? $second : '').' = Math.round((parseInt(downpayment_min'.($second != '' ? $second : '').') + parseInt(downpayment_max'.($second != '' ? $second : '').'))/2);
		var ballonpayment_min'.($second != '' ? $second : '').' = '.(content_detail('eng_min_ballon_payment', $page_id) == '' ?  '0' : content_detail('eng_min_ballon_payment', $page_id)).'
		var ballonpayment_max'.($second != '' ? $second : '').' = '.(content_detail('eng_max_ballon_payment', $page_id) == '' ? '0' : content_detail('eng_max_ballon_payment', $page_id)).'
		var ballonpayment_mid'.($second != '' ? $second : '').' = Math.round((parseInt(ballonpayment_min'.($second != '' ? $second : '').') + parseInt(ballonpayment_max'.($second != '' ? $second : '').'))/2);
		var murabaha'.($second != '' ? $second : '').' = '.(content_detail('eng_murabaha_payment', $page_id) == '' ? '0' : content_detail('eng_murabaha_payment', $page_id)).'
		var insurance'.($second != '' ? $second : '').' = '.(content_detail('eng_insurance_payment', $page_id) == '' ? '0' : content_detail('eng_insurance_payment', $page_id)).'
		var admin_fee'.($second != '' ? $second : '').' = '.(content_detail('eng_admin_payment', $page_id) == '' ? '0' : content_detail('eng_admin_payment', $page_id)).'
		var monthly_income_should_b'.($second != '' ? $second : '').' = '.(content_detail('eng_salary_payment', $page_id) == '' ? '0' : content_detail('eng_salary_payment', $page_id)).'
		</script>';
}