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
//----------------------前台路由----------------------------------
$route['default_controller'] = "home/index/index" ;
$route['404_override'] = '';
$route['quit'] = 'home/index/quit';

$route['admin']="admin/login/index";
$route['index']="home/index/index";
$route['node/(:num)']='home/node/index/$1';
$route['node/(:num)/(:num)']='home/node/index/$1/$2';

$route['article/(:num)']='home/article/index/$1';
$route['user']='home/user/index';//个人中心企业展示主页>
$route['user']='home/user/index';//个人中心企业展示主页>
$route['user_changepwd']='home/user/ChangePwd';
$route['user_history']='home/user/userHistory';
$route['user_picture']='home/user/picture';
$route['user_download']='home/user/download';

$route['user/(:num)']='home/user/index/$1';//个人中心企业展示主页>
$route['user_changepwd/(:num)']='home/user/ChangePwd/$1';
$route['user_history/(:num)']='home/user/userHistory/$1';
$route['user_picture/(:num)']='home/user/picture/$1';
$route['user_download/(:num)']='home/user/download/$1';


$route['user_download/(:num)']='home/user/download/$1';//修改密码提交
$route['checkPwd']='home/user/checkPwd';//修改密码提交
$route['modifyPwd']='home/user/modifyPwd';//修改密码提交
$route['changeData']='home/user/changeData';//修改密码提交
$route['enterpriseImg']='home/user/enterpriseImg';//修改密码提交
$route['productImg']='home/user/productImg';//修改密码提交
$route['delectProductImg']='home/user/delectProductImg';//修改密码提交
$route['log']='home/user/log';//修改密码提交
$route['downloadEXE/(:any)']='home/user/downloadEXE/$1';//修改密码提交
$route['video/(:num)']='home/video/index/$1';//修改密码提交
$route['video/(:num)/(:num)']='home/video/index/$1/$2';
$route['search']='home/index/search/';//修改密码提交
$route['enterprise/(:num)']='home/enterprise/index/$1';//修改密码提交
$route['enterprise/(:num)/(:num)']='home/enterprise/index/$1/$2';//修改密码提交
$route['enterprise/(:num)/(:num)/(:num)']='home/enterprise/index/$1/$2/$3';//修改密码提交
$route['introduction/(:num)']='home/enterprise/introduction/$1';//修改密码提交

$route['classify/(:num)']='home/enterprise/classify/$1';
$route['classify/(:num)/(:num)']='home/enterprise/classify/$1/$2';
$route['about']='home/index/about';
$route['contact']='home/index/contact';
$route['freeVideoList']='home/index/freeVideoList';
$route['freeVideoList/(:num)']='home/index/freeVideoList/$1';
$route['freeVideo/(:num)']='home/index/freeVideo/$1';
$route['freeVideo']='home/index/freeVideo';
$route['videoPlayer/(:num)']='home/video/videoPlayer/$1';
$route['complete']='home/video/okPlayer';
$route['recordingSpot']='home/video/recordingSpot';
/* End of file routes.php */
/* Location: ./application/config/routes.php */