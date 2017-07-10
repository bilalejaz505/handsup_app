<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');



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


function wishList($id) {



    $CI = & get_Instance();

    $CI->load->model('ems/model_wishList');

	$uid = $CI->session->userdata('user_id');

    $result = $CI->model_wishList->checkProduct($id,$uid);

    return $result;

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

function teamImage($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchMemberImages($id);

    return $result;

}

function serviceImage($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchServiceImages($id);

    return $result;

}

function galleryImages($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchGalleryImages($id);

    return $result;

}

function projectImage($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchProjectImages($id);

    return $result;

}

function fetchProductImages($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchProductImages($id);

    return $result;

}

function newsImage($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchNewsImages($id);

    return $result;

}

function magImage($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchMagzineImages($id);

    return $result;

}

function newsImageEng($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchNewsImagesEng($id);

    return $result;

}

function newsImageArb($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchNewsImagesArb($id);

    return $result;

}

function productCategory($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/catagory_model');

    $result = $CI->catagory_model->fetchCatagory($id);

    return $result;

}

function checkProduct($id,$uid) {



    $CI = & get_Instance();

    $CI->load->model('model_cart');

    $result = $CI->model_cart->checkProduct($id,$uid);

    return $result;

}

function getEventByDate($date) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_celender');

    $result = $CI->model_celender->getEventByDate($date);

    return $result;

}

function getEventsByWeek($time, $date) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_celender');

    $result = $CI->model_celender->getEventsByWeek($time, $date);

    return $result;

}



function fetchProductData($id) {

   

    $CI = & get_Instance();

    $CI->load->model('ems/model_product');

    $result = $CI->model_product->fetch($id);

    return $result;

}

function fetchCatProduct($id) {

   

    $CI = & get_Instance();

    $CI->load->model('ems/model_product');

    $result = $CI->model_product->fetchCatProduct($id);

    return $result;

}

function newsPdf($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchNewsPdf($id);

    return $result;

}

function downloadCenterPdf($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchDownCenterPdf($id);

    return $result;

}

function library($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchELibraryPdf($id);

    return $result;

}

function documentShare($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_content_images');

    $result = $CI->model_content_images->fetchDocumentSharePdf($id);

    return $result;

}

function social_links() {

    $CI = & get_Instance();

    $CI->load->model('ems/model_configuration');

    $result = $CI->model_configuration->fetchRowSocialLink();

    return $result;

}

function get_x_words($string,$x=25) {

 $parts = explode(' ',$string);

if (sizeof($parts)>$x) {

 $parts = array_slice($parts,0,$x);

    }

 echo implode(' ',$parts);

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



function getnoofphotosinAlbum($gal_id) {

    $CI = & get_Instance();

    $CI->load->model('model_gallery');

    $result = $CI->model_gallery->gettotalAlbumpics($gal_id);

    return $result;

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



function getsolutionTitle($id){

       $CI = & get_Instance();

       $query = $CI->db->query("select eng_content_title from contents where id=".$id);

        $result = $query->row();

        return $result->eng_content_title;

        }



function calculateMessage() {



    $CI = & get_Instance();

    $CI->load->model('ems/model_message');

    $user_id = $CI->session->userdata('id');



    $result = $CI->model_message->Messages($user_id);

    return $result;

}



///////Filters/////////



function positionFilter() {



    $CI = & get_Instance();

    $CI->load->model('ems/model_bod');

    $result = $CI->model_bod->getPositions();



    return $result;

}



function titleFilter() {



    $CI = & get_Instance();

    $CI->load->model('ems/model_history');

    $result = $CI->model_history->getFilterData();



    return $result;

}



function yrFilter() {



    $CI = & get_Instance();

    $CI->load->model('ems/model_history');

    $result = $CI->model_history->getFilterData();



    return $result;

}



function websiteFilter() {



    $CI = & get_Instance();

    $CI->load->model('ems/model_sites');

    $result = $CI->model_sites->getWesitesList();



    return $result;

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

                    $htm2.='<li><a href="ems/' . $module . '/add" id="add">Add</a></li>';

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



function getCatName($id) {

    $CI = & get_Instance();

    $CI->load->model('model_custom');

    $result = $CI->model_custom->getCatName($id);

    return $result;

}



function getSubCatName($id) {

    $CI = & get_Instance();

    $CI->load->model('model_custom');

    $result = $CI->model_custom->getSubCatName($id);

    return $result;

}



function getProducts() {

    $CI = & get_Instance();

    $CI->load->model('model_custom');

    $result = $CI->model_custom->fetchProducts();

    return $result;

}



function getProductsName($productID) {

    $CI = & get_Instance();

    $CI->load->model('model_custom');

    $result = $CI->model_custom->fetchProductsName($productID);

    return $result;

}



function getSocailLinks($id) {

    $CI = & get_Instance();

    $CI->load->model('model_custom');

    $result = $CI->model_custom->getSocailLinks($id);

    return $result;

}



function getNewsMonths($year) {

    $CI = & get_Instance();

    $CI->load->model('model_news');

    $result = $CI->model_news->fetchNewsMonth($year);

    return $result;

}



function fetchContctSubject() {

    $CI = & get_Instance();

    $CI->load->model('model_custom');

    $result = $CI->model_custom->fetchContactSubject();

    return $result;

}



function fetchSubTitle() {

    $CI = & get_Instance();

    $CI->load->model('model_custom');

    $result = $CI->model_custom->fetchSubTitle();

    return $result;

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



function fetchLastupdated($table, $col) {

    $result = '';

    $CI = & get_Instance();

    $CI->load->model('model_custom');

    $lastupdated = $CI->model_custom->fetchLastupdated($table, $col);

    $date = $lastupdated[0]["$col"];

    if (!empty($date) && $date != "0000-00-00 00:00:00") {

        $result = date('d F, Y', strtotime($date));

    }

    return $result;

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



function Right($str, $len = 6) {

    $str = "00000000000" . $str;

    $rest = substr($str, -$len);

    return $rest;

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



function getSpecialOffer() {

    $limit = 1;

    $CI = & get_Instance();

    $CI->load->model('model_products');

    $result = $CI->model_products->specialoffers($limit);

    return $result;

}



function getNewArrival() {

    $limit = 1;

    $CI = & get_Instance();

    $CI->load->model('model_products');

    $result = $CI->model_products->newarrivals($limit);

    return $result;

}





function countCataLogImages($id) {

    $limit = 1;

    $CI = & get_Instance();

    $CI->load->model('model_catalogs');

    $result = $CI->model_catalogs->getgalpics($id);

    return $result;

}



function fetchConfig() {



    $CI = & get_Instance();

    $CI->load->model('model_custom');

    $result = $CI->model_custom->fetchConfig();

    return $result;

}



function getgalpics($id, $gal_module) {

    $CI = & get_Instance();

    $CI->load->model('model_gallery');

    $gallery = $CI->model_gallery->getgalpics($id, $gal_module);

    return $gallery;

}

function pageTitle($id) {

    $CI = & get_Instance();

    $CI->load->model('ems/model_menu');

    $gallery = $CI->model_menu->pageTitle($id);

    return $gallery;

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



function fetchChild($parent_id) {

    $CI = & get_Instance();

    $CI->load->model('ems/catagory_model');

    $result = $CI->catagory_model->fetchChild($parent_id);

    

    return $result;

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



function count_catalog_images($catalog_id) {

    $CI = & get_Instance();

    $CI->load->model('model_catalogs');



    $numOfPic = $CI->model_catalogs->gettotalAlbumpics($catalog_id);

    return $numOfPic;

}



function getLatestProject() {

    $CI = & get_Instance();

    $CI->load->model('model_projects');

    $result = $CI->model_projects->getLatestProject();

    return $result;

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



function getBgPhoto($id, $url) {

    $CI = & get_Instance();



    if ($url == "aboutus") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

        $result = $result->content_photo;

    }

    if ($url == "peopleandcommuinty") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

        $result = $result->content_photo;

    }

    if ($url == "index") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

        $result = $result->content_photo;

    }



    if ($url == "projectcategory") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

        $result = $result->content_photo;

    }



    if ($url == "specialprojects") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

        $result = $result->content_photo;

    }



    if ($url == "projectlist") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'project_categories');

        $result = $result->cat_photo;

    }



    if ($url == "project") {

//            print_r($id);

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'projects');

        $result = $result->project_photo;

//        print_r($result);

    }



    if ($url == "contactus") {

//            print_r($id);

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contact_us');

        $result = $result->contact_photo;

//        print_r($result);

    }



    return $result;

}



function getArbBgPhoto($id, $url) {

    $CI = & get_Instance();



    if ($url == "aboutus") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

        $result = $result->arb_photo;

    }

    if ($url == "peopleandcommuinty") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

        $result = $result->arb_photo;

    }

    if ($url == "index") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

        $result = $result->arb_photo;

    }



    if ($url == "projectcategory") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

        $result = $result->arb_photo;

    }



    if ($url == "specialprojects") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

        $result = $result->arb_photo;

    }



    if ($url == "projectlist") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'project_categories');

        $result = $result->arb_photo;

    }



    if ($url == "project") {

//            print_r($id);

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'projects');

        $result = $result->arb_photo;

//        print_r($result);

    }



    if ($url == "contactus") {

//            print_r($id);

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contact_us');

        $result = $result->arb_photo;

//        print_r($result);

    }



    return $result;

}



function getBlurPhoto($id, $url) {

    $CI = & get_Instance();



    if ($url == "aboutus") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

//        $result= $result->blur_photo;

    }

    if ($url == "peopleandcommuinty") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

//        $result= $result->blur_photo;

    }

    if ($url == "index") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

//        $result= $result->blur_photo;

    }



    if ($url == "projectcategory") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

//        $result= $result->arb_photo;

    }



    if ($url == "projectlist") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'project_categories');

//        $result= $result->blur_photo;

    }



    if ($url == "project") {

//            print_r($id);

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'projects');

//        $result= $result->blur_photo;

//        print_r($result);

    }



    if ($url == "specialprojects") {

//            print_r($id);

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

//        $result= $result->blur_photo;

//        print_r($result);

    }



    if ($url == "contactus") {

//            print_r($id);

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contact_us');

//        $result= $result->blur_photo;

//        print_r($result);

    }



    return $result->blur_photo;

}



function getArbBlurPhoto($id, $url) {

    $CI = & get_Instance();



    if ($url == "aboutus") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

//        $result= $result->blur_photo;

    }

    if ($url == "peopleandcommuinty") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

//        $result= $result->blur_photo;

    }

    if ($url == "index") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

//        $result= $result->blur_photo;

    }



    if ($url == "projectlist") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'project_categories');

//        $result= $result->blur_photo;

    }



    if ($url == "projectcategory") {

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

//        $result= $result->blur_photo;

    }



    if ($url == "project") {

//            print_r($id);

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'projects');

//        $result= $result->blur_photo;

//        print_r($result);

    }



    if ($url == "specialprojects") {

//            print_r($id);

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contents');

//        $result= $result->blur_photo;

//        print_r($result);

    }



    if ($url == "contactus") {

//            print_r($id);

        $CI->load->model('model_custom');

        $result = $CI->model_custom->getPagePhoto($id, 'contact_us');

//        $result= $result->blur_photo;

//        print_r($result);

    }



    return $result->arb_blur_photo;

}



function getNextProject($id, $cid) {

//       print_r("sssssssss".$id);

//       exit;

//       $pid =$id;

    $CI = & get_Instance();

    $CI->load->model('model_project');

    $result = $CI->model_project->getNextProject($id, $cid);

//                print_r($result->id);

    if (!$result) {

//                print_r("empty");

    } else {

//                print_r($result->id);

        return $result->id;

//              exit;

    }

}



function getPreviousProject($id, $cid) {

    $CI = & get_Instance();

    $CI->load->model('model_project');

    $result = $CI->model_project->getPreviousProject($id, $cid);

    if (!$result) {

//                print_r("empty");

    } else {

//                print_r($result->id);

        return $result->id;

//              exit;

    }

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



function get_selected($what,$match) {

 

 if($what == $match){

      return 'selected';

 }else{

   return '';

 }

 

}



function manage($p_cid=0,$space='') {

      



         $q="SELECT * FROM catagory WHERE status = 1 && parent_id='$p_cid'";  

         $r=mysql_query($q) or die(mysql_error());  

         $count=mysql_num_rows($r);  

         if($p_cid==0){  

               $space='';  

         }else{  

               $space .='&nbsp &nbsp &nbsp &nbsp &nbsp';  

         }  

        if($count > 0){  

      

        while($row=mysql_fetch_array($r)){  

       // $html .= "<option value=''".$row['parent_id']."'='>".$space.$row['eng_title']."</option>";  

          

          echo '<tr class="odd" id="id_'.$row["id"].'" onclick="javascript:highlight('.$row["id"].');">

            <td  class="black_bar" id="bar_'.$row["id"].'">'.$i.'</td>

            <td class="table_row">'.$space.$row["eng_title"].'</td>                                

            <td class="table_row" style="border-right:#000 0px solid">

             '.get_grid_status($row["id"], $row["pub_status"]).'

                                </td>                    

                            </tr>' ;

       manage($row['id'],$space);  

       // $this->i = $this->i +1;

    }  

      

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



function calculateAnswerPercentage($que_id,$var_ans_id, $sur_id,$raw=false) {

//  $sur = $this->loadSurvey();

  // Firstly, we need to find out how many times answers appear for this question..

  $query = mysql_query("SELECT count(*) AS a_count FROM variants 

                        WHERE var_que_id  = '$que_id' 

                        AND var_sur_id    = '".$sur_id."'

                        ");

  $count = mysql_fetch_object($query);

  // Now set the maximum amount..this is 100%..

  $MAX = $count->a_count;

  // Now find out how many times this variant has been specified as an answer to this question..

  $query2 = mysql_query("SELECT count(*) AS v_count FROM variants 

                         JOIN answers ON answers.ans_id = variants.var_ans_id

                         WHERE var_que_id  = '$que_id' 

                         AND var_ans_id    = '$var_ans_id' 

                         AND var_sur_id    = '".$sur_id."'

                         ");

  $count2 = mysql_fetch_object($query2);

  // Set the count for this variant..

  $VAR_COUNT = $count2->v_count;

//    exit();

  // Return percentage and amount of votes..

  // Percentage shown as 1 decimal place..

  // For raw data, no symbol..

  if ($raw) { 

    return ($VAR_COUNT>0 && $MAX>0 ? ($VAR_COUNT/$MAX * 100) : '0');

  } else {

    if ($VAR_COUNT>0 && $MAX>0) {

      $percentage = ($VAR_COUNT/$MAX * 100);

      return number_format($percentage,1).'% '.$var_ans_id.' '.$que_id.' ('.number_format($VAR_COUNT).')';;

//      return number_format($percentage,1).'% ('.number_format($VAR_COUNT).')';

    } else {

      return '0% '.$var_ans_id.' '.$que_id.' ('.number_format($VAR_COUNT).')';;

    }

  }

}

function ureadMessage($user_id)

{

	$CI = & get_Instance();

    $CI->load->model('registration_model');

    $result = $CI->registration_model->getunreadmessage($user_id);

    if ($result) {

		return $result;

    } else {

//                print_r($result->id);

        return '0';

//              exit;

    }
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


 function menus( $root_id = 0,$page_id)
        { 
		
		
			  $CI = & get_Instance();
			  $html  = array(); 
			  $lang  = $CI->session->userdata('lang');
	
              $CI->load->model('ems/model_menu');
          
		      $sql = $CI->model_menu->header_menu(($root_id > 0) ? $root_id:'');
	  
             foreach ($sql as $item )
		
                        $children[$item['parent_id']][] = $item;
						
        
                // loop will be false if the root has no children (i.e., an empty menu!)
                $loop = !empty( $children[$root_id] );
              
                // initializing $parent as the root
                $parent = $root_id;
                $parent_stack = array();
               
                // HTML wrapper for the menu (open)
				
				$home = ($CI->session->userdata('lang') == 'eng') ? 'Home' : 'الرئيسية';
                $html[] = '<ul>
				<li '.apply_class(1,$page_id).'><a href="'.$CI->config->item('base_url').'">
				<span>'.$home.'</span></a></li>';
               
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
										<a href="'.$CI->config->item('base_url').'content/index/%2$s"><span>%3$s</span></a>',
										
                                        $tab,   // %1$s = tabulation
      remove_space($option['value']['eng_content_title']).'/'.$option['value']['id'],// %2$s = link (URL)
                                        ($CI->session->userdata('lang') == 'eng') ? $option['value']['eng_content_title'] : $option['value']['arb_content_title']   // %3$s = title
                                );
                              
							     $html[] = $tab . "\t" . '<ul id="sub">';
                               
                                array_push( $parent_stack, $option['value']['parent_id'] );
                                  $parent = $option['value']['id'];
								   
                        }
                        else
                            
							    // HTML for menu item with no children (aka "leaf")
                                $html[] = sprintf(
                    '<li '.apply_class($option['value']['id'],$page_id).' id="list_'.$option['value']['id'].'">
					<a href="'.$CI->config->item('base_url').'content/index/%2$s"><span>%3$s</span></a></li>',
                                        str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ),   // %1$s = tabulation
                                       remove_space($option['value']['eng_content_title']).'/'.$option['value']['id'],   // %2$s = link (URL)
                                        ($CI->session->userdata('lang') == 'eng') ? $option['value']['eng_content_title'] : $option['value']['arb_content_title']   // %3$s = title
                                );
                }
               
                // HTML wrapper for the menu (close)
                $html[] = '</ul>
				';
				  
		
                return implode( "\r\n", $html );
        }
		
function remove_space($item){
	
	return strtolower(str_replace(' ','_',strtolower($item)));
}


function listing_view($page_id){
	
	$CI = & get_Instance();

    $CI->load->model('model_contents');
	
		
			 
			$data = '<ul class="projects-list">';
                      foreach($CI->model_contents->front_end_content($page_id) as $val){  
			 $title =  ($CI->session->userdata('lang') =='eng' ? $val->eng_content_title : $val->arb_content_title);
					  
            $data .= ' <li><a href="'.base_url().'content/detail/'.$val->id.'">'.$title.'</a></li>';
              
				 }
           $data .= '</ul>';
		   
		   return $data;
			 
	
}

function contact_form(){
	$CI = & get_Instance();
  return  '<form enctype="multipart/form-data" action="'.$CI->config->item('base_url').'content/submit" method="post" class="cform contact " id="cformsform">
                    	<div class="contact-row">
                        	<div class="contact-left">
                            	<label>'.($CI->session->userdata('lang') == 'eng' ? 'Name':'الاسم').'</label>
                                <input type="text" name="name" required="">
                            </div>
                        	<div class="contact-right">
                            	<label>'.($CI->session->userdata('lang') == 'eng' ? 'Email':'البريد الالكتروني').'</label>
                                <input type="email" name="email" required="">
                            </div>
                        </div>
                    	<div class="contact-row">
                        	<div class="contact-left">
                            	<label>'.($CI->session->userdata('lang') == 'eng' ? 'Subject':'الغرض من الرساالة').'</label>
                                <input type="text" name="subject" required="">
                            </div>
                        	<div class="contact-right">
                            	<label>'.($CI->session->userdata('lang') == 'eng' ? 'Phone Number':'الجوال').'</label>
                                <input type="tel" name="phone" required="">
                            </div>
                        </div>
                    	<div class="contact-row">
                        	<label>'.($CI->session->userdata('lang') == 'eng' ? 'Message':'الرسالة').'</label>
                            <textarea name="message"></textarea>
                        </div>
                    	<div class="contact-row">
                        	<div class="captcha-div">
                            	 <script src="https://www.google.com/recaptcha/api.js"></script>
                                <div class="g-recaptcha" data-sitekey="6Ld5EgUTAAAAADhysBpc4it2JyXC4hiSE9FAQgvq"><div><div style="width: 304px; height: 78px;"><iframe src="https://www.google.com/recaptcha/api2/anchor?k=6Ld5EgUTAAAAADhysBpc4it2JyXC4hiSE9FAQgvq&amp;co=aHR0cDovL25lc21hd2FlLmNvbTo4MA..&amp;hl=en&amp;v=r20160105165243&amp;size=normal&amp;cb=w30t5rjtr0k8" title="recaptcha widget" width="304" height="78" role="presentation" frameborder="0" scrolling="no"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea></div></div>
                             </div><div class="submit-btn"><input type="submit" name="submit" id="sendbutton" value ="'.($CI->session->userdata('lang') == 'eng' ? 'Send':'إرسال رسالة').'" onclick="return cforms_validate(\'\', false)" ></div>
                        </div>
                    </form>';	
	
}

function map(){

return '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1502.3555707945898!2d39.1104135!3d21.6553355!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d975b3fe3c9d%3A0x2bb1ed01707be831!2sSUMOU%2C+King+Abdul+Aziz+Rd%2C+Ash+Shati%2C+Jeddah+23613!5e1!3m2!1sen!2ssa!4v1427888195044" width="100%" height="100%"></iframe>';	
	
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