<?php

namespace App\Controllers\v1;

use App\Helpers\DatabaseHelper;
use App\SQL\AdminSQL;

class AdminController
{
    protected $dbHelper;
    protected $adminSQL;
    protected $information;

    public function __construct()
    {
        $this->dbHelper = new DatabaseHelper();
        $this->adminSQL = new AdminSQL();

        $this->information = json_decode(file_get_contents(__DIR__ . '/../../Config/config.json'));
    }

    public function getUserProfile($id)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function updateUser($id, $data)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function deleteUser($id)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function changeUserRole($id, $roleId)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }
}