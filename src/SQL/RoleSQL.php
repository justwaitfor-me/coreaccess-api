<?php
namespace App\SQL;

class RoleSQL {
    const CREATE_ROLE = "INSERT INTO roles (name, description) VALUES (:name, :description)";
    const READ_ROLE = "SELECT * FROM roles WHERE id = :id";
    const UPDATE_ROLE = "UPDATE roles SET name = :name, description = :description WHERE id = :id";
    const DELETE_ROLE = "DELETE FROM roles WHERE id = :id";
    const LIST_ROLES = "SELECT * FROM roles";
}