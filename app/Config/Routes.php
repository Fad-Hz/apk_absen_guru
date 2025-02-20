<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// (Authentication)
$routes->get('/', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

// (Halaman User)
$routes->get('/home','UserController::index');
$routes->get('/ijin', 'UserController::ijin');
$routes->post('/ijin', 'UserController::aksi_ijin');
$routes->get('/scan', 'KehadiranController::index' );
$routes->get('/scan/masuk', 'KehadiranController::showMasuk');
$routes->post('/masuk', 'KehadiranController::scan_masuk');
$routes->get('/scan/keluar', 'KehadiranController::showKeluar');
$routes->post('/keluar', 'KehadiranController::scan_keluar');
$routes->get('/history', 'KehadiranController::history');
$routes->get('/penggajian', 'PenggajianController::index');
$routes->get('/mapel', 'PenggajianController::mapel');


// (Halaman Admin)
$routes->get('/admin/dashboard', 'AdminDashBoardController::index');
$routes->get('/admin/datamapel', 'AdminDashBoardController::show_mapel');
$routes->get('/admin/datascan', 'AdminDashBoardController::show_scan');
$routes->get('/admin/dataguru', 'AdminDashBoardController::show_guru');
$routes->get('/admin/dataijin', 'AdminDashBoardController::show_ijin');
$routes->get('/admin/datakehadiran', 'AdminDashBoardController::show_hadir');
$routes->get('/admin/analisis-absen', 'AbsensiController::showAnalytics');
$routes->get('/admin/kehadiran/detail/(:num)', 'AdminDashBoardController::detailLokasi/$1');
$routes->get('/admin/dataalpa', 'AdminDashBoardController::show_alpa');
$routes->post('/admin/setalpa', 'AlpaController::set_alpa');

// (Admin) Management Data Mata Pelajaran
$routes->get('/admin/tambahmapel', 'MataPelajaranController::tambah');
$routes->post('/admin/tambahmapel', 'MataPelajaranController::aksi_tambah');
$routes->get('/admin/editmapel/(:num)', 'MataPelajaranController::edit/$1');
$routes->post('/admin/editmapel/(:num)', 'MataPelajaranController::aksi_edit/$1');
$routes->post('/admin/hapusmapel/(:num)', 'MataPelajaranController::hapus/$1');

// (Admin) Management Data Qr Code
$routes->post('/admin/generatescan', 'ScanQrController::aksi_generate_scan');

// (Admin) Management Data Guru
$routes->get('/admin/detailguru/(:num)', 'GuruController::detail/$1');
$routes->get('/admin/tambahguru', 'GuruController::tambah');
$routes->post('/admin/tambahguru', 'GuruController::aksi_tambah');
$routes->get('/admin/editguru/(:num)', 'GuruController::edit/$1');
$routes->post('/admin/editguru/(:num)', 'GuruController::aksi_edit/$1');
$routes->post('/admin/hapusguru/(:num)', 'GuruController::hapus/$1');

// (Admin) Management Data User

$routes->get('/admin/datauser', 'UserManagementController::index');
$routes->get('/admin/tambahuser', 'UserManagementController::create');
$routes->post('/admin/tambahuser', 'UserManagementController::store');
$routes->get('/admin/edituser/(:num)', 'UserManagementController::edit/$1');
$routes->post('/admin/edituser/(:num)', 'UserManagementController::update/$1');
$routes->get('/admin/deleteuser/(:num)', 'UserManagementController::delete/$1');

// (Admin) Management Data Gaji
$routes->get('/admin/datagaji', 'PenguranganGaji::index');
$routes->get('/admin/kurangigaji/(:num)', 'PenguranganGaji::kurangi/$1');
$routes->post('/admin/kurangigaji/(:num)', 'PenguranganGaji::prosesKurangi/$1');

$routes->get('/admin/persentase', 'Persentase::index');