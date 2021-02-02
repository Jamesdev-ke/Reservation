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
$route['default_controller'] = 'main';
$route['home'] = 'main';
$route['client-profile'] = 'main/client_profile';
$route['edit-profile'] = 'main/edit_profile';
$route['client-bookings/(:any)/(:any)'] = 'main/client_bookings/$1/$2';
$route['add-booking/(:any)'] = 'main/add_booking/$1';
$route['admin-login'] = 'main/admin_login';
$route['client-login'] = 'main/client_login';
$route['client-register'] = 'main/client_register';
$route['client-forgot-password'] = 'main/client_forgot_password';
$route['client-reset-password'] = 'main/client_reset_password';
$route['bookings/(:any)/(:any)'] = 'main/bookings/$1/$2';
$route['clients/(:any)/(:any)'] = 'main/clients/$1/$2';
$route['rooms/(:any)/(:any)'] = 'main/rooms/$1/$2';
$route['room-details/(:any)'] = 'main/room_details/$1';
$route['add-review/(:any)'] = 'main/add_review/$1';
$route['add-room'] = 'main/add_room';
$route['reports'] = 'main/reports';
$route['users/(:any)/(:any)'] = 'main/users/$1/$2';
$route['add-user'] = 'main/add_user';
$route['user-logs/(:any)/(:any)'] = 'main/user_logs/$1/$2';
$route['config'] = 'main/config';
$route['access-denied'] = 'main/access_denied';
$route['process-login'] = 'main/process_login';//process
$route['new-client'] = 'main/new_client';//process
$route['process-forgot-password'] = 'main/process_forgot_password';//process
$route['process-reset-password'] = 'main/process_reset_password';//process
$route['client-logout'] = 'main/client_logout';//process
$route['admin-logout'] = 'main/admin_logout';//process
$route['star-item'] = 'main/star_item';//process
$route['new-user'] = 'main/new_user';//process
$route['new-room'] = 'main/new_room';//process
$route['cancel-booking/(:any)'] = 'main/cancel_booking/$1';//process
$route['new-booking'] = 'main/new_booking';//process
$route['new-review'] = 'main/new_review';//process