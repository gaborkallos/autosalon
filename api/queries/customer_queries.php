<?php

include_once '../config/database.php';


function get_all()
{
    $database = new Database();
    $conn = $database->getConnection();
    $query = "SELECT * FROM customer AS c";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt;
}

function insert_customer($customer){
    $database = new Database();
    $conn = $database->getConnection();
    $query = "INSERT INTO customer (name, email, phone)
                VALUES ('$customer->name', '$customer->email', '$customer->phone'); ";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        return true;
    }
    return false;
}