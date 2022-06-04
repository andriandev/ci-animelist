<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Sistem home
$routes->get('/', 'Home::index');

// Sistem anime
$routes->get('/anime', 'Anime::index');
$routes->get('/anime/top/(:alpha)', 'Anime::top/$1');
$routes->get('/anime/top/(:alpha)/(:num)', 'Anime::top/$1/$2');
$routes->get('/anime/season/(:alpha)/(:num)', 'Anime::season/$1/$2');
$routes->get('/anime/season/(:alpha)/(:num)/(:num)', 'Anime::season/$1/$2/$3');
$routes->get('/anime/(:num)/(:any)', 'Anime::detail/$1/$2');

// Sistem manga
$routes->get('/manga', 'Manga::index');
$routes->get('/manga/top/(:alpha)', 'Manga::top/$1');
$routes->get('/manga/top/(:alpha)/(:num)', 'Manga::top/$1/$2');
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

// Sistem login
$routes->get('/login', 'Login::login');
$routes->put('/login/cek', 'Login::logincek');
$routes->get('/register', 'Login::register');
$routes->put('/register/cek', 'Login::registercek');
$routes->get('/logout', 'Login::logout');

// Sistem search
$routes->get('/search', 'Search::index');

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

/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
