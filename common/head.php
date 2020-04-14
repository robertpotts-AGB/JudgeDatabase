<?
session_start();
//include 'config.php';
use \Phppot\Member;
require_once(dirname(dirname(__FILE__)) . '/class/Member.php');
$displayName=($_SESSION["username"]);

?>
<html>

<body>
<table class="headertable">
        <tr>
            <td>
            <img src="../common/Logo.png" height="90">
            </td>
            <td id="name">
                <? if ($displayName !='') {
                    echo $displayName;
                }
                ?>
            </td>
        <td id="entershoot" align="right">
            <? if ($displayName !=''){
            echo ' ';
            }
            else{
                echo' <a href="./ShootInput.php">Enter a shoot without logging in </a>';
            }
            ?>
        </td>
            <? if ($displayName !=''){
                echo  '<td id="expsht" width="10%" textalign=Right>';
                echo  '';
                echo '</td>';
           echo  '<td id="logoutbtn" width="10%" textalign=Right>';
           echo  '<a href="./logout.php" class="logout-button">Logout</a>';
           echo '</td>';

    }
    else{

    }
    ?>

        </tr>
</table>
<p></p>
    <table id=menutable class="MenuTable" >
    <? if ($displayName !='') {
    echo '
    <tr >
        <td> <a href = "../view/ShootInput.php" > Enter a shoot </a></td>
       <td> <a href = "../view/exporter.php" > Export Shoots </a></td>
       <td> <a href = "../view/ShootImport.php" > Upload My Shoots </a></td>
       <td> <a href = "../view/dashboard.php" > My Shoots</a></td>';

    if ($JLO != '') {
        echo '
           <td id="jlo"> <a href = "../view/JLO/JLOdashboard.php" > JLO Dashboard</a></td>
           <td id="jlo"> <a href = "../view/JLO/JLOExport.php" > JLO Export</a></td>';
    }
    if ($Admin != '') {
        echo '
           <td id="admin"> <a href = "../Admin/dashboard.php" > Admin Dashboard</a></td>
           <td id="admin"> <a href = "../view/exporter.php" > Upload New Judges </a></td>
           <td id="admin"> <a href = "../view/exporter.php" > Edit Current Judges </a></td>
           <td id="admin"> <a href = "../view/AdminExports.php" > Admin Exports</a></td>';
    }
}
      echo ' 
 
     </tr >
</table >';




