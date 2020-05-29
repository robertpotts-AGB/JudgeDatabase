<?php
Session_start();
// get database connection
include_once '../config/database.php';
$agbno=($_SESSION["agbID"]);

$database = new Database();
$db = $database->getConnection();


$result = "SELECT * FROM shootrec WHERE AGBNo='$agbno' ";
//$shrecs = $db->query($result);

$stmt = $db->prepare($result);
// execute query
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//Get the column names.
$columnNames = array();
if(!empty($rows)){
    //We only need to loop through the first row of our result
    //in order to collate the column names.
    $firstRow = $rows[0];
    foreach($firstRow as $colName => $val){
        $columnNames[] = $colName;
    }
}

//Setup the filename that our CSV will have when it is downloaded.
$fileName = 'myshoots-export.csv';

//Set the Content-Type and Content-Disposition headers to force the download.
header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="' . $fileName . '"');

//Open up a file pointer
$fp = fopen('php://output', 'w');

//Start off by writing the column names to the file.
fputcsv($fp, $columnNames);

//Then, loop through the rows and write them to the CSV file.
foreach ($rows as $row) {
    fputcsv($fp, $row);
}

//Close the file pointer.
fclose($fp);
?>