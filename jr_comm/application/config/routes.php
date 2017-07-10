<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "page/index";
$route['404_override'] = '';
$route['page/getFilteredNews'] = "page/getFilteredNews";
$route['page/submit'] = "page/submit";
$route['page/getCategory'] = "page/getCategory";
$route['page/search'] = "page/search";


$route['page/login'] = "page/login";
$route['page/forgot_password'] = "page/forgot_password";
$route['page/logged_in'] = "page/logged_in";
$route['page/recoverPassword'] = "page/recoverPassword";
$route['logout'] = "logout/index";

$route['page/postCalculatorData'] = "page/postCalculatorData";


$route['page/career_detail/(:num)'] = "page/career_detail/$1";
$route['page/applyforjob/(:num)'] = "page/applyforjob/$1";
$route['page/save_job'] = "page/save_job";
$route['page/find_position'] = "page/find_position";
$route['page/career_message'] = "page/career_message";
$route['page/cities'] = "page/cities";
$route['page/cities_select'] = "page/cities_select";
$route['ajax/getBranches'] = "ajax/getBranches";
$route['ajax/getBranchInfo'] = "ajax/getBranchInfo";

$route['ajax/save'] = "ajax/save";


$route['page/news_detail/(:num)'] = "page/news_detail/$1";
$route['page/company_detail/(:num)'] = "page/company_detail/$1";
$route['page/project_detail/(:num)'] = "page/project_detail/$1";
$route['page/industory_detail/(:num)'] = "page/industory_detail/$1";
$route['page/csr_event_detail/(:num)'] = "page/csr_event_detail/$1";
$route['page/album_detail/(:num)'] = "page/album_detail/$1";
$route['page/hotel_detail/(:num)'] = "page/hotel_detail/$1";
$route['page/getProduct'] = "page/getProduct";
$route['page/SaveQuote'] = "page/SaveQuote";
$route['page/subCategories/(:num)'] = "page/subCategories";

$route['page/detail/(:any)'] = "page/detail";
$route['page/preview/(:num)'] = "page/preview/$1";
$route['page/(:any)'] = "page/index";
$route['ems'] = "ems/index";


$route['ar'] = 'page/index';
$route['ar/page/submit'] = "page/submit";
$route['ar/page/postCalculatorData'] = "page/postCalculatorData";
$route['ar/page/getCategory'] = "page/getCategory";
$route['ar/page/search'] = "page/search";
$route['ar/ajax/getBranches'] = "ajax/getBranches";
$route['ar/ajax/getBranchInfo'] = "ajax/getBranchInfo";
$route['ar/ajax/save'] = "ajax/save";

$route['ar/page/career_detail/(:num)'] = "page/career_detail/$1";
$route['ar/page/applyforjob/(:num)'] = "page/applyforjob/$1";
$route['ar/page/save_job'] = "page/save_job";
$route['ar/page/find_position'] = "page/find_position";
$route['ar/page/career_message'] = "page/career_message";
$route['ar/page/cities'] = "page/cities";
$route['ar/page/cities_select'] = "page/cities_select";

$route['ar/page/login'] = "page/login";
$route['ar/page/forgot_password'] = "page/forgot_password";
$route['ar/page/logged_in'] = "page/logged_in";
$route['ar/page/recoverPassword'] = "page/recoverPassword";
$route['ar/logout'] = "logout/index";


$route['ar/page/news_detail/(:num)'] = "page/news_detail/$1";
$route['ar/page/company_detail/(:num)'] = "page/company_detail/$1";
$route['ar/page/project_detail/(:num)'] = "page/project_detail/$1";
$route['ar/page/industory_detail/(:num)'] = "page/industory_detail/$1";
$route['ar/page/csr_event_detail/(:num)'] = "page/csr_event_detail/$1";
$route['ar/page/album_detail/(:num)'] = "page/album_detail/$1";
$route['ar/page/hotel_detail/(:num)'] = "page/hotel_detail/$1";
$route['ar/page/getProduct'] = "page/getProduct";
$route['ar/page/SaveQuote'] = "page/SaveQuote";
$route['ar/page/subCategories/(:num)'] = "page/subCategories";
$route['ar/page/detail/(:any)'] = "page/detail";
$route['ar/page/preview/(:num)'] = "page/preview/$1";
$route['ar/page/(:any)'] = "page/index";
$route['ar/ems'] = "ems/index";

/* End of file routes.php */
/* Location: ./application/config/routes.php */