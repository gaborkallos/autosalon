<?php


include_once '../config/database.php';
include_once '../objects/Car.php';

$database = new Database();
$conn = $database->getConnection();
$car = new Car($conn);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $stmt = $car->get_all();
    get_results($stmt);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //TODO: code here the POST request
    $json = file_get_contents('php://input');
    if ($json != null) {
        http_response_code(200);
        $arr = json_decode($json, true);
        foreach($arr as $key=>$value){
            $stmt = $car->get_cars_by_admin($value);
            get_results($stmt);
        }
    } else {
        http_response_code(403);
        header('HTTP/1.0 403 Forbidden');
        echo json_encode(
            array("message" => "Forbidden")
        );
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    //TODO: code here the PUT request
    echo "I got a PUT!";

} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    //TODO: code here the DELETE request
    echo "I got a DELETE!";

} else {
    //TODO: code here OTHER requests
    http_response_code(403);
    header('HTTP/1.0 403 Forbidden');
    echo json_encode(
        array("message" => "Forbidden")
    );
}

function get_results($stmt){
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
            array("message" => "No cars available!")
        );
    }
}
