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

    function get_all(){
        $query = "SELECT * FROM cars AS c
                    JOIN employee e on c.administrator = e.id";
        $stmt = $this->conn->prepare($query);
        $stmt-> execute();
        return $stmt;
    }

}