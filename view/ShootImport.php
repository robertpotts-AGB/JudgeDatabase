<?php
namespace Phppot;
session_start();
require_once './config.php';
include '../common/head.php';
$JudgeID = $_SESSION['AGBNO'];
use \Phppot\Member;

//$connect = mysql_connect("localhost","root","ianseo");
//mysql_select_db("ianseo",$connect); //select the table


if (isset($_POST["import"])) {

    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");

        $count = 0;
        while (($fields = fgetcsv($file, 0, ",")) !== FALSE) {
            $count++;
            if ($count == 1) {

                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                    // split to date and time bits
                    $bits = explode("/", $column[2]);
                    $new = mktime($bits['1'], $bits['0'], $bits['2']);
                    $date = date("Y/m/d", $new);
                    $sqlInsert = "INSERT into shootrec (AGBNo,EvName,EvRound,EvDate,EvOrg,EvLevel,EvDiscipline,EvOptional,EvStatus,EvRole)
                   values ('" . $JudgeID . "','" . $column[0] . "','" . $column[1] . "','" . date("Y/n/j",strtotime(str_replace('/','-',$column[2]))) . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "')";
                    $result = mysqli_query($db, $sqlInsert);

                    if (!empty($result)) {
                        header("Location: ../view/dashboard.php");
                    } else {

                        echo "Problem in Importing CSV Data";
                    }
                }
            }
        }
    }
}
?>




<p>
    A template file can be downloaded from here:

</p>

<form class="form-horizontal" action="" method="post" name="uploadCSV"
      enctype="multipart/form-data">
    <div class="input-row">
        <label class="col-md-4 control-label">Choose CSV File</label> <input
            type="file" name="file" id="file" accept=".csv">
        <button type="submit" id="submit" name="import"
                class="btn-submit">Import</button>
        <br />

    </div>
    <div id="labelError"></div>
</form></form>
