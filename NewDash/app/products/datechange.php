<?php
session_start();
if (isset($_POST['date'])) {
    if (isset($_SESSION['ShYear'])) {
        $_SESSION['ShYear'] = $_POST['date'];
    }
}



header('Location: ' . $_SERVER['HTTP_REFERER'] . '');
?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="text" name="date" />
    <input type="submit" name="submit" value="envoyer!" />
</form>
