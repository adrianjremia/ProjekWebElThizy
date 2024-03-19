<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultController('Auth');
$routes->setDefaultMethod('customer');

$routes->match(['get', 'post'], '/login', 'Auth::index');
$routes->match(['get', 'post'], '/register', 'Auth::register');
$routes->get('/auth/logout', 'Auth::logout');

// Routes untuk Customer
$routes->get('/', 'Auth::showLogin');
$routes->get('/home', 'Customer::home', ['filter' => 'auth']);
$routes->get('/menu', 'Customer::menu', ['filter' => 'auth']);
$routes->get('/about', 'Customer::about', ['filter' => 'auth']);
$routes->get('/history', 'Customer::history', ['filter' => 'auth']);
$routes->post('/history', 'Customer::history', ['filter' => 'auth']);
$routes->post('/customer/process_order', 'Customer::processOrder', ['filter' => 'auth']);
$routes->get('/customer/process_order', 'Customer::processOrder', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/process_order', 'Customer::order', ['filter' => 'auth']);
$routes->get('/customer_profile', 'Customer::profile', ['filter' => 'auth']);
$routes->get('/edit_profile/(:num)', 'Customer::editProfile/$1', ['filter' => 'auth']);
$routes->post('/updateProfile/(:num)', 'Customer::updateProfile/$1', ['filter' => 'auth']);

// Routes untuk Admin
$routes->get('/admin', 'Admin::index', ['filter' => 'auth']);
$routes->get('/admin/customer_view', 'Admin::customerView', ['filter' => 'auth']);
$routes->get('/payment', 'Payment::index', ['filter' => 'auth']);
$routes->post('/payment/recordPayment', 'Payment::recordPayment', ['filter' => 'auth']);
$routes->get('admin/transaction', 'Payment::paymentTransaction');
$routes->post('admin/transaction/updateStatus', 'Payment::updateStatus');
$routes->get('/admin/edit_customer/(:num)', 'Admin::editCustomer/$1', ['filter' => 'auth']);
$routes->post('/admin/updateCustomer', 'Admin::updateCustomer', ['filter' => 'auth']);
$routes->get('/deleteCustomer/(:num)', 'Admin::deleteCustomer/$1', ['filter' => 'auth']);
$routes->post('/deleteCustomer/(:num)', 'Admin::deleteCustomer/$1', ['filter' => 'auth']);

$routes->set404Override();
$routes->setTranslateURIDashes(false);
