<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/mahasiswa', 'MahasiswaController::index');
$routes->get('/mahasiswa/tambah', 'MahasiswaController::tambah');
$routes->post('/mahasiswa/simpan', 'MahasiswaController::simpan');
$routes->get('/mahasiswa/edit/(:num)', 'MahasiswaController::edit/$1');
$routes->post('/mahasiswa/update/(:num)', 'MahasiswaController::update/$1');
$routes->get('/mahasiswa/hapus/(:num)', 'MahasiswaController::hapus/$1');

