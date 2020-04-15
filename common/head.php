<?
session_start();
//include 'config.php';
$displayName=($_SESSION["username"]);
$region =($_SESSION["region"]);
$Name=($_SESSION["displayName"])
?>
<html>


<title>Judge Records</title>
<!-- custom CSS -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="app/assets/css/style.css" rel="stylesheet" />

    <!-- bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <table class='table table-bordered table-hover'>
        <tr>
            <td>

            </td>
            <td>
                <? if ($displayName !='') {
                    echo $displayName;
                    echo $region;
                    echo $Name;
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

</head>

<p></p>





