<?php
include_once '../config/database.php';
include_once '../objects/Employee.php';
include_once '../queries/employee_queries.php';

$database = new Database();
$conn = $database->getConnection();
$employee = new Employee($conn);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT');
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = get_all();
    get_results($stmt);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    if ($json != null) {
        http_response_code(200);
        $arr = json_decode($json, true);
        foreach ($arr as $key => $value) {
                $stmt = get_employee($key, $value);
                login($stmt);
        }
    } else {
        forbidden();
    }
}

function get_results($stmt)
{
    $number_of_employee = $stmt->rowCount();

    if ($number_of_employee > 0) {
        $employees = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $newEmployee = array(
                "id" => $id,
                "name" => $name,
                "username" => $username,
                "customer" => $new_customer = array(
                    "name" => $c_name,
                    "email" => $email,
                    "phone" => $phone,)
            );
            array_push($employees, $newEmployee);
        }
        http_response_code(200);
        echo json_encode($employees);
    } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "No employees are available!")
        );
    }
}

function forbidden()
{
    http_response_code(403);
    header('HTTP/1.0 403 Forbidden');
    echo json_encode(array("message" => "Forbidden"));
}

function login($stmt)
{
    if ($stmt->rowCount() > 0) {
        while ($login = $stmt->fetch(PDO::FETCH_ASSOC)) {
            http_response_code(200);
            echo json_encode($login);
        }
    } else {
        http_response_code(403);
        echo json_encode(array("message" => "Forbidden"));
    }
}


