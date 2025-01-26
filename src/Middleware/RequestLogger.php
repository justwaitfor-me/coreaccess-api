<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class RequestLogger
{
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $uniqueId = bin2hex(random_bytes(16));
        $logData = [
            'id' => $uniqueId,
            'method' => $request->getMethod(),
            'uri' => (string)$request->getUri(),
            'headers' => $request->getHeaders(),
            'body' => (string)$request->getBody()
        ];

        $logFile = __DIR__ . '/../../storage/logs/requests.log';
        file_put_contents($logFile, json_encode($logData) . PHP_EOL, FILE_APPEND);

        $response = $handler->handle($request);
        return $response;
    }
}