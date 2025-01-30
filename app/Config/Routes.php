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

$routes->get('/absen', 'UserController::presensi');

$routes->post('/masuk', 'KehadiranController::scan_masuk');

$routes->post('/keluar', 'KehadiranController::scan_keluar');

// (Halaman Admin)
$routes->get('/admin/dashboard', 'AdminDashBoardController::index');

$routes->get('/admin/datamapel', 'AdminDashBoardController::show_mapel');

$routes->get('/admin/datascan', 'AdminDashBoardController::show_scan');

$routes->get('/admin/dataguru', 'AdminDashBoardController::show_guru');

$routes->get('/admin/dataijin', 'AdminDashBoardController::show_ijin');

$routes->get('/admin/datakehadiran', 'AdminDashBoardController::show_hadir');

$routes->get('/admin/dataalpa', 'AdminDashBoardController::show_alpa');

$routes->post('/admin/setalpa', 'AlpaController::set_alpa');

// (Admin) Management Data Mata Pelajaran
$routes->get('/admin/tambahmapel', 'MataPelajaranController::tambah');

$routes->post('/admin/tambahmapel', 'MataPelajaranController::aksi_tambah');

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

$routes->get('/scan', 'UserController::tes' );