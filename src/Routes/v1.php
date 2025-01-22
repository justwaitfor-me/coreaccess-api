<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Controllers\RoleController;
use App\Controllers\AdminController;
use App\Controllers\SessionController;
use App\Controllers\SecurityController;
use App\Controllers\SystemController;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// Authentication
$app->post('/auth/signup', [AuthController::class, 'signup']);
$app->post('/auth/signin', [AuthController::class, 'signin']);
$app->post('/auth/signout', [AuthController::class, 'signout']);
$app->post('/auth/refresh', [AuthController::class, 'refresh']);
$app->post('/auth/forgot-password', [AuthController::class, 'forgotPassword']);
$app->post('/auth/reset-password', [AuthController::class, 'resetPassword']);

// User profile
$app->get('/users/me', [UserController::class, 'getProfile']);
$app->patch('/users/me', [UserController::class, 'updateProfile']);

// Admin user management
$app->get('/users/{id}', [AdminController::class, 'getUserProfile']);
$app->patch('/users/{id}', [AdminController::class, 'updateUser']);
$app->delete('/users/{id}', [AdminController::class, 'deleteUser']);
$app->patch('/users/{id}/roles', [AdminController::class, 'changeUserRole']);

// Role and permission management
$app->get('/roles', [RoleController::class, 'listRoles']);
$app->post('/roles', [RoleController::class, 'createRole']);
$app->patch('/roles/{id}', [RoleController::class, 'updateRole']);
$app->delete('/roles/{id}', [RoleController::class, 'deleteRole']);

// Session management
$app->get('/sessions', [SessionController::class, 'listSessions']);
$app->delete('/sessions/{id}', [SessionController::class, 'endSession']);
$app->delete('/sessions/all', [SessionController::class, 'endAllSessions']);

// Security features
$app->get('/security/logs', [SecurityController::class, 'getLogs']);
$app->post('/security/enable-2fa', [SecurityController::class, 'enable2FA']);
$app->post('/security/disable-2fa', [SecurityController::class, 'disable2FA']);

// System management (for Admins)
// User management
$app->get('/admin/users', [SystemController::class, 'listUsers']);
$app->get('/admin/users/{id}', [SystemController::class, 'getUser']);
$app->delete('/admin/users/{id}', [SystemController::class, 'deleteUser']);

// API statistics
$app->get('/admin/stats', [SystemController::class, 'getStats']);
$app->get('/admin/logs', [SystemController::class, 'getLogs']);

$app->run();