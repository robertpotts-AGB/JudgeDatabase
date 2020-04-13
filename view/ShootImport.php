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
            if ($count > 7) {

                while (($column = fgetcsv($file, 10000, ",")) !== FALSE)  {
                    // split to date and time bits
                    //$bits = explode("/", $column[0]);
                    //$new = mktime($bits['1'], $bits['0'], $bits['2']);
                    $date = date("Y/m/d", $new);
                    //Handle EVOrg Type
                    if($column[1] != "") {
                        $EvOrgType = "";
                        if ($column[2] = 1) {
                            $EvOrgType = "WA";
                        } elseif ($column[3] = 1) {
                            $EvOrgType = "AGB";
                        } elseif ($column[4] = 1) {
                            $EvOrgType = "Training";
                        }
                        //Handle EvLevelType
                        $EvLevType = "";
                        if ($column[5] = 1) {
                            $EvLevType = "International";
                        } elseif ($column[6] = 1) {
                            $EvLevType = "Natonal";
                        } elseif ($column[7] = 1) {
                            $EvLevType = "Regional";
                        } elseif ($column[8] = 1) {
                            $EvLevType = "County";
                        } elseif ($column[9] = 1) {
                            $EvLevType = "Club";
                        }

                        //Handle EvLevelType
                        $EvDiscType = "";
                        if ($column[10] = 1) {
                            $EvDiscType = "Target";
                        } elseif ($column[11] = 1) {
                            $EvDiscType = "Field";
                        } elseif ($column[12] = 1) {
                            $EvDiscType = "Clout";
                        } elseif ($column[13] = 1) {
                            $EvDiscType = "Flight";
                        } elseif ($column[14] = 1) {
                            $EvDiscType = "Other";
                        }

                        //Handle EvOptionType
                        $EvOptType = "";
                        if ($column[15] = 1) {
                            $EvOptType = "Indoor";
                        } elseif ($column[16] = 1) {
                            $EvOptType = "H2H";
                        }

                        //Handle EvStatusType
                        $EvStatusType = "";
                        if ($column[17] = 1) {
                            $EvStatusType = "WRS";
                        } elseif ($column[18] = 1) {
                            $EvStatusType = "UKRS";
                        } elseif ($column[19] = 1) {
                            $EvStatusType = "Non-Record";
                        } elseif ($column[20] = 1) {
                            $EvStatusType = "Training";
                        }

                        //Handle EvRoleType
                        $EvRoleType = "";
                        if ($column[21] = 1) {
                            $EvRoleType = "COJ";
                        } elseif ($column[22] = 1) {
                            $EvRoleType = "DOS";
                        } elseif ($column[23] = 1) {
                            $EvRoleType = "Judge";
                        } elseif ($column[24] = 1) {
                            $EvRoleType = "Training";
                        }


                        $sqlInsert = "INSERT into shootrec (AGBNo,EvName,EvRound,EvDate,EvOrg,EvLevel,EvDiscipline,EvOptional,EvStatus,EvRole)
                   values ('" . $JudgeID . "','" . $column[1] . "','" . $column[25] . "','" . date("Y/n/j", strtotime(str_replace('/', '-', $column[0]))) . "','" . $EvOrgType . "','" . $EvLevType . "','" . $EvDiscType . "','" . $EvOptType . "','" . $EvStatusType . "','" . $EvRoleType . "')";
                        $result = mysqli_query($db, $sqlInsert);
                    }

                    if (!empty($result)) {
                        header("Location: ../view/dashboard.php");
                    } else {

                        echo "Problem in Importing CSV Data";
                    }

                } }
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
