<?php
include './config.php';
if (isset($_REQUEST["sid"])) {
        $db->query("delete FROM shootrec where ID=" . $_POST['sid']);
} else echo 'Not Deleted Error Occured';
?>
