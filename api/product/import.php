<?php

// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/shoots.php';

$database = new Database();
$db = $database->getConnection();


if (isset($_POST["btn_upload"])) {

    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");

        $count = 0;
        while (($fields = fgetcsv($file, 0, ",")) !== FALSE) {
            $count++;
            if ($count > 7) {
                $stmt=$db->preare("INSERT into shootrec (AGBNo,EvName,EvRound,EvDate,EvOrg,EvLevel,EvDiscipline,EvOptional,EvStatus,EvRole) values (:AGB,:EvNameSet,:EvRoundSet,:EvDateSet,:EvOrgSet,:EvLevelSet,:EvDisciplineSet,:EvOptionalSet,:EvStatusSet,:EvRoleSet)");

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
                        $stmt->bindParam(':AGB', "964787");
                        $stmt->bindParam(':EvNameSet', $column[1]);
                        $stmt->bindParam(':EvRoundSet', $column[1]);
                        $stmt->bindParam(':EvDateSet', date("Y/n/j", strtotime(str_replace('/', '-', $column[0]))));
                        $stmt->bindParam(':EvOrgSet', $EvOrgType);
                        $stmt->bindParam(':EvLevelSet', $EvLevType);
                        $stmt->bindParam(':EvDisciplineSet', $EvDiscType);
                        $stmt->bindParam(':EvOptionalSet', $EvOptType);
                        $stmt->bindParam(':EvStatusSet', $EvStatusType);
                        $stmt->bindParam(':EvRoleSet', $EvRoleType);

                        $stmt = $db->execute();
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