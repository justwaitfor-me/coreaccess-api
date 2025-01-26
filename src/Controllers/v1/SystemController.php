<?php

namespace App\Controllers\v1;

use App\Helpers\DatabaseHelper;
use App\SQL\SystemSQL;

class SystemController
{
    protected $dbHelper;
    protected $systemSQL;
    protected $information;


    public function __construct()
    {
        $this->dbHelper = new DatabaseHelper();
        $this->systemSQL = new SystemSQL();

        $this->information = json_decode(file_get_contents(__DIR__ . '/../../Config/config.json'));
    }

    public function listUsers($request, $response, $args)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function getUser($request, $response, $args)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function deleteUser($request, $response, $args)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function getStats($request, $response, $args)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function getLogs($request, $response, $args)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }
}