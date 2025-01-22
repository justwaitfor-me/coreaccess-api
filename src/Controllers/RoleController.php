<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RoleController
{
    public function listRoles(Request $request, Response $response, $args)
    {
        // List all available roles
        $headers = $request->getHeaders();
        // ...
        return $response;
    }

    public function createRole(Request $request, Response $response, $args)
    {
        // Create a new role (Admin)
        $headers = $request->getHeaders();
        $body = $request->getParsedBody();
        // ...
        return $response;
    }

    public function updateRole(Request $request, Response $response, $args)
    {
        // Update a role (Admin)
        $headers = $request->getHeaders();
        $body = $request->getParsedBody();
        // ...
        return $response;
    }

    public function deleteRole(Request $request, Response $response, $args)
    {
        // Delete a role (Admin)
        $headers = $request->getHeaders();
        // ...
        return $response;
    }
}