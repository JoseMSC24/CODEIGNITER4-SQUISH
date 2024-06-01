<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->get('product', 'Product::index');
$routes->get('product/show/(:segment)', 'Product::show/$1');
$routes->get('product/search', 'Product::search'); // Ruta para la búsqueda de productos
$routes->get('cart', 'Cart::index');
$routes->get('cart/add/(:segment)', 'Cart::add/$1');
$routes->get('cart/checkout', 'Cart::checkout');
$routes->post('cart/process_payment', 'Cart::processPayment');
$routes->get('cart/payment_confirmation', 'Cart::paymentConfirmation');
$routes->get('cart/remove/(:segment)', 'Cart::remove/$1');

$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::processRegister');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::processLogin');
$routes->get('/logout', 'AuthController::logout');
