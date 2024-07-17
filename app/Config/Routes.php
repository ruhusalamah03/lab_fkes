<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
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
$routes->get('/keluar', 'Home::keluar');
$routes->get('/masuk', 'Home::masuk');
$routes->get('/admin', 'Home::admin');
$routes->get('/kontak', 'Home::kontak');
$routes->get('/peminjaman', 'Home::peminjaman');
$routes->get('/pengembalian', 'Home::pengembalian');
$routes->get('/laporan', 'Home::laporan');
$routes->get('/prasat', 'Home::prasat');
