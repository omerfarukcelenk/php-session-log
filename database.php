<?php

class Database
{
    private $host = "localhost";
    private $db_name = "mygiris";
    private $username = "root";
    private $password = "";
    private $conn;

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . trim($this->db_name, " "), $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo 'Connection error : ' . $exception->getMessage();
        }

        return $this->conn;
    }
}