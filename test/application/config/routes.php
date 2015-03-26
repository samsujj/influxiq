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

$route['default_controller'] = "home";
$route['404_override'] = '';


/*------------------- Site routing[start] ------------------------*/


$route['login'] = "home/login";

// fe routing
$route['about-us'] = "common/about_us";
$route['company'] = "common/company";
$route['contact-us'] = "common/contact_us";
$route['terms-and-conditions'] = "common/terms_and_conditions";
$route['refund-policy'] = "common/refund_policy";
$route['login'] = "home/login";



// Nu MLM routing [start]

$route[ADMIN_FOLDER.'/blog/add-reply/(:any)'] = ADMIN_FOLDER."/blog/add/$1";

$route[ADMIN_FOLDER.'/settings'] = ADMIN_FOLDER."/common/settings";
$route[ADMIN_FOLDER.'/banner'] = ADMIN_FOLDER."/common/banner";
$route[ADMIN_FOLDER.'/banner/(:any)'] = ADMIN_FOLDER."/common/banner/$1";

// User redirection [start]
//$route[ADMIN_FOLDER."/home/login"] = ADMIN_FOLDER;
$route[ADMIN_FOLDER] = ADMIN_FOLDER."/home/index";
$route[ADMIN_FOLDER."/gallery/(:num)/listing"]=ADMIN_FOLDER."/gallery/listing/$1";
//$route[ADMIN_FOLDER.'/login'] = ADMIN_FOLDER."/home/login";
$route[ADMIN_FOLDER.'/login'] = ADMIN_FOLDER."/home/login";
$route[ADMIN_FOLDER.'/logout'] = ADMIN_FOLDER."/home/logout";
$route[ADMIN_FOLDER.'/home/(:any)/sendmail'] = ADMIN_FOLDER."/home/sendmail/$1";
$route[ADMIN_FOLDER.'/home/(:any)/changepwd'] = ADMIN_FOLDER."/home/changepwd/$1";
// common redirection [end]


// User redirection [start]
$route[ADMIN_FOLDER.'/user/(:any)/listing'] = ADMIN_FOLDER."/user/listing/$1";
$route[ADMIN_FOLDER.'/user/(:any)/edit'] = ADMIN_FOLDER."/user/edit/$1";
$route[ADMIN_FOLDER.'/user/(:any)/edit-account'] = ADMIN_FOLDER."/user/edit_account/$1";

$route[ADMIN_FOLDER.'/model/(:any)/listing'] = ADMIN_FOLDER."/model/listing/$1";          
$route[ADMIN_FOLDER.'/model/(:any)/edit'] = ADMIN_FOLDER."/model/edit/$1";

//$route[ADMIN_FOLDER.'/affiliate/(:any)/edit'] = ADMIN_FOLDER."/affiliate/edit/$1";
//$route[ADMIN_FOLDER.'/user/(:any)/edit-account'] = ADMIN_FOLDER."/user/edit_account/$1";

// User redirection [end]

// Nu MLM routing [end]

/*------------------- Site routing[end] ------------------------*/

/* End of file routes.php */
/* Location: ./application/config/routes.php */