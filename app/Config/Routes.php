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
$routes->setDefaultController('Dashboard');
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
// $routes->get('ci', 'home::index');
$routes->get('/', 'Product::index');
$routes->get('/chat', 'Product::chat');

$routes->group('product', function ($routes) {
	$routes->add('/', 'Product::index');
	$routes->add('cek', 'Product::cek');
	$routes->add('detail/(:segment)', 'Product::detail');
	$routes->add('add', 'Product::add');
	$routes->add('cart', 'Product::cart');
	$routes->add('update', 'Product::update');
	$routes->add('delete/(:segment)', 'Product::delete');
	$routes->add('clear', 'Product::clear');
	$routes->add('cekout', 'Product::cekout');
});
$routes->add('/loginauth', 'Auth::index');
$routes->add('/register', 'Auth::register');
$routes->add('/register/save', 'Auth::save');
$routes->get('/logout', 'Auth::logout');

$routes->add('admin/login', 'Admin/AdminAuth::index', ['filter' => 'cekadmin']);
$routes->add('admin/logout', 'Admin/AdminAuth::logout');


$routes->group('admin', ['filter' => 'cekloginadmin'], function ($routes) {
	$routes->get('/', 'Admin/Dashboard::index');
	$routes->get('tambah', 'Admin/Dashboard::add');
	$routes->get('dashboard/save', 'Admin/Dashboard::save');
});


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
