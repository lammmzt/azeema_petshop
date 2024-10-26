<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/TipeBarang/(:any)', 'TipeBarang::index/$1');
$routes->setAutoRoute(true);