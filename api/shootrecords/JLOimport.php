<?php

// get database connection
include_once '../config/database.php';

// instantiate shootrecords object
include_once '../objects/shoots.php';

$database = new Database();
$db = $database->getConnection();


if (isset($_POST["btn_upload"])) {

    $fileName = $_FILES["file"]["tmp_name"];
    $AGB = $_POST["AGB_Number"];
    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");

        $count = 0;
        while (($fields = fgetcsv($file, 0, ",")) !== FALSE) {
            $count++;
            if ($count > 7) {
                $stmt=$db->prepare("INSERT into shootrec (AGBNo,EvName,EvRound,EvDate,EvOrg,EvLevel,EvDiscipline,EvOptional,EvStatus,EvRole) values (:AGB,:EvNameSet,:EvRoundSet,:EvDateSet,:EvOrgSet,:EvLevelSet,:EvDisciplineSet,:EvOptionalSet,:EvStatusSet,:EvRoleSet)");

                while (($column = fgetcsv($file, 10000, ",")) !== FALSE)  {
                    // split to date and time bits
                    //$bits = explode("/", $column[0]);
                    //$new = mktime($bits['1'], $bits['0'], $bits['2']);
                    $date = date("Y/m/d", $new);
                    //Handle EVOrg Type
                    if($column[1] != "") {
                        $EvOrgType = "";
                        if ($column[2] != "") {
                            $EvOrgType = "WA";
                        } elseif ($column[3] != "") {
                            $EvOrgType = "AGB";
                        } elseif ($column[4] != "") {
                            $EvOrgType = "Training";
                        }
                        //Handle EvLevelType
                        $EvLevType = "";
                        if ($column[5] != "") {
                            $EvLevType = "International";
                        } elseif ($column[6] != "") {
                            $EvLevType = "National";
                        } elseif ($column[7] != "") {
                            $EvLevType = "Regional";
                        } elseif ($column[8] != "") {
                            $EvLevType = "County";
                        } elseif ($column[9] != "") {
                            $EvLevType = "Club";
                        }

                        //Handle EvLevelType
                        $EvDiscType = "";
                        if ($column[10] != "") {
                            $EvDiscType = "Target Outdoor";
                        } elseif ($column[11] != "") {
                            $EvDiscType = "Field";
                        } elseif ($column[12] != "") {
                            $EvDiscType = "Clout";
                        } elseif ($column[13] != "") {
                            $EvDiscType = "Flight";
                        } elseif ($column[14] != "") {
                            $EvDiscType = "Other";
                        }

                        //Handle EvOptionType
                        $EvOptType = "";
                        if ($column[15] != "") {
                            $EvDiscType = "Target Indoor";
                        } elseif ($column[16] != "") {
                            $EvOptType = "H2H";
                        }

                        //Handle EvStatusType
                        $EvStatusType = "";
                        if ($column[17] != "") {
                            $EvStatusType = "WRS";
                        } elseif ($column[18] != "") {
                            $EvStatusType = "UKRS";
                        } elseif ($column[19] != "") {
                            $EvStatusType = "Non-Record";
                        } elseif ($column[20] != "") {
                            $EvStatusType = "Training";
                        }

                        //Handle EvRoleType
                        $EvRoleType = "";
                        if ($column[21] != "") {
                            $EvRoleType = "COJ";
                        } elseif ($column[22] != "") {
                            $EvRoleType = "DOS";
                        } elseif ($column[23] != "") {
                            $EvRoleType = "Judge";
                        } elseif ($column[24] != "") {
                            $EvRoleType = "Training";
                        }

                        //convert date to Import Date
                        $ShootDate=DateTime::createFromFormat('n/j/Y',$column[0]);
                        $importDate = $ShootDate->format('Y-m-d');

                        $stmt->bindParam(':AGB', $AGB);
                        $stmt->bindParam(':EvNameSet', $column[1]);
                        $stmt->bindParam(':EvRoundSet', $column[25]);
                        $stmt->bindParam(':EvDateSet', $importDate);

                        $stmt->bindParam(':EvOrgSet', $EvOrgType);
                        $stmt->bindParam(':EvLevelSet', $EvLevType);
                        $stmt->bindParam(':EvDisciplineSet', $EvDiscType);
                        $stmt->bindParam(':EvOptionalSet', $EvOptType);
                        $stmt->bindParam(':EvStatusSet', $EvStatusType);
                        $stmt->bindParam(':EvRoleSet', $EvRoleType);

                        $stmt->execute();
                    }

                    if (!empty($result)) {
                        header("Location: /JudgeDatabase/NewDash/UpdatedDash.php");
                    } else {

                        header("Location: /JudgeDatabase/NewDash/UpdatedDash.php");
                    }

                } }
        }
    }
}
?>