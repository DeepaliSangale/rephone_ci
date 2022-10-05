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
$route['default_controller'] = 'web';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['contact-us'] = 'web/contact/';
$route['about-us'] = 'web/about_us/';

$route['request-price'] = 'web/request_price/';

$route['value-not-calculate/(:any)'] = function ($product_url)
{
        return 'web/value_page/' . strtolower($product_url);
};

$route['sell-old-mobile-phone'] = 'web/sell_old_mobile_phone/';
$route['brands'] = 'web/brands/';



$route['sell-mobile-phone/(:any)'] = function ($brand_type)
{
        return 'web/brand_wise_mobile/' . strtolower($brand_type);
};

$route['sell-mobile-phone-used/(:any)'] = function ($model_type)
{
        return 'web/choose_variant_model/' . strtolower($model_type);
};

$route['sell-mobile-phone-variant/(:any)'] = function ($var_type)
{
        return 'web/variant_wise_prize/' . strtolower($var_type);
};

$route['sell-old-mobile-used/calculator/(:any)'] = function ($product_type)
{
        return 'web/question_calculator/' . strtolower($product_type);
};