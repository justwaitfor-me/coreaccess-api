<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class RequestLogger
{
    protected $uniqueId;

    public function __construct($uniqueId)
    {
        $this->uniqueId = $uniqueId;
    }

    public function __invoke(Request $request, RequestHandler $handler)
    {
        $body = (string)$request->getBody();
        $request->getBody()->rewind(); // Rewind the body stream after reading

        $logData = [
            'id' => $this->uniqueId,
            'method' => $request->getMethod(),
            'uri' => (string)$request->getUri(),
            'headers' => $request->getHeaders(),
            'body' => $body,
            'ip' => $_SERVER['REMOTE_ADDR'],
        ];

        $logFile = __DIR__ . '/../../storage/logs/requests.log';
        file_put_contents($logFile, json_encode($logData) . PHP_EOL, FILE_APPEND);

        $response = $handler->handle($request);
        return $response;
    }
}