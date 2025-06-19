<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Pages::index');
$routes->get('Pages/detailLokasi/(:num)', 'Pages::detailLokasi/$1');
$routes->get('Dashboard', 'Dashboard::index');

$routes->group('/Auth', function ($routes) {
    $routes->get('index', 'Auth::index');
    $routes->post('login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
    $routes->get('konfirmasi', 'Auth::konfirmasi');
    $routes->post('konfirmasi', 'Auth::konfirmasi');
    $routes->get('ubahPassword', 'Auth::ubahPassword');
    $routes->post('ubahPassword', 'Auth::ubahPassword');
});

$routes->group('/Survei', function ($routes) {
    $routes->get('sudah_di_survei', 'Survei::sudah_di_survei');
    $routes->get('belum_di_survei', 'Survei::belum_di_survei');
    $routes->get('tambah_data', 'Survei::tambah_data', ['filter' => 'role:Tim Survei']);
    $routes->post('simpan_data', 'Survei::simpan_data', ['filter' => 'role:Tim Survei']);
    $routes->get('edit/(:num)', 'Survei::edit/$1');
    $routes->post('update/(:num)', 'Survei::update/$1');
    $routes->delete('delete/(:num)', 'Survei::delete/$1');
    $routes->post('searchUsers', 'Survei::searchUsers');
    $routes->get('print/(:num)', 'Survei::print/$1');
    $routes->get('api_survey_members', 'Survei::api_survey_members');
});

$routes->group('/Profile', function ($routes) {
    $routes->get('', 'Profile::index');
    $routes->get('edit', 'Profile::edit');
    $routes->post('update/(:num)', 'Profile::update/$1');
});

$routes->group('/Userlist', ['filter' => 'role:Admin'], function ($routes) {
    $routes->get('', 'Userlist::index');
    $routes->get('index/', 'Userlist::index');
    $routes->get('detail/(:num)', 'Userlist::detail/$1');
    $routes->delete('delete/(:num)', 'Userlist::delete/$1');
    $routes->get('edit/(:num)', 'Userlist::edit/$1');
    $routes->post('update/(:num)', 'Userlist::update/$1');
    $routes->get('tambah_user', 'Userlist::tambah_user');
    $routes->post('store', 'Userlist::store');
});
