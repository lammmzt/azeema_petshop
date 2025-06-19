<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->post('/TipeBarang/detail_stok/(:any)', 'TipeBarang::detail_stok/$1');
$routes->get('/TipeBarang/(:segment)', 'TipeBarang::index/$1');
$routes->setAutoRoute(true);