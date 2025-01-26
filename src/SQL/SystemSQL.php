<?php
namespace App\SQL;

class SystemSQL {
    public static function listUsers() {
        return "SELECT * FROM users";
    }

    public static function getUser($id) {
        return "SELECT * FROM users WHERE id = :id";
    }

    public static function deleteUser($id) {
        return "DELETE FROM users WHERE id = :id";
    }

    public static function getStats() {
        return "SELECT COUNT(*) AS user_count FROM users";
    }

    public static function getLogs() {
        return "SELECT * FROM logs ORDER BY created_at DESC";
    }
}