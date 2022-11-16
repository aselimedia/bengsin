<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->group('', ['filter' => 'LogregCheck'], function ($routes) {
	$routes->get('/', 'Users::index');
	$routes->get('/mitra/dashboard', 'MitraLogReg::index');
	$routes->get('/history', 'Users::history');
	$routes->get('/history/(:segment)', 'Users::historyDetail/$1');
	$routes->get('/account', 'Users::account');
	$routes->get('/tips', 'Users::tips');
	$routes->match(['get', 'post'], '/account/setting', 'Users::setting');
	$routes->match(['get', 'post'], '/isi-bensin', 'Users::bensin');
	$routes->match(['get', 'post'], '/isi-bensin/detail/(:segment)', 'snap::bensinDetail/$1');
	$routes->match(['get', 'post'], '/tambal-ban', 'Users::tambal');
	$routes->match(['get', 'post'], '/tambal-ban/detail/(:segment)', 'snap::tambalDetail/$1');
});

$routes->match(['get', 'post'], '/notification/index', 'notification::index');

// LOGIN AND REGISTER PAGE
$routes->match(['get', 'post'], '/logout', 'LogReg::logout');
$routes->match(['get', 'post'], '/login', 'LogReg::login');
$routes->match(['get', 'post'], '/login/forgot-password', 'LogReg::forgot');
$routes->match(['get', 'post'], '/register', 'LogReg::register');
$routes->match(['get', 'post'], '/active', 'LogReg::active');
$routes->match(['get', 'post'], '/login/change-password', 'LogReg::reset');
$routes->match(['get', 'post'], '/login/reset', 'LogReg::reset');


// LOGIN AND REGISTER MITRA PAGE
$routes->match(['get', 'post'], '/mitra/register', 'MitraLogReg::register');
$routes->match(['get', 'post'], '/mitra/login', 'MitraLogReg::login');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
