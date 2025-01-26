<?php
namespace App\Controllers\v1;

use App\Helpers\DatabaseHelper;
use App\SQL\SecuritySQL;

class SecurityController
{
    protected $dbHelper;
    protected $securitySQL;
    protected $information;

    public function __construct()
    {
        $this->dbHelper = new DatabaseHelper();
        $this->securitySQL = new SecuritySQL();

        $this->information = json_decode(file_get_contents(__DIR__ . '/../../Config/config.json'));
    }

    public function getLogs()
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function enable2FA()
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function disable2FA()
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }
}