<?php

use App\Controllers\User;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User::index');
$routes->get('/user/delete/(:num)', 'User::deleteUser/$1');
$routes->get('/user/edit/(:num)', 'User::editUser/$1');
$routes->post('/user/edit/(:num)', 'User::editUser/$1');
$routes->get('/user/create', 'User::createUser');
$routes->post('/user/create', 'User::createUser');
$routes->get('/login/googleAuth', 'GoogleAuth::index');

//login and register
$routes->get('/login','Login::index');
$routes->post('/login/authenticate','Login::authenticate');
$routes->get('logout','Login::logout');

$routes->get('/register','Registration::index');
$routes->post('/register/create','Registration::create');

// APIS 
$routes->get('/api/users', 'Api::users');
$routes->get('api/user/email', 'Api::getUserByEmail');
$routes->get('/api/users/(:num)', 'Api::getUser/$1');
$routes->delete('/api/users/(:num)', 'Api::deleteUser/$1');
$routes->post('/api/users/create', 'Api::createUser');
$routes->put('/api/users/(:num)', 'Api::updateUser/$1');


$routes->get('/scent/index', 'Scent::index');
$routes->get('/scent/delete/(:num)', 'Scent::deleteScent/$1');
$routes->get('/scent/edit/(:num)', 'Scent::editScent/$1');
$routes->post('/scent/edit/(:num)', 'Scent::editScent/$1');
$routes->get('/scent/create', 'Scent::createScent');
$routes->post('/scent/create', 'Scent::createScent');

$routes->get('/cart/index', 'Cart::index');
$routes->get('/cart/delete/(:num)', 'Cart::deleteItem/$1');
$routes->get('/cart/edit/(:num)', 'Cart::editItem/$1');
$routes->post('/cart/edit/(:num)', 'Cart::editItem/$1');
$routes->get('/cart/addToCart', 'Cart::addToCart');
$routes->post('/cart/addToCart', 'Cart::addCart');




