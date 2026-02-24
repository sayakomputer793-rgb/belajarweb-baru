<?php

/**
 * Route Definitions
 * Format: $router->method('path', 'Controller@method');
 */

// ==================== PUBLIC ROUTES ====================

// Home / Landing Page
$router->get('', 'HomeController@index');
$router->get('/', 'HomeController@index');

// Portfolio / Projects
$router->get('projects', 'ProjectController@index');
$router->get('projects/category/{slug}', 'ProjectController@byCategory');
$router->get('projects/{slug}', 'ProjectController@show');

// Blog
$router->get('blog', 'BlogController@index');
$router->get('blog/{slug}', 'BlogController@show');

// Contact
$router->post('contact/send', 'ContactController@store');

// API (AJAX endpoints)
$router->get('api/projects', 'ProjectController@apiAll');
$router->get('api/projects/category/{slug}', 'ProjectController@apiByCategory');
$router->get('api/projects/{slug}', 'ProjectController@apiDetail');

// ==================== AUTH ROUTES ====================
$router->get('admin/login', 'AuthController@loginForm');
$router->post('admin/login', 'AuthController@login');
$router->get('admin/logout', 'AuthController@logout');

// ==================== ADMIN ROUTES ====================
$router->get('admin', 'Admin/DashboardController@index');
$router->get('admin/dashboard', 'Admin/DashboardController@index');

// Admin Projects
$router->get('admin/projects', 'Admin/ProjectController@index');
$router->get('admin/projects/create', 'Admin/ProjectController@create');
$router->post('admin/projects/store', 'Admin/ProjectController@store');
$router->get('admin/projects/edit/{id}', 'Admin/ProjectController@edit');
$router->post('admin/projects/update/{id}', 'Admin/ProjectController@update');
$router->post('admin/projects/delete/{id}', 'Admin/ProjectController@delete');

// Admin Blog
$router->get('admin/blogs', 'Admin/BlogController@index');
$router->get('admin/blogs/create', 'Admin/BlogController@create');
$router->post('admin/blogs/store', 'Admin/BlogController@store');
$router->get('admin/blogs/edit/{id}', 'Admin/BlogController@edit');
$router->post('admin/blogs/update/{id}', 'Admin/BlogController@update');
$router->post('admin/blogs/delete/{id}', 'Admin/BlogController@delete');

// Admin Contacts
$router->get('admin/contacts', 'Admin/ContactController@index');
$router->post('admin/contacts/read/{id}', 'Admin/ContactController@markRead');
$router->post('admin/contacts/delete/{id}', 'Admin/ContactController@delete');
