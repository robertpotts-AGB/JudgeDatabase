<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/shoots.php';

// instantiate database and shootrecords object
$database = new Database();
$db = $database->getConnection();

// initialize object
$product = new Product($db);
// query products
$stmt = $product->OrganisationCount();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0) {

    // products array


    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    $data= array();
        foreach ($stmt as $row){
            $data[] = $row;
        }

//$products_arr["records"],


    // set response code - 200 OK
    // http_response_code(200);

    // show products data in json format
    echo json_encode($data);
}
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>