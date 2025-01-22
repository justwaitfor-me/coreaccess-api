<?php

namespace App\Services;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;

class AuthService
{
    private $jwtSecret;

    public function __construct($jwtSecret)
    {
        $this->jwtSecret = $jwtSecret;
    }

    public function validateCredentials($email, $password)
    {
        $user = $this->findUserByEmail($email);
        if ($user && password_verify($password, $user->getPassword())) {
            return $user;
        }
        return null;
    }

    private function findUserByEmail($email)
    {
        // Logic to find a user by email
        // This is a placeholder implementation. Replace it with actual database query logic.
        $users = User::all();
        foreach ($users as $user) {
            if ($user->getEmail() === $email) {
                return $user;
            }
        }
        return null;
    }

    public function generateToken($user)
    {
        $payload = [
            'iat' => time(),
            'exp' => time() + (60 * 60), // Token valid for 1 hour
            'sub' => $user->getId(),
        ];
        return JWT::encode($payload, $this->jwtSecret);
    }

    public function decodeToken($token)
    {
        try {
            return JWT::decode($token, $this->jwtSecret, ['HS256']);
        } catch (ExpiredException $e) {
            return null; // Token has expired
        } catch (\Exception $e) {
            return null; // Invalid token
        }
    }
}