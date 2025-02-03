<?php

use Slim\Factory\AppFactory;
use App\Middleware\RequestLogger;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$uniqueId = bin2hex(random_bytes(16));

// Register middleware
$app->add(new RequestLogger($uniqueId));

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

// Add Routing Middleware
$app->addRoutingMiddleware();

// Add the body parsing middleware
$app->addBodyParsingMiddleware();

// Add Error Handling Middleware
$errorMiddleware = $app->addErrorMiddleware(false, false, false);
$errorMiddleware->setDefaultErrorHandler(function ($request, $exception, $displayErrorDetails, $logErrors, $logErrorDetails) use ($app) {
    $response = $app->getResponseFactory()->createResponse();
    $result = ['message' => 'Route not found', 'code' => 404, 'requestBody' => $request->getParsedBody()];
    $response->getBody()->write(json_encode($result));
    return $response->withHeader('Content-Type', 'application/json')->withStatus(404);
});

// Middleware to handle CORS
$app->add(function ($request, $handler) use ($uniqueId) {
    $response = $handler->handle($request);
    return $response
        ->withHeader('X-Request-UUID', $uniqueId)

        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
        ->withHeader('Access-Control-Allow-Credentials', 'true')
        ->withHeader('Access-Control-Expose-Headers', 'Authorization, Content-Length')
        ->withHeader('Access-Control-Max-Age', '3600');
});

// Test
$app->any($routeBaseBefore . $routePrefix . '/test', function ($request, $response) {
    $parsedBody = $request->getParsedBody();
    $result = ['body' => $parsedBody, 'message' => 'This is a test route.', 'code' => 200];
    $response->getBody()->write(json_encode($result));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
