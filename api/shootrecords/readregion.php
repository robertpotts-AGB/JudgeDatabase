<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

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
$stmt = $product->readJLO();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0) {

    // products array
    $products_arr = array();
    $products_arr["records"] = array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $product_item = array(
            "ID" => $ID,
            "EvName" => $EvName,
            "EvDate" => $EvDate,
            "EvRound" => $EvRound,
            "EvOrg" => $EvOrg,
            "EvLevel" => $EvLevel,
            "EvDiscipline" => $EvDiscipline,
            "EvOptional" => $EvOptional,
            "EvStatus" => $EvStatus,
            "EvRole" => $EvRole,
            "region" => $EvRegion,
            "display_name" => $display_name

        );
//$products_arr["records"],
        array_push( $products_arr["records"],$product_item);
    }

    // set response code - 200 OK
   // http_response_code(200);

    // show products data in json format
    echo json_encode($products_arr);
}
else{

        // set response code - 404 Not found
    //    http_response_code(404);

        // tell the user no products found
        echo json_encode(
            array("message" => "No products found.")
        );
}