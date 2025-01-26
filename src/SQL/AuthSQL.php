<?php
namespace App\SQL;

class AuthSQL {
    const SIGNUP = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
    const SIGNIN = "SELECT * FROM users WHERE username = :username LIMIT 1";
    const SIGNOUT = "UPDATE users SET last_logout = NOW() WHERE id = :id";
    const REFRESH_TOKEN = "UPDATE users SET token = :token WHERE id = :id";
    const FORGOT_PASSWORD = "UPDATE users SET reset_token = :token WHERE email = :email";
    const RESET_PASSWORD = "UPDATE users SET password = :password WHERE reset_token = :token";
}