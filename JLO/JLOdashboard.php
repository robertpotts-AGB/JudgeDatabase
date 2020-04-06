<?php
namespace Phppot;
session_start();
include '../view/config.php';
use \Phppot\Member;

$agbno = $_SESSION['REGION'];

include ('../common/head.php');
?>


<?php

$recordqry = "SELECT *  FROM shootrec,registered_users  WHERE registered_users.region = '$region' AND registered_users.agb_no = shootrec.AGBNo ORDER BY EvDate DESC";
$shrecs = $db->query($recordqry);



?>

<link rel="stylesheet" type="text/css" href="../CSS/formstyle.css">


<?php
if ($shrecs->num_rows > 0) {
    // output data of each row
echo '<p>';
    echo "<table id='dashtable'>
    <tr class='header'>
    <th>Judge Name</th>
    <th>Event Name</th>
    <th>Event Round</th>
    <th>Event Date</th>
    <th>Event Rules</th>
    <th>Event Level</th>
    <th>Event Discipline</th>
    <th>Event Options</th>
    <th>Event Status</th>
    <th>Event Role</th>
    </tr>";
    while($row = $shrecs->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>" . $row["display_name"] . "</td>";
        echo "<td>" . $row["EvName"] . "</td>";
        echo "<td>" . $row["EvRound"] . "</td>";
        echo "<td>" . $row["EvDate"] . "</td>";
        echo "<td>" . $row["EvOrg"] . "</td>";
        echo "<td>" . $row["EvLevel"] . "</td>";
        echo "<td>" . $row["EvDiscipline"] . "</td>";
        echo "<td>" . $row["EvOptional"] . "</td>";
        echo "<td>" . $row["EvStatus"] . "</td>";
        echo "<td>" . $row["EvRole"] . "</td>";



    }
}
else
    echo "You have no shoots added yet";



include ('../common/footer.php');



