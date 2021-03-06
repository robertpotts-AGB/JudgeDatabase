<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/database.php';
include_once '../objects/shoots.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare shootrecords object
$product = new Product($db);

// get id of shootrecords to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of shootrecords to be edited
$product->ID = $data->ID;

// set shootrecords property values
$product->EvName = $data->EvName;
$product->EvRound = $data->EvRound;
$product->EvDate = $data->EvDate;
$product->EvDiscipline = $data->EvDiscipline;
$product->EvRole = $data->EvRole;
$product->EvStatus = $data->EvStatus;
$product->EvLevel = $data->EvLevel;
$product->EvOptional = $data->EvOptional;
$product->EvOrg = $data->EvOrg;
$product->update();
http_response_code(200);
// update the shootrecords
//if($shootrecords->update()){

    // set response code - 200 ok
//    http_response_code(200);

    // tell the user
//    echo json_encode(array("message" => "Product was updated."));/
//}

// if unable to update the shootrecords, tell the user
//else{

    // set response code - 503 service unavailable
 //   http_response_code(503);

    // tell the user
//    echo json_encode(array("message" => "Unable to update shootrecords."));
//}
?>