<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/tipe_barang/(:any)', 'tipe_barang::index/$1');
$routes->setAutoRoute(true);