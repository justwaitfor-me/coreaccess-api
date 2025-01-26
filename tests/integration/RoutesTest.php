<?php
require __DIR__ . '/../../vendor/autoload.php'; 

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class RoutesTest extends TestCase
{
    private $client;
    private $baseUri = 'http://localhost'; // Adjust the base URI as needed

    protected function setUp(): void
    {
        $this->client = new Client(['base_uri' => $this->baseUri]);
    }

    public function routeProvider()
    {
        return [
            ['POST', '/v1/auth/signup'],
            ['POST', '/v1/auth/signin'],
            ['POST', '/v1/auth/signout'],
            ['POST', '/v1/auth/refresh'],
            ['POST', '/v1/auth/forgot-password'],
            ['POST', '/v1/auth/reset-password'],
            ['GET', '/v1/users/me'],
            ['PATCH', '/v1/users/me'],
            ['GET', '/v1/users/{id}'],
            ['PATCH', '/v1/users/{id}'],
            ['DELETE', '/v1/users/{id}'],
            ['PATCH', '/v1/users/{id}/roles'],
            ['GET', '/v1/roles'],
            ['POST', '/v1/roles'],
            ['PATCH', '/v1/roles/{id}'],
            ['DELETE', '/v1/roles/{id}'],
            ['GET', '/v1/sessions'],
            ['DELETE', '/v1/sessions/all'],
            ['DELETE', '/v1/sessions/{id}'],
            ['GET', '/v1/security/logs'],
            ['POST', '/v1/security/enable-2fa'],
            ['POST', '/v1/security/disable-2fa'],
            ['GET', '/v1/admin/users'],
            ['GET', '/v1/admin/users/{id}'],
            ['DELETE', '/v1/admin/users/{id}'],
            ['GET', '/v1/admin/stats'],
            ['GET', '/v1/admin/logs'],
        ];
    }

    /**
     * @dataProvider routeProvider
     */
    public function testRoutesReturn200($method, $uri)
    {
        $response = $this->client->request($method, $uri, [
            'http_errors' => false,
        ]);

        $this->assertEquals(200, $response->getStatusCode(), "Failed asserting that {$method} {$uri} returns 200.");
    }
}