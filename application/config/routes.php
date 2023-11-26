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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['sign-in'] = 'Home/sign_in';
$route['sign-up'] = 'Home/sign_up';
$route['new-merchant'] = 'Home/add_new_merchant';

$route['login'] = 'Login/user_login';
$route['logout'] = 'Login/user_logout';

$route['dashboard'] = 'Dashboard/index';
$route['billing'] = 'Dashboard/billing';
$route['onboarding'] = 'Dashboard/onboarding';
$route['staffing'] = 'Dashboard/staffing';
$route['new-staff'] = 'Dashboard/new_staff';
$route['settings'] = 'Dashboard/onboarding';
$route['merchant-onboard'] = 'Dashboard/merchant_onboard';

$route['itemwise-sales'] = 'Dashboard/item_wise_sales';
$route['billwise-sales'] = 'Dashboard/bill_wise_sales';
$route['daywise-sales'] = 'Dashboard/day_wise_sales';

$route['IWS-reporter'] = 'Dashboard/IWS_reporter';
$route['BWS-reporter'] = 'Dashboard/BWS_reporter';
$route['DWS-reporter'] = 'Dashboard/DWS_reporter';


$route['messages'] = 'Home/messages';

$route['activate/(:any)/(:any)'] = 'Home/account_activate/$1/$2';
