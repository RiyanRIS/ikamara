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
$routes->get('/', 'Home::index');
$routes->get('detail', 'Home::detail');
$routes->get('hapus/(:any)', 'Pendataan::hapus/$1');
$routes->post('simpan/datadiri', 'Pendataan::simpanForm');
$routes->add('update-password', 'Pendataan::ubahPassword');

$routes->group('pendataan', function($routes)
{
	$routes->add('/', 'Pendataan::awal');
	$routes->post('/pelajar', 'Pendataan::pelajar');
	$routes->post('/mahasiswa', 'Pendataan::mahasiswa');
	$routes->post('/masyarakat', 'Pendataan::masyarakat');
	$routes->post('/alumni', 'Pendataan::alumni');

});

$routes->group('auth', function($routes)
{
	$routes->post('login', 'Auth::aksiLogin');
});

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
