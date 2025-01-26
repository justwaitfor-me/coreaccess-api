<?php
use App\Controllers\v1\AuthController;
use App\Controllers\v1\UserController;
use App\Controllers\v1\RoleController;
use App\Controllers\v1\AdminController;
use App\Controllers\v1\SessionController;
use App\Controllers\v1\SecurityController;
use App\Controllers\v1\SystemController;
use App\Middleware\RequestLogger;

$version = 1;
$routePrefix = "v{$version}";
$routeBase = $_SERVER['REQUEST_URI'];
$routeBaseBefore = strtok($routeBase, $routePrefix);
$routeBaseAfter = substr($routeBase, strlen($routeBaseBefore));

// Register middleware
$app->add(new RequestLogger());

// Test
$app->get($routeBaseBefore . $routePrefix . '/test', function ($request, $response) {
    $result = ['message' => 'This is a test route.'];
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode($result));
    return $response->withHeader('Content-Type', 'application/json');
});

// Authentication
$app->post($routeBaseBefore . $routePrefix . '/auth/signup', function ($request, $response, $args) {
    $result = (new AuthController())->signup($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->post($routeBaseBefore . $routePrefix . '/auth/signin', function ($request, $response, $args) {
    $result = (new AuthController())->signin($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->post($routeBaseBefore . $routePrefix . '/auth/signout', function ($request, $response, $args) {
    $result = (new AuthController())->signout($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->post($routeBaseBefore . $routePrefix . '/auth/refresh', function ($request, $response, $args) {
    $result = (new AuthController())->refresh($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->post($routeBaseBefore . $routePrefix . '/auth/forgot-password', function ($request, $response, $args) {
    $result = (new AuthController())->forgotPassword($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->post($routeBaseBefore . $routePrefix . '/auth/reset-password', function ($request, $response, $args) {
    $result = (new AuthController())->resetPassword($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});

// User profile
$app->get($routeBaseBefore . $routePrefix . '/users/me', function ($request, $response, $args) {
    $result = (new UserController())->getProfile($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->patch($routeBaseBefore . $routePrefix . '/users/me', function ($request, $response, $args) {
    $result = (new UserController())->updateProfile($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});

// Admin user management
$app->get($routeBaseBefore . $routePrefix . '/users/{id}', function ($request, $response, $args) {
    $result = (new AdminController())->getUserProfile($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->patch($routeBaseBefore . $routePrefix . '/users/{id}', function ($request, $response, $args) {
    $result = (new AdminController())->updateUser($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->delete($routeBaseBefore . $routePrefix . '/users/{id}', function ($request, $response, $args) {
    $result = (new AdminController())->deleteUser($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->patch($routeBaseBefore . $routePrefix . '/users/{id}/roles', function ($request, $response, $args) {
    $result = (new AdminController())->changeUserRole($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});

// Role and permission management
$app->get($routeBaseBefore . $routePrefix . '/roles', function ($request, $response, $args) {
    $result = (new RoleController())->listRoles($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->post($routeBaseBefore . $routePrefix . '/roles', function ($request, $response, $args) {
    $result = (new RoleController())->createRole($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->patch($routeBaseBefore . $routePrefix . '/roles/{id}', function ($request, $response, $args) {
    $result = (new RoleController())->updateRole($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->delete($routeBaseBefore . $routePrefix . '/roles/{id}', function ($request, $response, $args) {
    $result = (new RoleController())->deleteRole($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});

// Session management
$app->get($routeBaseBefore . $routePrefix . '/sessions', function ($request, $response, $args) {
    $result = (new SessionController())->listSessions($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode($result));
    return $response->withHeader('Content-Type', 'application/json');
});

// Define static route before variable route
$app->delete($routeBaseBefore . $routePrefix . '/sessions/all', function ($request, $response, $args) {
    $result = (new SessionController())->endAllSessions($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->delete($routeBaseBefore . $routePrefix . '/sessions/{id}', function ($request, $response, $args) {
    $result = (new SessionController())->endSession($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});

// Security features
$app->get($routeBaseBefore . $routePrefix . '/security/logs', function ($request, $response, $args) {
    $result = (new SecurityController())->getLogs($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->post($routeBaseBefore . $routePrefix . '/security/enable-2fa', function ($request, $response, $args) {
    $result = (new SecurityController())->enable2FA($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->post($routeBaseBefore . $routePrefix . '/security/disable-2fa', function ($request, $response, $args) {
    $result = (new SecurityController())->disable2FA($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});

// System management (for Admins)
// User management
$app->get($routeBaseBefore . $routePrefix . '/admin/users', function ($request, $response, $args) {
    $result = (new SystemController())->listUsers($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->get($routeBaseBefore . $routePrefix . '/admin/users/{id}', function ($request, $response, $args) {
    $result = (new SystemController())->getUser($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->delete($routeBaseBefore . $routePrefix . '/admin/users/{id}', function ($request, $response, $args) {
    $result = (new SystemController())->deleteUser($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});

// API statistics
$app->get($routeBaseBefore . $routePrefix . '/admin/stats', function ($request, $response, $args) {
    $result = (new SystemController())->getStats($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->get($routeBaseBefore . $routePrefix . '/admin/logs', function ($request, $response, $args) {
    $result = (new SystemController())->getLogs($request, $response, $args);
    $response->getBody()->rewind();
    $response->getBody()->write(json_encode((array)$result));
    return $response->withHeader('Content-Type', 'application/json');
});