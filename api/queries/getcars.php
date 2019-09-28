<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/Car.php';

$database = new Database();
$conn = $database->getConn();
$car = new Car($conn);

$stmt = $car->get_all();
$number_of_cars = $stmt->rowCount();

if($number_of_cars>0){
    $cars=array();
    $cars["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $newCar=array(
            "id" => $id,
            "manufacture" => $manufacture,
            "model" => $model,
            "year_of_manufacture" => $year_of_manufacture,
            "price" => $price,
            "administrator" => $new_employee=array(
                "id" => $id,
                "name" => $name,
                "username" => $username
            )
        );
        array_push($cars["records"], $newCar);
    }
    http_response_code(200);
    echo json_encode($cars);
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No cars available!")
    );
}
