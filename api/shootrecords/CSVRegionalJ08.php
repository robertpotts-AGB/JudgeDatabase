<?php
Session_start();
// get database connection
include_once '../config/database.php';
$agbno=($_SESSION["username"]);
$Region = ($_SESSION["region"]);
$year = ($_SESSION["ShYear"]);
$database = new Database();
$db = $database->getConnection();


$result = "SELECT AGBNo,display_name,region, COUNT(*)'TotalDays', Count(IF(EvOrg='WA',1,NULL))'WA',Count(IF(EvOrg='AGB',1,NULL))'AGB',Count(IF(EvOrg='Training',1,NULL))'Training',Count(IF(EvLevel='International',1,NULL))'International',Count(IF(EvLevel='National',1,NULL))'National',Count(IF(EvLevel='Regional',1,NULL))'Regional',Count(IF(EvLevel='County',1,NULL))'County',Count(IF(EvLevel='Club',1,NULL))'Club',Count(IF(EvDiscipline='Target',1,NULL))'Target',Count(IF(EvDiscipline='Field',1,NULL))'Field',Count(IF(EvDiscipline='Clout',1,NULL))'Clout',Count(IF(EvDiscipline='Flight',1,NULL))'Flight',Count(IF(EvDiscipline='3D',1,NULL))'3D',Count(IF(EvDiscipline='Seminar',1,NULL))'Seminar',Count(IF(EvDiscipline='Conference',1,NULL))'Conference',Count(IF(EvDiscipline='Other CPD',1,NULL))'CPD',Count(IF(EvDiscipline='Other',1,NULL))'Other',Count(IF(EvOptional='H2H',1,NULL))'H2H',Count(IF(EvOptional='Indoor',1,NULL))'Indoor',Count(IF(EvStatus='WRS',1,NULL))'WRS',Count(IF(EvStatus='UKRS',1,NULL))'UKRS',Count(IF(EvStatus='Non-Record',1,NULL))'Non-RS',Count(IF(EvRole='COJ',1,NULL))'COJ',Count(IF(EvRole='DOS',1,NULL))'DOS',Count(IF(EvRole='Judge',1,NULL))'Judge',Count(IF(EvRole='Trainer',1,NULL))'Trainer',Count(IF(EvRole='Attendee',1,NULL))'Attendee' ,Count(IF(EvRole='Training',1,NULL))'Training'
            FROM shootrec, registered_users 
            WHERE AGBNo = agb_no and region ='$Region' AND YEAR(EvDate)=$year
            GROUP BY AGBNo";

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
$fileName = 'regionaljudges-export.csv';

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