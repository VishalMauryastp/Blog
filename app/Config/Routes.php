<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');       
// $routes->get('/blogs', 'BlogController::index');     




// dashboard routes
$routes->get('/dashboard', 'BlogController::index'); // View all blogs
$routes->get('/dashboard/blog', 'BlogController::index'); // View all blogs
    $routes->get('/dashboard/blog/create', 'BlogController::create'); // Create a new blog post
    $routes->post('/dashboard/blog/store', 'BlogController::store'); // Store a new blog post
    $routes->get('/dashboard/blog/edit/(:num)', 'BlogController::edit/$1'); // Edit a blog post
    $routes->post('/dashboard/blog/update/(:num)', 'BlogController::update/$1'); // Update a blog post
    $routes->get('/dashboard/blog/delete/(:num)', 'BlogController::delete/$1'); // Delete a blog post



// $routes->get('/dashboard', 'Dashboard::index');       
// $routes->get('/blogs', 'BlogController::index');     
// $routes->get('blogs/create', 'BlogController::create');
// $routes->post('blogs/store', 'BlogController::store');    
// $routes->get('blogs/edit/(:num)', 'BlogController::edit/$1'); 
// $routes->post('blogs/update/(:num)', 'BlogController::update/$1'); 
// $routes->post('blogs/delete/(:num)', 'BlogController::delete/$1'); 

