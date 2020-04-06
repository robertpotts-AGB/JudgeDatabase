<?php

namespace Phppot;
include './config.php';
session_start();
use \Phppot\Member;

/*if (! empty($_SESSION["userId"])) {
    require_once __DIR__ . './../class/Member.php';
    $member = new Member();
    $memberResult = $member->getMemberById($_SESSION["userId"]);
    if(!empty($memberResult[0]["display_name"])) {
        $displayName = ucwords($memberResult[0]["display_name"]);
        $agbno = ($memberResult[0]["agb_no"]);
    } else {
        $displayName = $memberResult[0]["user_name"];
        $agbno = ($memberResult[0]["agb_no"]);
    }
    $_SESSION['AGBNO'] = ($memberResult[0]["agb_no"]);
}*/
include ('../common/head.php');
?>


<?php

$recordqry = "SELECT *  FROM shootrec  WHERE shootrec.AGBNo = '$agbno'";
$judgeqry = "SELECT * FROM judges WHERE AGB_No = '$agbno''";
$jrecs = $db->query($judgeqry);
$shrecs = $db->query($recordqry);



?>

<link rel="stylesheet" type="text/css" href="../CSS/formstyle.css">
    <link href="headerstyle.css" rel="stylesheet" type="text/css" />

<?php

if ($shrecs->num_rows > 0) {
    // output data of each row
echo '<p>';
    echo "<table id='dashtable'>
    <tr class='header'>
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

        echo "<td>" . $row["EvName"] . "</td>";
        echo "<td>" . $row["EvRound"] . "</td>";
        echo "<td>" . $row["EvDate"] . "</td>";
        echo "<td>" . $row["EvOrg"] . "</td>";
        echo "<td>" . $row["EvLevel"] . "</td>";
        echo "<td>" . $row["EvDiscipline"] . "</td>";
        echo "<td>" . $row["EvOptional"] . "</td>";
        echo "<td>" . $row["EvStatus"] . "</td>";
        echo "<td>" . $row["EvRole"] . "</td>";
        echo "<td id='delrow'>" . '<a href="../view/deleterow.php?id='.$row['ID'].'" target="_blank ">Delete</a>' . "</td>";


    }
}
else
    echo "You have no shoots added yet";



include ('../common/footer.php');



