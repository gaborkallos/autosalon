<?php
include_once '../config/database.php';


function get_all()
{
    $database = new Database();
    $conn = $database->getConnection();
    $query = "SELECT c.id, manufacture, model, year_of_manufacture, price, e.name FROM cars AS c
                    JOIN employee e on c.administrator = e.id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt;
}

function get_cars($key, $value)
{
    $database = new Database();
    $conn = $database->getConnection();
    if ($key == "id") {
        $query = "SELECT c.id, manufacture, model, year_of_manufacture, price, e.name FROM cars AS c
                    JOIN employee e on c.administrator = e.id
                    WHERE e.id = '$value'
                    ORDER BY c.id; ";
        $stmt = $conn->prepare($query);
    } elseif ($key == "manufacture") {
        $query = "SELECT c.id, manufacture, model, year_of_manufacture, price, e.name FROM cars  AS c
                    JOIN employee e on c.administrator = e.id
                    WHERE c.manufacture = '$value'
                    ORDER BY c.id; ";
        $stmt = $conn->prepare($query);
    } elseif ($key == "model") {
        $query = "SELECT c.id, manufacture, model, year_of_manufacture, price, e.name FROM cars  AS c
                    JOIN employee e on c.administrator = e.id
                    WHERE c.model = '$value' 
                    ORDER BY c.id;";
        $stmt = $conn->prepare($query);
    } elseif ($key == "year_of_manufacture") {
        $query = "SELECT c.id, manufacture, model, year_of_manufacture, price, e.name FROM cars  AS c
                    JOIN employee e on c.administrator = e.id
                    WHERE c.year_of_manufacture = '$value'
                    ORDER BY c.id;";
        $stmt = $conn->prepare($query);
    } elseif ($key == "price") {
        $query = "SELECT c.id, manufacture, model, year_of_manufacture, price, e.name FROM cars  AS c
                    JOIN employee e on c.administrator = e.id
                    WHERE c.price BETWEEN '$value[0]' AND '$value[1]'
                    ORDER BY c.id;";
        $stmt = $conn->prepare($query);
    } else {
        return false;
    }
    $stmt->execute();
    return $stmt;
}

function insert_car($car)
{
    $database = new Database();
    $conn = $database->getConnection();
    $query = "INSERT INTO cars (manufacture, model, year_of_manufacture, price, administrator)
                VALUES ('$car->manufacture', '$car->model', '$car->year_of_manufacture',
                '$car->price', '$car->administrator'); ";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        return true;
    }
    return false;
}

function update_car($car)
{
    $database = new Database();
    $conn = $database->getConnection();
    $query = "UPDATE cars SET 
                manufacture = '$car->manufacture',
                model = '$car->model',
                year_of_manufacture = '$car->year_of_manufacture',
                price = '$car->price',
                administrator = '$car->administrator'
                WHERE cars.id = '$car->id';";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        return true;
    }
    return false;

}

function delete_car($id)
{
    $database = new Database();
    $conn = $database->getConnection();
    $query = "DELETE FROM cars WHERE id='$id';";
    $stmt = $conn->prepare($query);
    $stmt->execute();
}
