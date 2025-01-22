<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AdminController
{
    public function getUserProfile(Request $request, Response $response, $args)
    {
        // Get a specific user's profile (Admin)
        $headers = $request->getHeaders();
        // ...
        return $response;
    }

    public function updateUser(Request $request, Response $response, $args)
    {
        // Update a user's data (Admin)
        $headers = $request->getHeaders();
        $body = $request->getParsedBody();
        // ...
        return $response;
    }

    public function deleteUser(Request $request, Response $response, $args)
    {
        // Delete a user (Admin)
        $headers = $request->getHeaders();
        // ...
        return $response;
    }

    public function changeUserRole(Request $request, Response $response, $args)
    {
        // Change a user's role (Admin)
        $headers = $request->getHeaders();
        $body = $request->getParsedBody();
        // ...
        return $response;
    }
}