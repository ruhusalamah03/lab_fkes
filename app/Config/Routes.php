<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::masuk');
$routes->get('/masuk', 'Auth::masuk');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/loginProcess', 'Auth::loginProcess');
$routes->get('/auth/logout', 'Auth::logout'); 


$routes->get('/labfkes', 'Home::labfkes');
$routes->get('/databarang', 'Home::databarang');
$routes->get('/barangmasuk', 'Home::barangmasuk');
$routes->get('/barangkeluar', 'Home::barangkeluar');
$routes->get('/stokbarang', 'Home::stokbarang');
$routes->get('/manajemenuser', 'Home::manajemenuser');
$routes->get('/riwayatpeminjaman', 'Home::riwayatpeminjaman');
$routes->get('/KMD', 'Home::KMD');
$routes->get('/KA', 'Home::KA');
$routes->get('/KM', 'Home::KM');
$routes->get('/KGD', 'Home::KGD');
$routes->get('/KJ', 'Home::KJ');
$routes->get('/KG', 'Home::KG');
$routes->get('/KKOM', 'Home::KKOM');
$routes->get('/KD', 'Home::KD');
$routes->get('/IBD', 'Home::IBD');
$routes->get('/masuk', 'Home::masuk');
$routes->get('/admin', 'Home::admin');
$routes->get('/kontak', 'Home::kontak');
$routes->get('/peminjaman', 'Home::peminjaman');
$routes->get('/pengembalian', 'Home::pengembalian');
$routes->get('/laporan', 'Home::laporan');
$routes->get('/prasat', 'Home::prasat');
$routes->get('/informasi', 'Home::informasi');


$routes->get('/barang/create', 'Barang::create');
$routes->post('/barang/new', 'Barang::store');
$routes->get('/barang/edit/(:num)', 'Barang::edit/$1');
$routes->post('/barang/update/(:num)', 'Barang::update/$1');
$routes->post('/barang/delete/(:segment)', 'Barang::delete/$1');
$routes->presenter('barang');

$routes->get('prasat/KMD', 'Prasats::KMD');
$routes->get('prasat/KA', 'Prasats::KA');
$routes->get('prasat/KM', 'Prasats::KM');
$routes->get('prasat/KGD', 'Prasats::KGD');
$routes->get('prasat/KJ', 'Prasats::KJ');
$routes->get('prasat/KG', 'Prasats::KG');
$routes->get('prasat/KKOM', 'Prasats::KKOM');
$routes->get('prasat/KD', 'Prasats::KD');
$routes->get('prasat/IBD', 'Prasats::IBD');
$routes->resource('prasats');


