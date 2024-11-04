<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');       
$routes->get('/dashboard', 'Dashboard::index');       
$routes->get('/blogs', 'BlogController::index');     
$routes->get('blogs/create', 'BlogController::create');
$routes->post('blogs/store', 'BlogController::store');    
$routes->get('blogs/edit/(:num)', 'BlogController::edit/$1'); 
$routes->post('blogs/update/(:num)', 'BlogController::update/$1'); 
$routes->post('blogs/delete/(:num)', 'BlogController::delete/$1'); 


