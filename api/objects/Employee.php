<?php


class Employee
{
    private $conn;
    private $table_name = "employee";

    public int $id;
    public string $name;
    public string $username;
    public string $password;

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