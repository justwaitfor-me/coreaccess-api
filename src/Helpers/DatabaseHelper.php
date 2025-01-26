<?php
namespace App\Helpers;

use PDO;
use PDOException;

class DatabaseHelper {
    // Include the database configuration file
    private $config;
    private $connection;

    public function __construct() {
        $this->config = include(__DIR__ . '/../Config/database.php');
        $this->connect();
    }

    private function connect() {
        try {
            $this->connection = new PDO("mysql:host={$this->config['host']};dbname={$this->config['database']}", $this->config['username'], $this->config['password']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo json_encode(["error" => "Failed to connect to the database", "message" => $e->getMessage()]);
            exit;
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function executeQuery($query, $params = []) {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetchAll($query, $params = []) {
        $stmt = $this->executeQuery($query, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchOne($query, $params = []) {
        $stmt = $this->executeQuery($query, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}