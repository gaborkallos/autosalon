<?php

include_once '../config/database.php';
include_once '../objects/Car.php';
include_once '../queries/car_queries.php';

$database = new Database();
$conn = $database->getConnection();
$car = new Car($conn);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    $stmt = get_all();
    get_results($stmt);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    if ($json != null) {
        $arr = json_decode($json, true);
        foreach ($arr as $key => $value) {
            $stmt = get_cars($key, $value);
            if ($stmt != false) {
                get_results($stmt);
            } else {
                forbidden();
            }
        }
    } else {
        forbidden();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $json = file_get_contents('php://input');
    if ($json != null) {
        $car = json_decode($json);
        if(!property_exists($car, "id")){
            insert_car($car);
        }else{
            update_car($car);
        }
        $stmt = get_all();
        get_results($stmt);
    } else {
        forbidden();
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $json = file_get_contents('php://input');
    echo json_encode($json);
    if ($json != null) {
        $arr = json_decode($json, true);
        foreach ($arr as $key => $value) {
            delete_car($value);
            $stmt = get_all();
            get_results($stmt);
        }
    }else{
        forbidden();
    }
} else {
    forbidden();
}

function get_results($stmt)
{
    $number_of_cars = $stmt->rowCount();

    if ($number_of_cars > 0) {
        $cars = array();
        $cars["records"] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $newCar = array(
                "id" => $id,
                "manufacture" => $manufacture,
                "model" => $model,
                "year_of_manufacture" => $year_of_manufacture,
                "price" => $price,
                "administrator" => $new_employee = array(
                    "name" => $name,
                )
            );
            array_push($cars["records"], $newCar);
        }
        http_response_code(200);
        echo json_encode($cars);
    } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "No cars are available!")
        );
    }
}

function forbidden()
{
    http_response_code(403);
    header('HTTP/1.0 403 Forbidden');
    echo json_encode(array("message" => "Forbidden"));
}

