<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->add('/unitkategori', 'UnitKategori::index');
// BARANG KELUAR
$routes->add('/barangkeluar', 'BarangKeluar::index');
$routes->add('/addBrgKeluar', 'BarangKeluar::formAdd');

// BARANG MASUK
$routes->add('/barangmasuk', 'BarangMasuk::index');
$routes->add('/addBrgMasuk', 'BarangMasuk::');
$routes->add('/buatPO', 'BarangMasuk::formAdd');
$routes->add('/getBarang', 'BarangMasuk::getBarang');
$routes->add('/Messages', 'Messages::checkStok');

$routes->add('/pengaturan', 'Pengaturan::index');
$routes->add('/pengaturan', 'Pengaturan::index');
$routes->get('/supplier', 'Supplier::index');

// ACTION
$routes->delete('/Home/(:num)', 'Home::delete/$1');
$routes->delete('/unit/(:num)', 'UnitKategori::deleteUnit/$1');
$routes->delete('/kategori/(:num)', 'UnitKategori::deleteKategori/$1');
$routes->delete('/deleteMerk/(:num)', 'UnitKategori::deleteMerk/$1');
$routes->get('/Edit/(:segment)', 'Home::fetchDataUpdate/$1');
$routes->add('/Update/(:segment)', 'Home::updateData/$1');
$routes->add('/supp/(:segment)', 'Supplier::delete/$1');
$routes->add('/editSupp/(:segment)', 'Supplier::fetchDataUpdate/$1');
$routes->add('/editKat/(:segment)', 'UnitKategori::fetchKat/$1');
$routes->add('/editUnit/(:segment)', 'UnitKategori::fetchUnit/$1');
$routes->add('/delBK/(:segment)', 'BarangKeluar::delete/$1');
$routes->add('/delBM/(:segment)', 'BarangMasuk::delete/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
