<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/database.php';
include_once '../objects/shoots.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare shootrecords object
$product = new Product($db);

// set ID property of record to read
$product->ID = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of shootrecords to be edited
$product->readOne();

if($product->EvName!=null){
    // create array
    $product_arr = array(
        "ID" =>  $product->ID,
        "EvName" => $product->EvName,
        "EvRound" => $product->EvRound,
        "EvOrg" => $product->EvOrg,
        "EvDiscipline" => $product->EvDiscipline,
        "EvDate" => $product->EvDate,
        "EvStatus" => $product->EvStatus,
        "EvRole" => $product->EvRole,
        "EvLevel" => $product->EvLevel,
        "EvOptional" => $product->EvOptional,
        );

    // set response code - 200 OK
   // http_response_code(200);

    // make it json format
    echo json_encode($product_arr);
}

else{
    // set response code - 404 Not found
  //  http_response_code(404);

    // tell the user shootrecords does not exist
    echo json_encode(array("message" => "Product does not exist."));
}
?>