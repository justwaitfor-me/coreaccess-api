<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController
{
    public function getProfile(Request $request, Response $response, $args)
    {
        // Get the current user's data
        $headers = $request->getHeaders();
        // ...
        return $response;
    }

    public function updateProfile(Request $request, Response $response, $args)
    {
        // Update the current user's profile
        $headers = $request->getHeaders();
        $body = $request->getParsedBody();
        // ...
        return $response;
    }
}