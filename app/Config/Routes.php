<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Sistem home
$routes->get('/', 'Home::index');

// Sistem anime
$routes->get('/anime/top', 'Anime::index');
$routes->get('/anime/(:num)', 'Anime::detail/$1');
$routes->get('/anime/(:num)/(:any)', 'Anime::detail/$1/$2');

// Sistem manga
$routes->get('/manga/top', 'Manga::index');
$routes->get('/manga/(:num)', 'Manga::detail/$1');
$routes->get('/manga/(:num)/(:any)', 'Manga::detail/$1/$2');

// Sistem admin
$routes->get('/admin', 'Admin::index');
$routes->put('/admin/save', 'Admin::save');
$routes->put('/admin/token', 'Admin::token');
$routes->get('/admin/token', 'Admin::token');
$routes->delete('/admin/user/delete', 'Admin::delete_user');
$routes->put('/admin/user/edit', 'Admin::edit_user');
$routes->put('/admin/user/update', 'Admin::update_user');
$routes->put('/admin/setting/save', 'Admin::save_setting');
// Pengecualian
// $routes->match(['get', 'post'], '/admin/save', 'Error::notfound');
// $routes->get('/admin/save/(:any)', 'Error::notfound');
// $routes->post('/admin/token', 'Error::notfound');
// $routes->match(['get', 'post'], '/admin/delete_user', 'Error::notfound');
// $routes->match(['get', 'post'], '/admin/user/delete', 'Error::notfound');
// $routes->match(['get', 'post'], '/admin/edit_user', 'Error::notfound');
// $routes->match(['get', 'post'], '/admin/user/edit', 'Error::notfound');
// $routes->match(['get', 'post'], '/admin/update_user', 'Error::notfound');
// $routes->match(['get', 'post'], '/admin/user/update', 'Error::notfound');
// $routes->match(['get', 'post'], '/admin/save_setting', 'Error::notfound');
// $routes->match(['get', 'post'], '/admin/setting/save', 'Error::notfound');

// Sistem login
$routes->get('/login', 'Login::index', ['filter' => 'Is_login']);
$routes->put('/login/cek', 'Login::logincek', ['filter' => 'Is_login']);
$routes->get('/register', 'Login::register', ['filter' => 'Is_login']);
$routes->put('/register/cek', 'Login::registercek', ['filter' => 'Is_login']);
$routes->get('/logout', 'Login::logout');
// Pengecualian
$routes->match(['get', 'post'], '/login/logincek', 'Error::notfound');
$routes->match(['get', 'post'], '/login/registercek', 'Error::notfound');

// Sistem ajax
$routes->get('/ajax/home', 'Ajax::home');
$routes->post('/ajax/search', 'Ajax::search');

$routes->get('/ajax/index_anime', 'Ajax::index_anime');
$routes->post('/ajax/detail_anime', 'Ajax::detail_anime');
$routes->post('/ajax/top_anime', 'Ajax::top_anime');
$routes->post('/ajax/season_anime', 'Ajax::season_anime');

$routes->get('/ajax/index_manga', 'Ajax::index_manga');
$routes->post('/ajax/detail_manga', 'Ajax::detail_manga');
$routes->post('/ajax/top_manga', 'Ajax::top_manga');

// Pengecualian
// $routes->get('/ajax/home/(:any)', 'Error::notfound');
// $routes->get('/ajax/search', 'Error::notfound');
// $routes->get('/ajax/search/(:any)', 'Error::notfound');

// $routes->get('/ajax/index_anime/(:any)', 'Error::notfound');
// $routes->get('/ajax/detail_anime', 'Error::notfound');
// $routes->get('/ajax/detail_anime/(:any)', 'Error::notfound');
// $routes->get('/ajax/top_anime', 'Error::notfound');
// $routes->get('/ajax/top_anime/(:any)', 'Error::notfound');
// $routes->get('/ajax/season_anime', 'Error::notfound');
// $routes->get('/ajax/season_anime/(:any)', 'Error::notfound');

// $routes->get('/ajax/index_manga/(:any)', 'Error::notfound');
// $routes->get('/ajax/detail_manga', 'Error::notfound');
// $routes->get('/ajax/detail_manga/(:any)', 'Error::notfound');
// $routes->get('/ajax/top_anime', 'Error::notfound');
// $routes->get('/ajax/top_anime/(:any)', 'Error::notfound');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
