<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function getsubid($id) {

    $CI = & get_Instance();
    $CI->load->model('model_products');
    $result = $CI->model_products->getcategurl($id);
    $data = $result[0]['id'];
    return $data;
}

function gallerydescription($id) {

    $CI = & get_Instance();
    $CI->load->model('model_gallery');
    $result = $CI->model_gallery->galleryname($id);
    $data = $result[0]['eng_gal_desc'];
    return $data;
}

function heritageItem($id) {

    $CI = & get_Instance();
    $CI->load->model('model_heritage');
    $result = $CI->model_heritage->fetchrow($id);
    return $result;
}

function page_preview($page) {

    if ($page == 'team') {
        $res = 'team';
    }
    if ($page == 'entities') {
        $res = 'entities';
    }

    if ($page == 'enquiry') {
        $res = 'enquiry';
    }
    if ($page == 'board_members') {
        $res = 'board_members';
    }
    if ($page == 'sharia') {
        $res = 'sharia';
    }

    if ($page == 'investmentPhilosophy') {
        $res = 'investmentPhilosophy';
    }

    if ($page == 'privacy_policy') {
        $res = 'privacy_policy';
    }
    if ($page == 'termsandcondtions') {
        $res = 'terms_and_conditions';
    }
    if ($page == 'services') {
        $res = 'services';
    }
    if ($page == 'awards') {
        $res = 'awards';
    }
    if ($page == 'sharia') {
        $res = 'sharia';
    }
    return $res;
}

function getpressfiles($id) {

    $CI = & get_Instance();
    $CI->load->model('model_press_releases');
    $result = $CI->model_press_releases->fetchfileslimit($id);
    if ($result)
        return $result->press_file;
    else
        return false;
//	return $result;
}

function partnershipItem($id) {

    $CI = & get_Instance();
    $CI->load->model('model_partnership');
    $result = $CI->model_partnership->fetchrow($id);
    return $result;
}

function socialLink() {

    $CI = & get_Instance();
    $CI->load->model('ems/model_social');
    $result = $CI->model_social->fetchcol($social);
    return $result;
}

function gallerydescription_ar($id) {

    $CI = & get_Instance();
    $CI->load->model('model_gallery');
    $result = $CI->model_gallery->galleryname($id);
    $data = $result[0]['arb_gal_desc'];
    return $data;
}

function galleryname($id) {

    $CI = & get_Instance();
    $CI->load->model('model_gallery');
    $result = $CI->model_gallery->galleryname($id);
    $data = $result[0]['eng_gal_title'];
    return $data;
}

function galleryname_ar($id) {

    $CI = & get_Instance();
    $CI->load->model('model_gallery');
    $result = $CI->model_gallery->galleryname($id);
    $data = $result[0]['arb_gal_title'];
    return $data;
}

function gallerylocation($id) {

    $CI = & get_Instance();
    $CI->load->model('model_gallery');
    $result = $CI->model_gallery->gallerylocation($id);
    $data = $result[0]['location'];
    return $data;
}

function gallerylocation_ar($id) {

    $CI = & get_Instance();
    $CI->load->model('model_gallery');
    $result = $CI->model_gallery->gallerylocation($id);
    $data = $result[0]['location_ar'];
    return $data;
}

function getTableProducts($id) {

    $CI = & get_Instance();
    $CI->load->model('model_products');
    $result = $CI->model_products->getTableProduct($id);

    return $result;
}

function getTableServices($id) {

    $CI = & get_Instance();
    $CI->load->model('model_services');
    $result = $CI->model_services->getTableProduct($id);

    return $result;
}

function checkAdminSession() {

    $CI = & get_Instance();
    if ($CI->session->userdata('logged_in') == FALSE && $CI->session->userdata('id') == '') {
        redirect($CI->config->item('base_url') . 'ems/admin_login/');
    }
}

function getmaincategtitle($id) {

    $CI = & get_Instance();
    $CI->load->model('model_products');
    $result = $CI->model_products->maincategname($id);

    return $result;
}

function getmaincategtitle_ar($id) {

    $CI = & get_Instance();
    $CI->load->model('ar/model_products');
    $result = $CI->model_products->maincategname($id);

    return $result;
}

function getmainservicetitle($id) {

    $CI = & get_Instance();
    $CI->load->model('model_services');
    $result = $CI->model_services->maincategname($id);

    return $result;
}

function get_prod_image($prdid) {

    $CI = & get_Instance();
    $CI->load->model('ems/model_welcome');
    $result = $CI->model_welcome->getproduct_details($prdid);

    return $result;
}

function getsubcategimages($id) {

    $CI = & get_Instance();
    $CI->load->model('model_products');
    $result = $CI->model_products->getsubcategimages($id);

    return $result;
}

function getpartnerimages($id) {

    $CI = & get_Instance();
    $CI->load->model('model_partners');
    $result = $CI->model_partners->getsubcategimages($id);

    return $result;
}

function getservicesimages($id) {

    $CI = & get_Instance();
    $CI->load->model('model_services');
    $result = $CI->model_services->getsubcategimages($id);

    return $result;
}

function getsubcategories($id) {

    $CI = & get_Instance();
    $CI->load->model('model_products');
    $result = $CI->model_products->getproduct_categ($id);

    return $result;
}

function getsubcategories_ar($id) {

    $CI = & get_Instance();
    $CI->load->model('ar/model_products');
    $result = $CI->model_products->getproduct_categ($id);

    return $result;
}

function getservicecategories($id) {

    $CI = & get_Instance();
    $CI->load->model('model_services');
    $result = $CI->model_services->getservicecategories($id);

    return $result;
}

function getsubcategoriesonerow($id) {

    $CI = & get_Instance();
    $CI->load->model('model_products');
    $result = $CI->model_products->getproduct_categ_one_row($id);

    return $result;
}

function getservicelocationsonerow($id) {

    $CI = & get_Instance();
    $CI->load->model('model_services');
    $result = $CI->model_services->getproduct_categonerow($id);

    return $result;
}

function getservicelocations($id) {

    $CI = & get_Instance();
    $CI->load->model('model_services');
    $result = $CI->model_services->getproduct_categ($id);

    return $result;
}

function getimagename($image_name) {

    $file_thumb = $image_name;
    $wordlist = "_thumb";
    $raw = preg_replace("/($wordlist)/ie", "", $file_thumb);
    return $raw;
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

function getpageid($id) {

    $CI = & get_Instance();
    $CI->load->model('model_about');
    $result = $CI->model_about->getpageid($id);
    return $result;
}

function gettitle($page) {

    $CI = & get_Instance();
    $CI->load->model('model_about');
    $result = $CI->model_about->getpagetitle($page);
    return $result;
}

function getdesc($page) {

    $CI = & get_Instance();
    $CI->load->model('model_about');
    $result = $CI->model_about->getpagedesc($page);
    return $result;
}

function gettitle_ar($page) {

    $CI = & get_Instance();
    $CI->load->model('ar/model_about');
    $result = $CI->model_about->getpagetitle($page);

    return $result;
}

function getdesc_ar($page) {

    $CI = & get_Instance();
    $CI->load->model('ar/model_about');
    $result = $CI->model_about->getpagedesc($page);
    return $result;
}

function getimage($page) {

    $CI = & get_Instance();
    $CI->load->model('model_about');
    $result = $CI->model_about->getpageimage($page);
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
    $role = @$result[0]['eng_grp_title'];
    return $role;
}

function getsiteTitle($id) {

    $CI = & get_Instance();
    $CI->load->model('ems/model_dashboard');
    $result = $CI->model_dashboard->getRec($id);
    $role = $result[0]['site_title'];

    return $role;
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
    $CI->load->model('ems/model_cmsingroups');
    $result = $CI->model_cmsgroups->check_userlevel2db();

    return $result;
}

function check_userlevel3($secid) {


    $CI = & get_Instance();
    $CI->load->model('ems/model_cmsingroups');
    $result = $CI->model_cmsingroups->check_userlevel3db($secid);

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
     
     <td width="120"  class="text_table_space "><div class="squaredtwo"><input value="none" type="checkbox" name="read" id="read" /><label for="read"></label></div> <div style="float:left; border:1px solid #ff000;margin-left:8px;">Read</div></td>
     
     <td width="120"  class="text_table_space"><div class="squaredtwo"><input value="none" type="checkbox" name="update" id="update"  /><label for="update"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;"> Update</div></td>
     
     <td width="120"  class="text_table_space "><div class="squaredtwo"><input value="none" type="checkbox" name="delete" id="delete" /><label for="delete"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Delete</div></td>
     
     <td width="120"  class="text_table_space "><div class="squaredtwo"><input value="none" type="checkbox" name="publish" id="publish" /><label for="publish"></label></div><div style="float:left; border:1px solid #ff000;margin-left:8px;">Publish</div></td>
     
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
											 <input type="checkbox"  value="1" ' . $read . ' disabled="disabled" id="read_main"/><label for="read_main"></label></div>
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

function calculate_grp_users($id) {

    $CI = & get_Instance();
    $CI->load->model('ems/model_cmsingroups');
    $result = $CI->model_cmsingroups->calculate_grp_users_db($id);
    $num = sizeof($result);
//	$num=$num-1;

    if ($num > 0) {
        return $num;
    } else {
        return 0;
    }
}

function get_section_id() {
    $CI = & get_Instance();
    $module = $CI->uri->segment(2);

    if ($module == 'aboutUs') {
        return 1;
    }
    if ($module == 'ceoMessage') {
        return 2;
    }
    if ($module == 'boardMembers' || $module == 'boardmembers') {
        return 3;
    }
    if ($module == 'team') {
        return 4;
    }
    if ($module == 'awards') {
        return 5;
    }
    if ($module == 'entities') {
        return 6;
    }
    if ($module == 'investmentPhilosophy') {
        return 7;
    }
    if ($module == 'conferences') {
        return 8;
    }
    if ($module == 'pressreleases') {
        return 9;
    }
    if ($module == 'services') {
        return 10;
    }
    if ($module == 'news') {
        return 11;
    }
    if ($module == 'contactus' || $module == 'contactUs') {
        return 13;
    }
    if ($module == 'pages') {
        return 20;
    }
    if ($module == 'heritage') {
        return 21;
    }
    if ($module == 'partnership') {
        return 22;
    }
     if ($module == 'social') {
        return 23;
    }
}

function top_navigation_pages() {

    $CI = & get_Instance();
    $module = $CI->uri->segment(2);
    $secid = get_section_id();
    $chresult = check_userlevel3($secid);

    $cr = $chresult[0]['grp_sec_create'];
    $r = $chresult[0]['grp_sec_read'];
    $u = $chresult[0]['grp_sec_update'];
    $d = $chresult[0]['grp_sec_delete'];
    $pu = $chresult[0]['grp_sec_pub'];

    if ($u == 1) {
        $htm2.='<li style="z-index:100; left:51%"><a id="edit">Edit</a></li>';
    } else {
        $htm2.='<li style="z-index:100; left:51%"><a href="javascript:alert_user();">Edit</a></li>';
    }
    return $htm2;
}

function top_navigation() {

    $CI = & get_Instance();
    $module = $CI->uri->segment(2);
    $secid = get_section_id();
    $chresult = check_userlevel3($secid);

    $cr = $chresult[0]['grp_sec_create'];
    $r = $chresult[0]['grp_sec_read'];
    $u = $chresult[0]['grp_sec_update'];
    $d = $chresult[0]['grp_sec_delete'];
    $pu = $chresult[0]['grp_sec_pub'];

    if ($cr == 1) {
        $htm2.='<li style="z-index:99;"><a href="ems/' . $module . '/add">Add</a></li>';
    } else {
        $htm2.='<li style="z-index:99"><a href="javascript:alert_user()">Add</a></li>';
    }
    if ($u == 1) {
        $htm2.='<li style="z-index:100; left:25%"><a id="edit">Edit</a></li>';
    } else {
        $htm2.='<li style="z-index:100; left:25%"><a href="javascript:alert_user();">Edit</a></li>';
    }
    if ($d == 1) {
        $htm2.='<li style="z-index:200; left:50%"><a id="delete">Delete</a></li>';
    } else {

        $htm2.='<li style="z-index:200; left:50%"><a href="javascript:alert_user();">Delete</a></li>';
    }
    return $htm2;
}

function top_navigation_no_delete() {

    $CI = & get_Instance();
    $module = $CI->uri->segment(2);
    $secid = get_section_id();
    $chresult = check_userlevel3($secid);

    $cr = $chresult[0]['grp_sec_create'];
    $r = $chresult[0]['grp_sec_read'];
    $u = $chresult[0]['grp_sec_update'];
    $d = $chresult[0]['grp_sec_delete'];
    $pu = $chresult[0]['grp_sec_pub'];

//	if($cr==1){
//		$htm2.='<li style="z-index:99;"><a href="ems/'.$module.'/add">Add</a></li>';
//	}else{
//		$htm2.='<li style="z-index:99"><a href="javascript:alert_user()">Add</a></li>';
//	}
    if ($u == 1) {
        $htm2.='<li style="z-index:100; left:50%"><a id="edit">Edit</a></li>';
    } else {
        $htm2.='<li style="z-index:100; left:50%"><a href="javascript:alert_user();">Edit</a></li>';
    }
//	if($d==1){
//		$htm2.='<li style="z-index:200; left:50%"><a id="delete">Delete</a></li>';
//	}else{
//
//		$htm2.='<li style="z-index:200; left:50%"><a href="javascript:alert_user();">Delete</a></li>';
//
//	}
    return $htm2;
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
    //	echo $module.$comments;
    $CI = & get_Instance();
    $CI->load->model('ems/model_log');
    if ($module == 'aboutUs') {
        $module = "About Us";
    }
    if ($module == 'ceoMessage' || $module == 'ceomessage') {
        $module = "CEO Message";
    }
    if ($module == 'boardMembers' || $module == 'boardmembers') {
        $module = "Board Members";
    }
    if ($module == 'team') {
        $module = "Our Team";
    }
    if ($module == 'awards') {
        $module = "Awards";
    }
    if ($module == 'entities') {
        $module = "Entities";
    }

    if ($module == 'investmentPhilosophy') {
        $module = "Investment Philosophy";
    }
    if ($module == 'pressreleases') {
        $module = "Press Releases";
    }
    if ($module == 'conferences') {
        $module = "Conferences";
    }
    if ($module == 'contactUs' || $module == 'contactus') {
        $module = "Contact Us";
    }
    if ($module == 'careerVacancies') {
        $module = "Job Openings";
    }
    if ($module == 'careerCandidates') {
        $module = "Career Candidates";
    }

    if ($module == 'services') {
        $module = "services";
    }
    if ($module == 'news') {
        $module = "News";
    }
    if ($module == 'meta') {
        $module = "Meta Keywords";
    }
    if ($module == 'statistics') {
        $module = "Statistics";
    }
    if ($module == 'cmsInUsers') {
        $module = "Cms Users";
    }
    if ($module == 'cmsInnGroups') {
        $module = "Cms Groups";
    }
    if ($module == 'Inlog') {
        $module = "Log";
    }
    if ($module == 'pages') {
        $module = "Pages";
    }
    if ($module == 'heritage') {
        $module = "Heritage";
    }
    if ($module == 'partnership') {
        $module = "Partnership";
    }
    if ($module == 'social') {
        $module = "social";
    }

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

function last_logged_change() {
    $CI = & get_Instance();
    $module = $CI->uri->segment(2);
    if ($module == 'aboutUs' || $module == 'aboutus') {
        $module = "About Us";
    }
    if ($module == 'ceoMessage' || $module == 'ceomessage') {
        $module = "CEO Message";
    }
    if ($module == 'boardMembers' || $module == 'boardmembers') {
        $module = "Board Members";
    }
    if ($module == 'team') {
        $module = "Our Team";
    }
    if ($module == 'awards') {
        $module = "Awards";
    }
    if ($module == 'entities') {
        $module = "Entities";
    }

    if ($module == 'investmentPhilosophy') {
        $module = "Investment Philosophy";
    }
    if ($module == 'pressReleases') {
        $module = "PressReleases";
    }
    if ($module == 'conferences') {
        $module = "Conferences";
    }
    if ($module == 'contactUs' || $module == 'contactus') {
        $module = "Contact Us";
    }
    if ($module == 'careerVacancies') {
        $module = "Career Vacancies";
    }
    if ($module == 'careerCandidates') {
        $module = "Career Candidates";
    }

    if ($module == 'services') {
        $module = "Services";
    }
    if ($module == 'news') {
        $module = "news";
    }
    if ($module == 'meta') {
        $module = "Meta Keywords";
    }
    if ($module == 'statistics') {
        $module = "Statistics";
    }
    if ($module == 'cmsInUsers') {
        $module = "Cms Users";
    }
    if ($module == 'cmsInnGroups') {
        $module = "Cms Groups";
    }
    if ($module == 'Inlog') {
        $module = "Log";
    }
    if ($module == 'pages') {
        $module = "pages";
    }
    if ($module == 'heritage') {
        $module = "Heritage";
    }
    if ($module == 'partnership') {
        $module = "Partnership";
    }
    if ($module == 'social') {
        $module = "social";
    }
    $CI->load->model('ems/model_log');
    $result = $CI->model_log->last_log_data($module);
    if ($result) {
        return date('d F, Y', strtotime($result[0]['log_date']));
    } else {
        return '';
    }
}
