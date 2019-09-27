<?php

class Car
{
    private $conn;
    private $table_name = "cars";

    public $id;
    public $manufacture;
    public $model;
    public $year_of_manufacture;
    public $price;
    public $administrator;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    function read_all(){
        return $this->conn->prepare ("SELECT * FROM " . $this->table_name . " c
                    LEFT JOIN employee ON c.administrator = id;")->execute();
    }

}