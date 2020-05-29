<?php
session_start();
if (isset($_POST['date'])) {
    if (isset($_SESSION['ShYear'])) {
        $_SESSION['ShYear'] = $_POST['date'];
        header("location:/JudgeDatabase/NewDash/UpdatedDash.php");
    }
}

?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="text" name="date" />
    <input type="submit" name="submit" value="Change Date" />
</form>
