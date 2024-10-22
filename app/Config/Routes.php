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
