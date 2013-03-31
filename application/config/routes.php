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

$route['default_controller'] = "tanyoo/index";

$route['user/(:any)'] = 'user/$1';
$route['login/(:any)'] = 'login/$1';
$route['soal/(:any)'] = 'soal/$1';

$route['u/(:any)/penghargaan'] = 'profil/penghargaan/$1'; // route ke profile penghargaan
$route['u/(:any)/celengan'] = 'profil/celengan/$1'; // route ke profile celengan

$route['u/(:any)/edit_profil'] = 'profil/profile_ubah/$1'; // route ke profile 
$route['u/save_edit_profil'] = 'profil/simpan_profile_ubah'; // menyimpan perubahan profil
$route['u/(:any)/profile_ubah'] = 'profil/profile_ubah/$1'; // route ke profile_ubah_view

$route['u/(:any)'] = 'profil/index/$1';		//route ke profil dengan "u/[username]". "u" karena singkatan "user"

//routing ke CRUD celengan
$route['celengan/(:any)'] = 'celengan/$1';

//route ke jawab soal
$route['jawab'] = 'soal/jawab';
$route['jawab/(:any)'] = 'soal/jawab_id';	//menjawab soal dengan id tertentu

//route ke profil
$route['(:any)'] = 'tanyoo/$1';


// $route['mentoraa/(:any)'] = 'mentoraa/$1';

//$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */