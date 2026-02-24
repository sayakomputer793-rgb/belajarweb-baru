<?php
/**
 * Application Entry Point
 * All requests are routed through here.
 */

session_start();

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Load configuration
$config = require __DIR__ . '/../config/app.php';
$GLOBALS['config'] = $config;

// Load core classes
require_once __DIR__ . '/../app/core/Helpers.php';
require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/core/Controller.php';
require_once __DIR__ . '/../app/core/Model.php';

// Load routes
$router = new Router();
require __DIR__ . '/../routes/web.php';

// Get the URL from the query string
$url = $_GET['url'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];

// Dispatch the request
$router->dispatch($url, $method);
