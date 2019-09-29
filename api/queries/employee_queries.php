<?php
include_once '../config/database.php';

function get_all()
{
    $database = new Database();
    $conn = $database->getConnection();
    $query = "SELECT e.id, e.name, e.username, c2.name AS c_name, c2.email, c2.phone  FROM employee AS e
                JOIN customer c2 on e.customer = c2.id; 
                ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt;
}

function get_employee($key, $value)
{
    $database = new Database();
    $conn = $database->getConnection();
    if ($key == "login") {
        $query = "SELECT name, username FROM employee
                    WHERE username = '$value[0]' AND password = '$value[1]'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt;
    } elseif ($key == "id") {
        $query = "SELECT e.name, e.username, c2.name AS c_name, c2.phone, c2.email FROM employee AS e
                    JOIN customer c2 on e.customer = c2.id 
                    WHERE e.id = '$value';";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
