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

  $routes->get('peminjamanbarang', 'User::peminjamanbarang');
  $routes->get('pengembalianbarang', 'User::pengembalianbarang');
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

  // Routes Manajemen User

  $routes->get('manajemenuser', 'ManajemenUser::index');
  $routes->post('manajemenuser/add', 'ManajemenUser::store');
  $routes->post('manajemenuser/update/(:num)', 'ManajemenUser::update/$1');
  $routes->get('manajemenuser/delete/(:num)', 'ManajemenUser::delete/$1');
  $routes->post('manajemenuser/getdata/(:num)', 'ManajemenUser::getData/$1');


  // Routes Barang
  $routes->get('barang/detail', 'Barang::detail');
  $routes->get('barang/create', 'Barang::create');
  $routes->post('barang/new', 'Barang::store');
  $routes->get('barang/edit/(:num)', 'Barang::edit/$1');
  $routes->post('barang/update/(:num)', 'Barang::update/$1');
  $routes->post('barang/delete/(:segment)', 'Barang::delete/$1');
  $routes->get('barang/data-print', 'Barang::printBarang');
  $routes->presenter('barang');

  // Routes Prasat
  //KMB
  $routes->get('prasat/KMB', 'Prasats::KMB');
  $routes->post('prasat/kmb/new', 'Prasats::store');
  $routes->post('prasat/kmb/update/(:segment)', 'Barang::updateFromPrasat/$1');
  //KA
  $routes->get('prasat/KA', 'Prasats::KA');
  $routes->post('prasat/ka/new', 'Prasats::store');
  $routes->post('prasat/ka/update/(:segment)', 'Barang::updateFromPrasat/$1');
  //KM
  $routes->get('prasat/KM', 'Prasats::KM');
  $routes->post('prasat/km/new', 'Prasats::store');
  $routes->post('prasat/km/update/(:segment)', 'Barang::updateFromPrasat/$1');
  //KGD
  $routes->get('prasat/KGD', 'Prasats::KGD');
  $routes->post('prasat/kgd/new', 'Prasats::store');
  $routes->post('prasat/kgd/update/(:segment)', 'Barang::updateFromPrasat/$1');
  //KJ
  $routes->get('prasat/KJ', 'Prasats::KJ');
  $routes->post('prasat/kj/new', 'Prasats::store');
  $routes->post('prasat/kj/update/(:segment)', 'Barang::updateFromPrasat/$1');
  //KG
  $routes->get('prasat/KG', 'Prasats::KG');
  $routes->post('prasat/kg/new', 'Prasats::store');
  $routes->post('prasat/kg/update/(:segment)', 'Barang::updateFromPrasat/$1');
  //KKOM
  $routes->get('prasat/KKOM', 'Prasats::KKOM');
  $routes->post('prasat/kkom/new', 'Prasats::store');
  $routes->post('prasat/kkom/update/(:segment)', 'Barang::updateFromPrasat/$1');
  //KD
  $routes->get('prasat/KD', 'Prasats::KD');
  $routes->post('prasat/kd/new', 'Prasats::store');
  $routes->post('prasat/kd/update/(:segment)', 'Barang::updateFromPrasat/$1');
  //IBD
  $routes->get('prasat/IBD', 'Prasats::IBD');
  $routes->post('prasat/ibd/new', 'Prasats::store');
  $routes->post('prasat/ibd/update/(:segment)', 'Barang::updateFromPrasat/$1');
  $routes->post('prasat/delete/(:segment)', 'Prasats::destroy/$1'); 
  $routes->resource('prasats');
});
