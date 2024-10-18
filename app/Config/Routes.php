<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// blog
$routes->get('posts', 'Blog::index'); // List all posts
$routes->get('posts/create', 'Blog::create'); // Show form to create a new post
$routes->post('posts', 'Blog::store'); // Store a new post (handle form submission)
$routes->get('posts/(:num)', 'Blog::show/$1'); // View a single post by ID
$routes->get('posts/edit/(:num)', 'Blog::edit/$1'); // Show form to edit a post by ID
$routes->put('posts/(:num)', 'Blog::update/$1'); // Update a post by ID (handle form submission)
$routes->delete('posts/(:num)', 'Blog::delete/$1');