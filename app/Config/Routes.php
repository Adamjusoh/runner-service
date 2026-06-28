<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public Accessible Routes
$routes->get('/', 'Home::index');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::attemptLogin');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::storeRegister');
$routes->get('/logout', 'AuthController::logout');

// Protected Customer Environment Routes
$routes->group('customer', ['filter' => 'role:customer'], function($routes) {
    $routes->get('dashboard', 'CustomerController::index');
    $routes->get('run/view/(:num)', 'CustomerController::viewRun/$1');
    $routes->post('order/place', 'CustomerController::placeOrder');
    $routes->get('history', 'CustomerController::history');
});

// Protected Runner Environment Routes
$routes->group('runner', ['filter' => 'role:runner'], function($routes) {
    $routes->get('dashboard', 'RunnerController::index');
    $routes->get('run/create', 'RunnerController::createRun');
    $routes->post('run/store', 'RunnerController::storeRun');
    $routes->get('run/active/(:num)', 'RunnerController::activeRun/$1');
    $routes->post('run/complete/(:num)', 'RunnerController::completeRun/$1');
});

// Protected Administrative Environment Routes
$routes->group('admin', ['filter' => 'role:admin'], function($routes) {
    $routes->get('dashboard', 'AdminController::index');
    $routes->get('users', 'AdminController::manageUsers');
});