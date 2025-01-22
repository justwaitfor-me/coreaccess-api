<?php
require_once '../vendor/autoload.php';

use Slim\Factory\AppFactory;
use App\Controllers\AuthController;

$app = AppFactory::create();

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
