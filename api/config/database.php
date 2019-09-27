<?php
class Database{

    private $table_name = "autosalon";
    private $conn;

    public function getConnection(){
        try{
            $this->conn = new PDO("psql:host=localhost;dbname=" . $this->table_name, 'postgres', '547725');
            echo "Connection SUCCESS!";
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }


}

