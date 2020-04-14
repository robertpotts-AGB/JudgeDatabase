<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/shoots.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if (
    !empty($data->AGBNo) &&
    !empty($data->EvName) &&
    !empty($data->EvRound) &&
    !empty($data->EvDate) &&
    !empty($data->EvOrg) &&
    !empty($data->EvLevel) &&
    !empty($data->EvDiscipline) &&
    !empty($data->EvOptional) &&
    !empty($data->EvStatus) &&
    !empty($data->EvRole)
) {

    // set product property values
    $product->AGBNo = $data->AGBNo;
    $product->EvName = $data->EvName;
    $product->EvRound = $data->EvRound;
    $product->EvDate = $data->EvDate;
    $product->EvOrg = $data->EvOrg;
    $product->EvLevel = $data->EvLevel;
    $product->EvDiscipline = $data->EvDiscipline;
    $product->EvOptional = $data->EvOptional;
    $product->EvStatus = $data->EvStatus;
    $product->EvRole = $data->EvRole;

    // create the product
    if ($product->create()) {

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "Shoot Added."));
    } // if unable to create the product, tell the user
    else {

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create shoot."));
    }
} // tell the user data is incomplete
else {

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
