<?php

namespace App\Controllers\v1;

use App\Helpers\DatabaseHelper;
use App\SQL\UserSQL;

class UserController
{
    protected $dbHelper;
    protected $userModel;
    protected $information;

    public function __construct()
    {
        $this->dbHelper = new DatabaseHelper();
        $this->userModel = new UserSQL();

        $this->information = json_decode(file_get_contents(__DIR__ . '/../../Config/config.json'));
    }

    public function getProfile($request, $response, $args)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function updateProfile($request, $response)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }
}