<?
session_start();
//include 'config.php';
$displayName=($_SESSION["username"]);
$region =($_SESSION["region"]);
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
                    echo $region;
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





