<?php

namespace Config;

use Myth\Auth\Commands\CreateUser;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/', 'DashboardController::index');
$routes->get('contoh1', 'Contoh1::index');
$routes->get('penjumlahan/(:num)/(:num)', 'Contoh1::penjumlahan/$1/$2');
$routes->get('matakuliah', 'Matakuliah::index');
$routes->post('matakuliah/cetak', 'Matakuliah::cetak');
$routes->get('web', 'Web::index');
$routes->get('web/about', 'Web::about');

// PUSTAKA BOOKING
$routes->get('kategori', 'KategoriController::index');
$routes->get('kategori/(:num)', 'KategoriController::show/$1');
$routes->get('kategori/create', 'KategoriController::create');
$routes->post('kategori', 'KategoriController::store');
$routes->get('kategori/edit/(:num)', 'KategoriController::edit/$1');
$routes->put('kategori/(:num)', 'KategoriController::update/$1');
$routes->delete('kategori/(:num)', 'KategoriController::delete/$1');

// USER MANAGEMENT
$routes->get('user', 'UserController::index', ['as' => 'user_list']);
$routes->get('user/create', 'UserController::create', ['as' => 'user_create']);
$routes->post('user', 'UserController::store', ['as' => 'user_store']);
$routes->get('user/edit/(:num)', 'UserController::edit/$1', ['as' => 'user_edit']);
$routes->put('user/(:num)', 'UserController::update/$1', ['as' => 'user_update']);
$routes->delete('user/(:num)', 'UserController::delete/$1', ['as' => 'user_delete']);
$routes->get('user/(:num)', 'UserController::userProfile/$1', ['as' => 'user_profile']);


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
