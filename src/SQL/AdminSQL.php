<?php
namespace App\SQL;

class AdminSQL {
    const GET_ALL_USERS = "SELECT * FROM users";
    const GET_USER_BY_ID = "SELECT * FROM users WHERE id = :id";
    const UPDATE_USER = "UPDATE users SET name = :name, email = :email WHERE id = :id";
    const DELETE_USER = "DELETE FROM users WHERE id = :id";
    const CHANGE_USER_ROLE = "UPDATE users SET role_id = :role_id WHERE id = :id";
}