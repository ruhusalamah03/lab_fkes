<?php

use CodeIgniter\Commands\Utilities\Routes;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::masuk');
$routes->get('/masuk', 'Auth::masuk');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/loginProcess', 'Auth::loginProcess');
$routes->get('/auth/logout', 'Auth::logout');

$routes->group('user', ['filter' => 'isLoggedIn:user'], function ($routes) {
    $routes->get('/', 'User::index');
    
    $routes->get('peminjaman', 'User::peminjaman');
    $routes->get('riwayatpeminjaman', 'User::riwayatpeminjaman');
    $routes->get('profile', 'User::profile');
    $routes->get('kontak', 'User::kontak');

     // Routes Prasat
     $routes->get('prasats', 'Prasats::index');
     $routes->get('prasats/KMB', 'Prasats::KMB');
     $routes->post('kmb/new', 'Prasats::store');
     $routes->get('prasats/KA', 'Prasats::KA');
     $routes->post('prasat/ka/new', 'Prasats::store');
     $routes->get('prasats/KM', 'Prasats::KM');
     $routes->post('prasat/km/new', 'Prasats::store');
     $routes->get('prasats/KGD', 'Prasats::KGD');
     $routes->post('prasat/kgd/new', 'Prasats::store');
     $routes->get('prasats/KJ', 'Prasats::KJ');
     $routes->post('prasat/kj/new', 'Prasats::store');
     $routes->get('prasats/KG', 'Prasats::KG');
     $routes->post('prasat/kg/new', 'Prasats::store');
     $routes->get('prasats/KKOM', 'Prasats::KKOM');
     $routes->post('prasat/kkom/new', 'Prasats::store');
     $routes->get('prasats/KD', 'Prasats::KD');
     $routes->post('prasat/kd/new', 'Prasats::store');
     $routes->get('prasats/IBD', 'Prasats::IBD');
     $routes->post('prasats/ibd/new', 'Prasats::store');
     $routes->resource('prasats');
});

$routes->group('admin', ['filter' => 'isLoggedIn:admin'], function ($routes) {
    $routes->get('/', 'Admin::index');

    // $routes->get('labfkes', 'Admin::labfkes');
    $routes->get('barangmasuk', 'Admin::barangmasuk');
    $routes->get('barangkeluar', 'Admin::barangkeluar');
    $routes->get('stokbarang', 'Admin::stokbarang');
    $routes->get('manajemenuser', 'Admin::manajemenuser');
    $routes->get('riwayatpeminjaman', 'Admin::riwayatpeminjaman');
    $routes->get('kontak', 'Admin::kontak');
    $routes->get('peminjaman', 'Admin::peminjaman');
    $routes->get('pengembalian', 'Admin::pengembalian');
    $routes->get('laporan', 'Admin::laporan');
    $routes->get('informasi', 'Admin::informasi');
    $routes->get('riwayatprint', 'Admin::riwayatprint');
    $routes->get('profile', 'Admin::profile');
    $routes->get('prasat/(:any)', 'Prasats::$1'); 

    // Routes Barang
    $routes->get('barang/create', 'Barang::create');
    $routes->post('barang/new', 'Barang::store');
    $routes->get('barang/edit/(:num)', 'Barang::edit/$1');
    $routes->post('barang/update/(:num)', 'Barang::update/$1');
    $routes->post('abarang/delete/(:segment)', 'Barang::delete/$1');
    $routes->get('barang/data-print', 'Barang::printBarang');
    $routes->presenter('barang');

    // Routes Prasat
    $routes->get('prasat/KMB', 'Prasats::KMB');
    $routes->post('kmb/new', 'Prasats::store');
    $routes->get('prasat/KA', 'Prasats::KA');
    $routes->post('admin/prasat/ka/new', 'Prasats::store');
    $routes->get('prasat/KM', 'Prasats::KM');
    $routes->post('prasat/km/new', 'Prasats::store');
    $routes->get('prasat/KGD', 'Prasats::KGD');
    $routes->post('prasat/kgd/new', 'Prasats::store');
    $routes->get('prasat/KJ', 'Prasats::KJ');
    $routes->post('prasat/kj/new', 'Prasats::store');
    $routes->get('prasat/KG', 'Prasats::KG');
    $routes->post('prasat/kg/new', 'Prasats::store');
    $routes->get('prasat/KKOM', 'Prasats::KKOM');
    $routes->post('prasat/kkom/new', 'Prasats::store');
    $routes->get('prasat/KD', 'Prasats::KD');
    $routes->post('prasat/kd/new', 'Prasats::store');
    $routes->get('prasat/IBD', 'Prasats::IBD');
    $routes->post('prasat/ibd/new', 'Prasats::store');
    $routes->resource('prasats');
});

// // Routes Prasat
// $routes->get('prasat/KMB', 'Prasats::KMB');
// $routes->post('prasat/kmb/new', 'Prasats::store');
// $routes->get('prasat/KA', 'Prasats::KA');
// $routes->get('prasat/KM', 'Prasats::KM');
// $routes->get('prasat/KGD', 'Prasats::KGD');
// $routes->get('prasat/KJ', 'Prasats::KJ');
// $routes->get('prasat/KG', 'Prasats::KG');
// $routes->get('prasat/KKOM', 'Prasats::KKOM');
// $routes->get('prasat/KD', 'Prasats::KD');
// $routes->get('prasat/IBD', 'Prasats::IBD');
// $routes->post('prasat/ibd/new', 'Prasats::store');
// $routes->resource('prasats');


// $routes->get('/labfkes', 'Home::labfkes');
// $routes->get('/barangmasuk', 'Home::barangmasuk');
// $routes->get('/barangkeluar', 'Home::barangkeluar');
// $routes->get('/stokbarang', 'Home::stokbarang');
// $routes->get('/manajemenuser', 'Home::manajemenuser');
// $routes->get('/riwayatpeminjaman', 'Home::riwayatpeminjaman');
// $routes->get('/admin', 'Home::admin');
// $routes->get('/kontak', 'Home::kontak');
// $routes->get('/peminjaman', 'Home::peminjaman');
// $routes->get('/pengembalian', 'Home::pengembalian');
// $routes->get('/laporan', 'Home::laporan');
// $routes->get('/informasi', 'Home::informasi');
// $routes->get('/riwayatprint', 'Home::riwayatprint');

// //ROUTES BARANG
// $routes->get('/barang/create', 'Barang::create');
// $routes->post('/barang/new', 'Barang::store');
// $routes->get('/barang/edit/(:num)', 'Barang::edit/$1');
// $routes->post('/barang/update/(:num)', 'Barang::update/$1');
// $routes->post('/barang/delete/(:segment)', 'Barang::delete/$1');
// $routes->get('/barang/data-print', 'Barang::printBarang');
// $routes->presenter('barang');


// //ROUTES PRASAT
// $routes->get('prasat/KMB', 'Prasats::KMB');
// $routes->post('prasat/kmb/new', 'Prasats::store');
// $routes->get('prasat/KA', 'Prasats::KA');
// $routes->get('prasat/KM', 'Prasats::KM');
// $routes->get('prasat/KGD', 'Prasats::KGD');
// $routes->get('prasat/KJ', 'Prasats::KJ');
// $routes->get('prasat/KG', 'Prasats::KG');
// $routes->get('prasat/KKOM', 'Prasats::KKOM');
// $routes->get('prasat/KD', 'Prasats::KD');
// $routes->get('prasat/IBD', 'Prasats::IBD');
// $routes->post('prasat/ibd/new', 'Prasats::store');

// $routes->get('prasat/IBD', 'Prasats::IBD');
// $routes->get('prasat/ibd/create', 'Prasats::createIBD');
// $routes->post('prasat/ibd/new', 'Prasats::store');
// $routes->post('/prasat/addIBD', 'Prasats::addIBD');
$routes->resource('prasats');
