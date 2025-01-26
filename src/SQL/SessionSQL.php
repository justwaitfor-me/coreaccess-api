<?php
namespace App\SQL;

class SessionSQL {
    const CREATE_SESSION = "INSERT INTO sessions (user_id, token, created_at, expires_at) VALUES (:user_id, :token, :created_at, :expires_at)";
    const GET_SESSION = "SELECT * FROM sessions WHERE token = :token";
    const DELETE_SESSION = "DELETE FROM sessions WHERE token = :token";
    const END_ALL_SESSIONS = "DELETE FROM sessions WHERE user_id = :user_id";
    const LIST_SESSIONS = "SELECT * FROM sessions WHERE user_id = :user_id";
}