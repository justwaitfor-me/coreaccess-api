<?php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
$secret = getenv('JWT_SECRET');

// JWT configuration settings
return [
    'secret' => $secret, // Replace with your actual secret key
    'algorithm' => 'HS256', // JWT algorithm
    'expiration' => 3600, // Token expiration time in seconds
];