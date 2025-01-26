<?php

namespace App\Controllers\v1;

use App\Helpers\DatabaseHelper;
use App\Helpers\ValidationHelper;
use App\SQL\SessionSQL;

class SessionController
{
    protected $dbHelper;
    protected $validationHelper;
    protected $sessionModel;
    protected $information;

    public function __construct()
    {
        $this->dbHelper = new DatabaseHelper();
        $this->validationHelper = new ValidationHelper();
        $this->sessionModel = new SessionSQL();

        $this->information = json_decode(file_get_contents(__DIR__ . '/../../Config/config.json'));
    }

    public function listSessions($request, $response, $args)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function endAllSessions($request, $response, $args)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function endSession($request, $response, $args)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }
}
