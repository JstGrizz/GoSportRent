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
