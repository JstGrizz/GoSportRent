<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('admin/dashboard', 'AdminController::index');
$routes->get('dashboard', 'UserController::index');
$routes->post('auth/register', 'Auth::register');
$routes->get('register', 'RegisterController::index');
$routes->get('admin/user', 'RegisterController::index');
$routes->get('admin/users', 'AdminController::users');
$routes->get('admin/edit_user/(:num)', 'AdminController::editUser/$1');
$routes->post('admin/update_user/(:num)', 'AdminController::updateUser/$1');
$routes->get('admin/delete_user/(:num)', 'AdminController::deleteUser/$1');
$routes->get('admin/create_user_form', 'AdminController::createUserForm');
$routes->post('admin/create_user', 'AdminController::createUser');
$routes->get('admin/categories', 'AdminController::categories');
$routes->get('admin/create_category', 'AdminController::createCategory');
$routes->post('admin/store_category', 'AdminController::storeCategory');
$routes->get('admin/edit_category/(:num)', 'AdminController::editCategory/$1');
$routes->post('admin/update_category/(:num)', 'AdminController::updateCategory/$1');
$routes->get('admin/delete_category/(:num)', 'AdminController::deleteCategory/$1');
$routes->get('admin/units', 'AdminController::units');
$routes->get('admin/create_unit', 'AdminController::createUnit');
$routes->post('admin/store_unit', 'AdminController::storeUnit');
$routes->get('admin/edit_unit/(:num)', 'AdminController::editUnit/$1');
$routes->post('admin/update_unit/(:num)', 'AdminController::updateUnit/$1');
$routes->get('admin/delete_unit/(:num)', 'AdminController::deleteUnit/$1');
$routes->get('admin/rental_history', 'AdminController::rentalHistory');
$routes->get('admin/edit_rental/(:num)', 'AdminController::editRental/$1');
$routes->post('admin/update_rental/(:num)', 'AdminController::updateRental/$1');
$routes->get('admin/delete_rental/(:num)', 'AdminController::deleteRental/$1');
$routes->get('admin/policies', 'AdminController::policies');
$routes->get('admin/create_policy', 'AdminController::createPolicy');
$routes->post('admin/store_policy', 'AdminController::storePolicy');
$routes->get('admin/edit_policy/(:num)', 'AdminController::editPolicy/$1');
$routes->post('admin/update_policy/(:num)', 'AdminController::updatePolicy/$1');
$routes->get('admin/delete_policy/(:num)', 'AdminController::deletePolicy/$1');
