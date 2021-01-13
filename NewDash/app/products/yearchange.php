<?php

session_start();
if (isset($_POST['year'])) {
    // save values from other page to session
    $_SESSION['ShYear'] = $_POST['year'];

}
