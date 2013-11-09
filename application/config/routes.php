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

$route['default_controller'] = "dashboard";
$route['404_override'] = 'error/page_not_found';

$route['account/settings'] = 'users/account_settings';

$route['dashboard/products/([0-9]+)'] = 'dashboard/products/$1';

$route['search/products/([0-9]+)'] = 'search/products/$1';
$route['search/articles/([0-9]+)'] = 'search/articles/$1';

$route['product/([0-9]+)'] = 'product/index/$1';

$route['article/product/([0-9]+)/create'] = 'article/create';
$route['article/artisan/([0-9]+)/create'] = 'article/create_artisan/$1';
$route['article/enterprise/([0-9]+)/create'] = 'article/create_enterprise/$1';
$route['article/([0-9]+)/([a-zA-Z]+)/([0-9]+)/update'] = 'article/update/$1';
$route['article/listings/([0-9]+)'] = 'article/listings/$1';
$route['article/([0-9]+)'] = 'article/view/$1';

$route['artisan/listings/([0-9]+)'] = 'artisan/listings/$1';
$route['artisan/details/([0-9]+)'] = 'artisan/details/$1';

$route['enterprise/details/([0-9]+)'] = 'enterprise/index/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
