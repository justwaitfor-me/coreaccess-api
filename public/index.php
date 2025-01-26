<?php
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// Add Routing Middleware
$app->addRoutingMiddleware();

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// Ensure all output is JSON
header('Content-Type: application/json');

// Check if the current URI has /v1 or any other version
$uri = $_SERVER['REQUEST_URI'];
if (preg_match('/\/v(\d+)/', $uri, $matches)) {
    $version = $matches[1];
    // Include routes based on the version
    $routeFile = __DIR__ . "/../src/Routes/v{$version}.php";
    if (file_exists($routeFile)) {
        require_once $routeFile;
    } else {
        // Handle the error, e.g., default to version 1 or show an error message
        require_once __DIR__ . '/../src/Routes/v1.php';
    }
} else {
    // Default to version 1 if no version is specified
    require_once __DIR__ . '/../src/Routes/v1.php';
}

$app->run();