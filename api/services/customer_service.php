<?php
include_once '../config/database.php';
include_once '../objects/Customer.php';
include_once '../queries/customer_queries.php';

$database = new Database();
$conn = $database->getConnection();
$customer = new Customer($conn);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = get_all();
    get_results($stmt);
}

function get_results($stmt)
{
    $number_of_cudtomer = $stmt->rowCount();

    if ($number_of_cudtomer > 0) {
        $customer = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $new_customer = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "phone" => $phone,);
            array_push($customer, $new_customer);
        }
        http_response_code(200);
        echo json_encode($customer);
    } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "No employees are available!")
        );
    }
}