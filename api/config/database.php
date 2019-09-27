<?php

class Database
{

    private $db_name = "autosalon";
    private $conn = null;

    public function __construct()
    {
        $this->conn = new PDO("psql:host=localhost;dbname=" . $this->db_name, 'postgres', '547725'
        );
        echo "Connection SUCCESS!";
    }

    public function getConn(): ?PDO
    {
        return $this->conn;
    }

    public function getConnection()
    {
        try {
            $this->conn = new PDO("psql:host=localhost;dbname=" . $this->db_name, 'postgres', '547725'
            );
            echo "Connection SUCCESS!";
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }


}

