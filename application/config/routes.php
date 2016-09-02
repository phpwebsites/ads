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
$route['home'] = "home/index";
$route['UserController/add_user'] = "UserController/add_user";
$route['UserController/login_user'] = "UserController/login_user";
$route['user/logout'] = "UserController/logout";
$route['HomeController/userProfileuser'] = "Home/userProfile";
$route['home/viewall'] = "Home/viewall";
$route['administrator'] = "admin/AdminController/index";
$route['admin/AdminController/categories'] = "admin/AdminController/categories";
$route['admins'] = "admin/UserController/index";
$route['admin/addadmin'] = "admin/UserController/add";
$route['admin/insert'] = "admin/UserController/insert";
$route['admin/delete/:any'] = "admin/UserController/deleteuser";
$route['admin/updateform/:any'] = "admin/UserController/updateform";
$route['admin/updateuser'] = "admin/UserController/updateinsert";
$route['admin/registerusers'] = "admin/UserController/registerdusers";
/*########### Locations ######################### */
$route['country/show'] = "admin/CountryController/index";
$route['country/add'] = "admin/CountryController/add";
$route['country/insert'] = "admin/CountryController/insert";
$route['country/update/:any'] = "admin/CountryController/update";
$route['country/delete/:any'] = "admin/CountryController/delete";
$route['country/updateinsert'] = "admin/CountryController/updateinsert";

$route['state/show'] = "admin/StateController/index";
$route['state/add'] = "admin/StateController/add";
$route['state/insert'] = "admin/StateController/insert";
$route['state/update/:any'] = "admin/StateController/update";
$route['state/delete/:any'] = "admin/StateController/delete";
$route['state/updateinsert'] = "admin/StateController/updateinsert";

$route['city/show'] = "admin/CityController/index";
$route['city/add'] = "admin/CityController/add";
$route['city/insert'] = "admin/CityController/insert";
$route['city/update/:any'] = "admin/CityController/update";
$route['city/delete/:any'] = "admin/CityController/delete";
$route['city/updateinsert'] = "admin/CityController/updateinsert";

$route['country/getstate/:any'] = "admin/CountryController/getstates";
$route['state/getcites/:any'] = "admin/StateController/getcities";

/*########### Locations End ######################### */

/*#################### Category Start ################### */
$route['category/index'] = "admin/CategoryController/index";
$route['category/index/:any'] = "admin/CategoryController/index";
$route['add/category'] = "admin/CategoryController/add";
$route['category/insert'] = "admin/CategoryController/insert";
$route['category/update/:any'] = "admin/CategoryController/update";
$route['category/updateinsert'] = "admin/CategoryController/updateinsert";
$route['category/delete/:any'] = "admin/CategoryController/delete";
/*#################### Category End ################### */

/*#################### Category Start ################### */
$route['subcategory/index/:any'] = "admin/SubCategoryController/index";
$route['subcategory/index'] = "admin/SubCategoryController/index";
$route['add/subcategory'] = "admin/SubCategoryController/add";
$route['subcategory/insert'] = "admin/SubCategoryController/insert";
$route['subcategory/update/:any'] = "admin/SubCategoryController/update";
$route['subcategory/updateinsert'] = "admin/SubCategoryController/updateinsert";
$route['subcategory/delete/:any'] = "admin/SubCategoryController/delete";
/*#################### Front Category Start ################### */
$route['category/viewall'] = "FrontCategoryController/viewall";
$route['category/getsubcate/:any'] = "FrontCategoryController/getallsubcategory";

/*#################### Category End ################### */

/*#################### Postanad start ################### */
$route['postad'] = "FrontCategoryController/postanad";
$route['postad/create'] = "FrontCategoryController/postanadcreate";
$route['postad/captcharefresh'] = "FrontCategoryController/captcha_refresh";
$route['postad/subcategory/:any'] = "FrontCategoryController/postanadsubcategory";
$route['getfrontstates/:any'] = "FrontCategoryController/getstates";
$route['getfrontcites/:any'] = "FrontCategoryController/getcitys";
$route['getads/:any'] = "FrontCategoryController/getads";
/*#################### Postanad end ################### */

/* ############### addecription start #################### */
$route['description/:any'] = "AdDescriptionController/index";
$route['contactus'] = "ContentController/contactus";
$route['blog'] = "ContentController/blog";
$route['blog/:any'] = "ContentController/blog";
$route['blogdesc/:any'] = "ContentController/blogdesc";

/* ############### addecription end #################### */

/* ############### blog start #################### */
$route['blog/show'] = "admin/BlogController/show";
$route['blog/show/:any'] = "admin/BlogController/show";
$route['blog/add'] = "admin/BlogController/add";
$route['blog/insert'] = "admin/BlogController/insert";
$route['adminblog/edit/:any'] = "admin/BlogController/edit"; 
$route['blog/update/:any'] = "admin/BlogController/updatecreate";
$route['blog/updatecreate'] = "admin/BlogController/updatecreate";
$route['blog/delete/:any'] = "admin/BlogController/delete";

/* ############### blog end #################### */
/* ############### comments start ############## */
$route['comment/create'] = "ContentController/commentcreate";
$route['images/:any'] = "AdDescriptionController/getsubimage";
$route['search/create'] = "SearchController/searchcreate";
$route['SearchController/loadmore'] = "SearchController/loadmore";
$route['Search/:any'] = "SearchController/searchload";
/* ############### comments end ############## */
// commentcreate

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */