<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SessionController
{
    public function listSessions(Request $request, Response $response, $args)
    {
        // List all sessions of the user
        $headers = $request->getHeaders();
        // ...
        return $response;
    }

    public function endSession(Request $request, Response $response, $args)
    {
        // End a specific session
        $headers = $request->getHeaders();
        // ...
        return $response;
    }

    public function endAllSessions(Request $request, Response $response, $args)
    {
        // End all sessions of the user
        $headers = $request->getHeaders();
        // ...
        return $response;
    }
}