<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::index');
$routes->get('user_profile', 'UserController::userProfile');
$routes->get('edit_profile', 'UserController::editProfile');
$routes->post('update_profile', 'UserController::updateProfile');
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
$routes->get('unit_list', 'UserController::viewUnits');
$routes->get('rent_unit/(:num)', 'UserController::rentUnit/$1');
$routes->post('process_rental', 'UserController::processRental');
$routes->get('my_rentals', 'UserController::myRentals');
$routes->get('pay_rental/(:num)', 'UserController::payRental/$1');
$routes->get('return_rental/(:num)', 'UserController::returnRental/$1');
$routes->get('search_results', 'UnitController::search_results');
