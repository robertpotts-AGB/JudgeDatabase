<?php

include './view/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $AGBNo = ($_POST["agbno"]);
    $EventName= ($_POST["event_name"]);
    $EventDate= ($_POST["event_date"]);
    $EventRules=($_POST["event_rules"]);
    $EventLevel=($_POST["event_level"]);
    $EventDiscipline=($_POST["event_discipline"]);
    $EventOptions=($_POST["event_options"]);
    $EventStatus=($_POST["event_status"]);
    $EventRole=($_POST["event_role"]);

    $recordqry = "INSERT INTO shootrec (AGBNo,EvName,EvDate,EvOrg,EvLevel,EvDiscipline,EvOptional,EvStatus,EvRole) VALUES ('$AGBNo','$EventName','$EventDate','$EventRules','$EventLevel','$EventDiscipline','$EventOptions','$EventStatus','$EventRole')";
    $shrecs = $db->query($recordqry);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<html>
<link rel="stylesheet" type="text/css" href="CSS/formstyle.css">
<body>

<h1> Shoot Input form</h1>
<h3> Please enter your event details, ensure that the name of the shoot is the same as the prospectus you will have received.</h3>

<table width="100%">
    <tr>
        <td width="15%"></td>
        <td width="75%">

<form  method="post">
 <tr>
        <td class="td1">
            AGB Number:
        </td>
        <td>
            <input type="text" name="agbno">*<br>
        </td>
    </tr>

    <tr>
        <td class="td1">
            Event Name:
        </td>
        <td>
            <input type="text" name="event_name">*<br>
        </td>
    </tr>

    <tr>
        <td class="td1">
            Event Date:
        </td>
        <td>
            <input type="date" name="event_date">*<br>
        </td>
    </tr>

    <tr>
        <td class="td1">
            Rules used:
        </td>
        <td>
            <select name="event_rules", id="event_rules_select">
                <option value"">Select...</option>
                <option value="AGB">Archery GB</option>
                <option value="WA">World Archery</option>

            </select>*<br>
        </td>
    </tr>

    <tr>
        <td class="td1">
            Event Level:
        </td>
        <td>
            <select name="event_level", id="event_level_select">
                <option value"">Select...</option>
                <option value="International">International</option>
                <option value="National">National</option>
                <option vlaue="Regional">Regional</option>
                <option value="County">County</option>
                <option value="Club">Club</option>
                <option value="Training">Training</option>
            </select>*<br>
        </td>
    </tr>
    <tr>
        <td class="td1">
            Event Discipline:
        </td>
        <td>
            <select name="event_discipline", id="event_discipline_select">
                <option value"">Select...</option>
                <option value="Target">Target</option>
                <option value="Field">Field</option>
                <option vlaue="Clout">Clout</option>
                <option value="Flight">Flight</option>
                <option value="Training">Training</option>
            </select>*<br>
        </td>
    </tr>
    <tr>
        <td class="td1">
            Event Options:
        </td>
        <td>
            <select name="event_options", id="event_options_select">
                <option value"">Select...</option>
                <option value="H2H">Head to Head</option>
                <option value="Indoor">Indoor</option>
            </select><br>
        </td>
    </tr>
    <tr>
        <td class="td1">
            Event Status:
        </td>
        <td>
            <select name="event_status", id="event_status_select">
                <option value"">Select...</option>
                <option value="WRS">World Record Status / Arrowhead</option>
                <option value="UKRS">UK Record Status / Tassel</option>
                <option value="NRS">Non Record Status</option>
            </select>*<br>
        </td>
    </tr>
    <tr>
        <td class="td1">
            Event Role:
        </td>
        <td>
            <select name="event_role", id="event_role_select">
                <option value"">Select...</option>
                <option value="COJ">Chair of Judges</option>
                <option value="DOS">Director of Shooting</option>
                <option value="Judge">Judge</option>
                <option value="Training">Training</option>
            </select>*<br>
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
    </tr>
</table>
</body>
</html>