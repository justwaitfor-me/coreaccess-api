<?php
namespace App\SQL;

class UserSQL {
    const CREATE_USER = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
    const GET_USER_BY_ID = "SELECT * FROM users WHERE id = :id";
    const UPDATE_USER = "UPDATE users SET username = :username, email = :email WHERE id = :id";
    const DELETE_USER = "DELETE FROM users WHERE id = :id";
    const GET_ALL_USERS = "SELECT * FROM users";
}