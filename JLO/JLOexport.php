<?php
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 2020-04-03
 * Time: 15:18
 */
namespace Phppot;
session_start();

//nclude ('../common/head.php');
	require_once('../config.php');
    use \Phppot\Member;


    $region = $_SESSION['REGION'];


    $result = "SELECT * FROM shootrec,registered_users WHERE registered_users.region='$region' AND shootrec.AGBNo = registered_users.agb_no ";
    $shrecs = $db->query($result);

    //$Rs = safe_r_sql($MyQuery);
	//echo $MyQuery;exit;
	$StrData = '';
$MyHeader='';
	if ($shrecs->num_rows > 0) {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Content-Disposition: attachment; filename=' . ($region.'export') . '.csv');
        header('Content-type: text/tab-separated-values; charset=PageEncode');

        $MyHeader
            .= ("AGB Number") . ","
            . ("Name").","
            . ("County").","
            . ("EventName") . ","
            . ("EventRound") . ","
            . ("EventDate") . ","
            . ("EventOrg") . ","
            . ("EventLevel") . ","
            . ("EventDiscipline") . ","
            . ("EvOptions") . ","
            . ("EventStatus") . ","
            . ("EvRole") . ",";

        $MyHeader .= "\n";

        print $MyHeader;

        while ($row = $shrecs->fetch_assoc()) {
            $StrData
                .= $row["AGBNo"] . ","
                . $row["display_name"].","
                . $row["county"].","
                . $row["EvName"] . ","
                . $row["EvRound"] . ","
                . $row["EvDate"]. ","
                . $row["EvOrg"] . ","
                . $row["EvLevel"] . ","
                . $row["EvDiscipline"] . ","
                . $row["EvOptional"] . ","
                . $row["EvStatus"] . ","
                . $row["EvRole"] . ",";

            $StrData .= "\n";
        }

        print $StrData;
    }


?>