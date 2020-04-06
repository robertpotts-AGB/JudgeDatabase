<?php
namespace Phppot;
session_start();
include '../config.php';
use \Phppot\Member;#
include '../common/head.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $EventName= ($_POST["regionselect"]);
}
?>
<p>

</p>
<table width="100%">
    <tr>
        <td width="15%"></td>
        <td width="75%">

            <form  method="post">
    <tr>
        <td class="td1">
            Select a Region:
        </td>

        <td>
            <select name="regionselect", id="regionselect" onchange="">
                <option value"">Select...</option>
                <option value="ALL">All Regions</option>
                <option value="SCAS">Southern Counties</option>
                <option value="WMAS">West Midlands</option>
                <option value="NCAS">Northern Counties</option>
                <option value="NI">Northern Ireland</option>
                <option value="WAA">Wales</option>
                <option value="SAA">Scotland</option>
                <option value="GWAS">Grand Western</option>
                <option value="EMAS">East Midlands</option>

            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="Submit Shoot">
        </td>
    </tr>
    </form>

    </td>
</table>

<?php if($EventName != ""){
     echo ' <a href=Adminexporter.php?Region='.$EventName.'> Get Regional Report </a>';
}
