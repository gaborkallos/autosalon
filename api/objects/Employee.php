<?php


class Employee
{
    private $conn;
    private $table_name = "employee";

    public $id;
    public $name;
    public $username;
    public $password;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    function get_employee_by_id($id){
        $stmt = $this->conn->execute("SELECT * FROM " . $this->table_name .
                                    " WHERE id=$id;" );
        return $stmt;
    }
}