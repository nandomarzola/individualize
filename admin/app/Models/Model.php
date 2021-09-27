<?php

namespace App\Models;

class Model
{
    private $host = "localhost";
    private $usuario = "indivi14_i9";
    private $senha = "banco102030";
    private $db = "indivi14_hmkt";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->usuario, $this->senha);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }

    public function lastInsert(){
        return $this->conn->lastInsertId();
    }

}
