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
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('/logout', 'Login::Logout', ['filter' => 'auth']);
$routes->get('/login', 'Login::index');
$routes->get('/resetcode', 'Login::resetRequest');
$routes->get('/resetform', 'Login::resetForm', ['filter' => 'reset']);
$routes->add('/unitkategori', 'UnitKategori::index', ['filter' => 'auth']);
// BARANG KELUAR
$routes->add('/barangkeluar', 'BarangKeluar::index', ['filter' => 'auth']);
$routes->add('/addBrgKeluar', 'BarangKeluar::formAdd', ['filter' => 'auth'], ['filter' => 'auth']);

// BARANG MASUK
$routes->add('/barangmasuk', 'BarangMasuk::index', ['filter' => 'auth']);
$routes->add('/addBrgMasuk', 'BarangMasuk::', ['filter' => 'auth']);
$routes->add('/buatPO', 'BarangMasuk::formAdd', ['filter' => 'auth']);
$routes->add('/getBarang', 'BarangMasuk::getBarang', ['filter' => 'auth']);
$routes->add('/Messages', 'Messages::checkStok', ['filter' => 'auth']);

$routes->add('/pengaturan', 'Pengaturan::index', ['filter' => 'auth']);
$routes->get('/supplier', 'Supplier::index', ['filter' => 'auth']);

// ACTION
$routes->add('/updateSet/(:segment)', 'Pengaturan::updSet/$1', ['filter' => 'auth']);
$routes->delete('/Home/(:num)', 'Home::delete/$1', ['filter' => 'auth']);
$routes->delete('/unit/(:num)', 'UnitKategori::deleteUnit/$1', ['filter' => 'auth']);
$routes->delete('/kategori/(:num)', 'UnitKategori::deleteKategori/$1', ['filter' => 'auth']);
$routes->delete('/deleteMerk/(:num)', 'UnitKategori::deleteMerk/$1', ['filter' => 'auth']);
$routes->get('/Edit/(:segment)', 'Home::fetchDataUpdate/$1', ['filter' => 'auth']);
$routes->add('/Update/(:segment)', 'Home::updateData/$1', ['filter' => 'auth']);
$routes->add('/supp/(:segment)', 'Supplier::delete/$1', ['filter' => 'auth']);
$routes->add('/editSupp/(:segment)', 'Supplier::fetchDataUpdate/$1', ['filter' => 'auth']);
$routes->add('/editKat/(:segment)', 'UnitKategori::fetchKat/$1', ['filter' => 'auth']);
$routes->add('/editUnit/(:segment)', 'UnitKategori::fetchUnit/$1', ['filter' => 'auth']);
$routes->add('/delBK/(:segment)', 'BarangKeluar::delete/$1', ['filter' => 'auth']);
$routes->add('/delBM/(:segment)', 'BarangMasuk::delete/$1', ['filter' => 'auth']);

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
