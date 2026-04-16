<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ==========================================
// --- PUBLIC ROUTES (No Login Required) ---
// ==========================================

// Set the default landing page to Login
$routes->get('/', 'AuthController::login');

// Authentication Routes
$routes->get('login', 'AuthController::login');
$routes->post('login/auth', 'AuthController::loginAuth');
$routes->get('logout', 'AuthController::logout');

// Registration Routes
$routes->get('register', 'AuthController::register');
$routes->post('register/store', 'AuthController::store');


// ==========================================
// --- PROTECTED ROUTES (Requires Login) ---
// ==========================================
// Note: Security checks are handled manually inside 
// the methods of these Controllers.

// 1. Admin Dashboard
$routes->get('dashboard', 'AuthController::dashboard');

// 2. User Management (CRUD)
$routes->get('users', 'UserController::index');                    // List all users
$routes->get('users/create', 'UserController::create');            // Form to add user
$routes->post('users/store', 'UserController::store');             // Save new user
$routes->get('users/edit/(:num)', 'UserController::edit/$1');      // Form to edit user
$routes->post('users/update/(:num)', 'UserController::update/$1'); // Save changes
$routes->get('users/delete/(:num)', 'UserController::delete/$1');  // Delete user

// 3. Product Inventory (CRUD)
$routes->get('products', 'ProductController::index');              // List/Manage inventory
$routes->post('products/store', 'ProductController::store');       // Add new product
$routes->get('products/delete/(:num)', 'ProductController::delete/$1'); // Remove product

// 4. Sales & POS (Auto-updates Stock)
$routes->get('sales', 'StoreController::sales');                   // POS Screen & History
$routes->post('sales/store', 'StoreController::storeSale');        // Process a transaction

// 5. Cash Management (Manual Cash In/Out)
$routes->get('cash', 'StoreController::cash');                     // Cash Registry
$routes->post('cash/store', 'StoreController::storeCash');         // Record entry/expense

// 6. Financial Reports
$routes->get('reports', 'StoreController::reports');               // Revenue & Net Cash