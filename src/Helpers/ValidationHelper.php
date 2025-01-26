<?php
namespace App\Helpers;

class ValidationHelper {
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function validatePassword($password) {
        return strlen($password) >= 8; // Example: minimum 8 characters
    }

    public static function validateUsername($username) {
        return preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username); // Example: 3-20 alphanumeric characters
    }

    public static function validateRole($role) {
        $validRoles = ['admin', 'user', 'guest']; // Example roles
        return in_array($role, $validRoles);
    }

    public static function validateRequiredFields($data, $fields) {
        foreach ($fields as $field) {
            if (empty($data[$field])) {
                return false;
            }
        }
        return true;
    }
}