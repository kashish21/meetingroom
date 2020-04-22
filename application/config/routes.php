<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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

// Admin Panel
//$route['webmaster'] = "auth_admin/login";
$route['webmaster'] = "auth_admin/login";
$route['dashboard'] = "dashboard";

$route['change_status/(:num)/(:any)'] = "admin/administrators/change_status/$1/$2";
$route['delete-user/(:num)'] = "admin/administrators/delete_user/$1";
$route['user-change-status/(:num)/(:any)'] = "admin/users/change_status/$1/$2";

// meeting_name
$route['meeting/index'] = "admin/meeting/index";

//Conference API
$route['api/conference_Api/login'] = 'api/conference_Api/login';
$route['api/conference_Api/user/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/conference_Api/user/id/$1/format/$3$4';

/*User*/
$route['admin/users/address-view/(:any)'] = "admin/users/address_view/$1";
$route['admin/users/add-address/(:any)'] = "admin/users/add_address/$1";

/*topic content*/

$route['admin/topic/content-add/(:any)'] = "admin/topic/content_add/$1";
$route['admin/topic/content-edit/(:num)/(:num)'] = "admin/topic/content_edit/$1/$2";
$route['admin/topic/content-view/(:any)'] = "admin/topic/content_view/$1";
$route['admin/topic/assignment-view/(:any)'] = "admin/topic/assignment_view/$1";
$route['admin/topic/assignment-upload/(:any)'] = "admin/topic/assignment_upload/$1";

/*chapter content*/

$route['admin/chapter/content-add/(:any)'] = "admin/chapter/content_add/$1";
$route['admin/chapter/content-edit/(:num)/(:num)'] = "admin/chapter/content_edit/$1/$2";
$route['admin/chapter/content-view/(:any)'] = "admin/chapter/content_view/$1";
$route['admin/chapter/assignment-view/(:any)'] = "admin/chapter/assignment_view/$1";
$route['admin/chapter/assignment-upload/(:any)'] = "admin/chapter/assignment_upload/$1";

/*Course Chapter Map content*/

$route['admin/course/course-chapter-add/(:any)'] = "admin/course/content_add/$1";
$route['admin/course/course-chapter/(:any)'] = "admin/course/content_view/$1";


/*Plan course Map Content*/
$route['admin/plan/plan-course/(:any)'] = "admin/plan/content_view/$1";
$route['admin/plan/plan-course-add/(:any)'] = "admin/plan/content_add/$1";
$route['admin/plan/price-plan/(:any)'] = "admin/plan/price_view/$1";

/*Practice Questin content*/

$route['admin/practice/practice-question-list/(:any)'] = "admin/practice/content_view/$1";
$route['admin/practice/practice-question-list/(:any)/(:any)'] = "admin/practice/content_view/$1/$2";
$route['admin/practice/practice-questions-add/(:any)'] = "admin/practice/content_add/$1";
$route['admin/practice/practice-questions-edit/(:any)/(:any)'] = "admin/practice/content_edit/$1/$2";
$route['admin/practice/practice-option-edit/(:any)/(:any)'] = "admin/practice/option_edit/$1/$2";


/*quiz*/
$route['admin/quiz/quiz-question-list/(:any)'] = "admin/quiz/content_view/$1";
$route['admin/quiz/quiz-question-list/(:any)/(:any)'] = "admin/quiz/content_view/$1/$2";
$route['admin/quiz/quiz-questions-edit/(:any)/(:any)'] = "admin/quiz/content_edit/$1/$2";
$route['admin/quiz/quiz-option-edit/(:any)/(:any)'] = "admin/quiz/option_edit/$1/$2";

/*subjective*/
$route['admin/subjective/subjective-question-list/(:any)'] = "admin/subjective/content_view/$1";
$route['admin/subjective/subjective-question-list/(:any)/(:any)'] = "admin/subjective/content_view/$1/$2";
$route['admin/subjective/subjective-questions-edit/(:any)/(:any)'] = "admin/subjective/content_edit/$1/$2";

// module
$route['admin/role-module/(:any)'] = "admin/role/role_module/$1";

//pagination
$route['admin/index/:num'] = "admin/index/index/$1";
$route['admin/conference/:num'] = "admin/conference/index/$1";
$route['admin/manager/:num'] = "admin/manager/index/$1";
$route['admin/company/:num'] = "admin/company/index/$1";
$route['admin/administrators/:num'] = "admin/administrators/index/$1";

// User Panel
$route['default_controller'] = "Auth_admin/login";
$route['login'] = "auth_user/login";
$route['logout'] = "auth_admin/logout";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
