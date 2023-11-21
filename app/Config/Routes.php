<?php

namespace Config;

use Myth\Auth\Commands\CreateUser;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/', 'DashboardController::index', ['as' => 'dashboard']);
$routes->get('contoh1', 'Contoh1::index');
$routes->get('penjumlahan/(:num)/(:num)', 'Contoh1::penjumlahan/$1/$2');
$routes->get('matakuliah', 'Matakuliah::index');
$routes->post('matakuliah/cetak', 'Matakuliah::cetak');
$routes->get('web', 'Web::index');
$routes->get('web/about', 'Web::about');

// ASSET
$routes->get('asset', 'AssetController::index', ['as' => 'asset_list']);
$routes->get('asset/create', 'AssetController::create', ['as' => 'asset_create']);
$routes->post('asset', 'AssetController::store', ['as' => 'asset_store']);
$routes->get('asset/edit/(:num)', 'AssetController::edit/$1', ['as' => 'asset_edit']);
$routes->put('asset/(:num)', 'AssetController::update/$1', ['as' => 'asset_update']);
$routes->delete('asset/(:num)', 'AssetController::delete/$1', ['as' => 'asset_delete']);
$routes->get('asset/(:num)', 'AssetController::show/$1', ['as' => 'asset_show']);

// MAINTENANCE
$routes->get('maintenance', 'MaintenanceController::index', ['as' => 'maintenance_list']);
$routes->get('maintenance/create', 'MaintenanceController::create', ['as' => 'maintenance_create']);
$routes->post('maintenance', 'MaintenanceController::store', ['as' => 'maintenance_store']);
$routes->get('maintenance/edit/(:num)', 'MaintenanceController::edit/$1', ['as' => 'maintenance_edit']);
$routes->put('maintenance/(:num)', 'MaintenanceController::update/$1', ['as' => 'maintenance_update']);
$routes->delete('maintenance/(:num)', 'MaintenanceController::delete/$1', ['as' => 'maintenance_delete']);
$routes->get('maintenance/(:num)', 'MaintenanceController::show/$1', ['as' => 'maintenance_show']);

// CATEGORY
$routes->get('category', 'CategoryController::index', ['as' => 'category_list']);
$routes->get('category/create', 'CategoryController::create', ['as' => 'category_create']);
$routes->post('category', 'CategoryController::store', ['as' => 'category_store']);
$routes->get('category/edit/(:num)', 'CategoryController::edit/$1', ['as' => 'category_edit']);
$routes->put('category/(:num)', 'CategoryController::update/$1', ['as' => 'category_update']);
$routes->delete('category/(:num)', 'CategoryController::delete/$1', ['as' => 'category_delete']);

// TYPE
$routes->get('type', 'TypeController::index', ['as' => 'type_list']);
$routes->get('type/create', 'TypeController::create', ['as' => 'type_create']);
$routes->post('type', 'TypeController::store', ['as' => 'type_store']);
$routes->get('type/edit/(:num)', 'TypeController::edit/$1', ['as' => 'type_edit']);
$routes->put('type/(:num)', 'TypeController::update/$1', ['as' => 'type_update']);
$routes->delete('type/(:num)', 'TypeController::delete/$1', ['as' => 'type_delete']);

// ROLE
$routes->get('role', 'RoleController::index', ['as' => 'role_list']);
$routes->get('role/create', 'RoleController::create', ['as' => 'role_create']);
$routes->post('role', 'RoleController::store', ['as' => 'role_store']);
$routes->get('role/edit/(:num)', 'RoleController::edit/$1', ['as' => 'role_edit']);
$routes->put('role/(:num)', 'RoleController::update/$1', ['as' => 'role_update']);
$routes->delete('role/(:num)', 'RoleController::delete/$1', ['as' => 'role_delete']);


// USER MANAGEMENT
$routes->get('user', 'UserController::index', ['as' => 'user_list']);
$routes->get('user/create', 'UserController::create', ['as' => 'user_create']);
$routes->post('user', 'UserController::store', ['as' => 'user_store']);
$routes->get('user/edit/(:num)', 'UserController::edit/$1', ['as' => 'user_edit']);
$routes->put('user/(:num)', 'UserController::update/$1', ['as' => 'user_update']);
$routes->delete('user/(:num)', 'UserController::delete/$1', ['as' => 'user_delete']);
$routes->get('user/(:num)', 'UserController::userProfile/$1', ['as' => 'user_profile']);

// MASTER DATA
$routes->get('master-data', function () {
    $data['title'] = 'Master Data';
    return view('master-data/index', $data);
});




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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
