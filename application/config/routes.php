<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard'] = 'main/index';
$route['login'] = 'login/login';
$route['logout'] = 'login/logout';
$route['check_credential'] = 'login/submit';
$route['lemari/(:any)'] = 'main/toolbox/$1';
$route['reset/(:any)'] = 'admin/reset/$1';
$route['users'] = 'admin/account_manager';
$route['get_json_users'] = 'admin/get_json_users';
$route['username_check'] = 'admin/username_check';
$route['reusername_check'] = 'admin/reusername_check';
$route['get_user'] = 'admin/get_user';
$route['insert_user'] = 'admin/insert_user';
$route['update_user/(:any)'] = 'admin/update_user/$1';
$route['delete_user/(:any)'] = 'admin/delete_user/$1';
$route['history'] = 'main/history';
$route['get_json_history/(:any)'] = 'main/get_json_history/$1';
$route['action'] = 'main/action';
$route['out'] = 'main/ambil';
$route['in'] = 'main/taruh';
$route['export/history.xlsx'] = 'main/export_history';
$route['export/user.xlsx'] = 'admin/export_user';