<?php

namespace App\Controllers\v1;

use App\Helpers\DatabaseHelper;
use App\Helpers\AuthHelper;
use App\SQL\AuthSQL;

class AuthController
{
    protected $dbHelper;
    protected $authHelper;
    protected $authSQL;
    protected $information;

    public function __construct()
    {
        $this->dbHelper = new DatabaseHelper();
        $this->authHelper = new AuthHelper();
        $this->authSQL = new AuthSQL();

        $this->information = json_decode(file_get_contents(__DIR__ . '/../../Config/config.json'));
    }

    public function signup($request, $response)
    {
        $data = [
            "#" => $this->information,
            "message" => "developing",
            "body" => 
        $request->getParsedBody()
        ];

        return $data;
    }

    public function signin($request, $response)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function signout($request, $response)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function refresh($request, $response)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function forgotPassword($request, $response)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function resetPassword($request, $response)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }
}