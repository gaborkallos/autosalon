<?php

class Database
{

    private $db_name = "autosalon";
    private $conn = null;

    public function __construct()
    {
        $this->conn = new PDO("pgsql:host=localhost;dbname=" . $this->db_name, 'postgres', '547725'
        );
    }

    public function getConnection(): ?PDO
    {
        return $this->conn;
    }


}

