<?php
session_start();
include '../api/config/database.php';
$_SESSION["ALERT"]= 0;

try
{
    $database = new Database();
    $db = $database->getConnection();
    if(isset($_POST["login"]))
    {
        if(empty($_POST["username"]) || empty($_POST["password"]))
        {
            $message = '<label>All fields are required</label>';
        }
        else
        {
            $query = "SELECT * FROM registered_users WHERE user_name = :username AND password = :password";
            $statement = $db->prepare($query);
            $statement->execute(
                array(
                    'username'     =>     $_POST["username"],
                    'password'     =>     $_POST["password"]
                )
            );
           while($row = $statement->fetch(PDO::FETCH_NUM)){
           $_SESSION["region"]= $row[8];
           $_SESSION["isJLO"] = $row[9];
           $_SESSION["displayName"]  = $row[2];
           $_SESSION["CurrLevel"] = $row[6];
           $_SESSION["NextLevel"] = $row[11];
           $_SESSION["agbID"] = $row[5];
           $_SESSION["ShYear"] = date("Y");
           $_SESSION["LevSince"] = $row[12];
           }


            $count = $statement->rowCount();
            if($count > 0)
            {
                $_SESSION["username"] = $_POST["username"];


                header("location:UpdatedDash.php");
            }
            else
            {
                $message = '<label>Wrong Data</label>';
            }
        }
    }
}
catch(PDOException $error)
{
    $message = $error->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Judge Login Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<br />
<div class="container" style="width:500px;">
    <?php
    if(isset($message))
    {
        echo '<label class="text-danger">'.$message.'</label>';
    }
    ?>
    <h3 align="">Judge Database Login</h3><br />
    <form method="post">
        <label>Username</label>
        <input type="text" name="username" class="form-control" />
        <br />
        <label>Password</label>
        <input type="password" name="password" class="form-control" />
        <br />
        <input type="submit" name="login" class="btn btn-info" value="Login" />
    </form>
</div>
<br />
</body>
</html>
