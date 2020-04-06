<?php
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 2020-04-03
 * Time: 15:18
 */
namespace Phppot;
//nclude ('../common/head.php');
	require_once('../config.php');
    use \Phppot\Member;

session_start();
    $regionSelect = $_GET['Region'];
    if($regionSelect !="") {
        RegionalReport($regionSelect);

    }
    else{
        CountofEventType();
    }
function CountofEventType(){
        global $db;
    $result = "SELECT EvLevel, count(EvLevel) AS CountOf FROM shootrec GROUP BY EvLevel";
    $shrecs = $db->query($result);

//$Rs = safe_r_sql($MyQuery);
//echo $MyQuery;exit;
    $StrData = '';
    $MyHeader='';
    if ($shrecs->num_rows > 0) {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Content-Disposition: attachment; filename=' . ('Countexport') . '.csv');
        header('Content-type: text/tab-separated-values; charset=PageEncode');

        $MyHeader
            .= ("Event Level") . ","
            . ("Count").",";

        $MyHeader .= "\n";

        print $MyHeader;

        while ($row = $shrecs->fetch_assoc()) {
            $StrData
                .= $row["EvLevel"] . ","
                . $row["CountOf"].",";

            $StrData .= "\n";
        }

        print $StrData;
    }
}
function RegionalReport($regionSelect){
        global $db;

    $result = "SELECT * FROM shootrec,registered_users WHERE registered_users.region= '$regionSelect' AND shootrec.AGBNo = registered_users.agb_no";
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
}


?>