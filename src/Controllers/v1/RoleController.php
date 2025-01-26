<?php
namespace App\Controllers\v1;

use App\Helpers\DatabaseHelper;
use App\SQL\RoleSQL;

class RoleController
{
    protected $dbHelper;
    protected $roleModel;
    protected $information;

    public function __construct()
    {
        $this->dbHelper = new DatabaseHelper();
        $this->roleModel = new RoleSQL();

        $this->information = json_decode(file_get_contents(__DIR__ . '/../../Config/config.json'));
    }

    public function listRoles($request, $response)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function createRole($request, $response)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function updateRole($request, $response, $args)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }

    public function deleteRole($request, $response, $args)
    {
        $data = [
            "#" => $this->information,
            "message" => "",
            "body" => Null
        ];

        return $data;
    }
}