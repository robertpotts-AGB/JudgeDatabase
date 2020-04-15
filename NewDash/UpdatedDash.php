<?php session_start();

if(!isset($_SESSION['username'])){
//User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Shoots</title>

    <!-- bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- custom CSS -->
    <link href="app/assets/css/style.css" rel="stylesheet" />



</head>
<body>
<nav class="navbar navbar-inverse">

    <a class="navbar-brand" href="#"> Judge Records System</a>
    <div class="container-fluid">

        <div class="navbar-header">


        </div>

        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">My Shoots
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><span class='read-products-button'>My Current Shoots</span></a></li>
                    <li><a href="#"><span class='upload-shootrecords-button'>Upload Shoots from J07</span></a></li>
                    <li><a href="#"><span class='personalexport-shootrecords-button'>Export my shoots</span></a></li>
                </ul>
            </li>
            <?if ($_SESSION["isJLO"] == 1){
                echo' <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">JLO Overview
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><span class=readJLO-products-button>All Judges records</span></a></li>
                    <li><a href="#"><span class=upload-shootrecords-butto>Export All Records</span></a></li>
                    <li><a href="#"><span class=JLOstats-products-button>Statistics by Event Organisation</span></a></li>
                    <li><a href="#"><span class=JLOstats-level-products-button>Statistics by Event Level</span></a></li>
                </ul>
            </li>';
            } ?>
            <a href="./logout.php" class="logout-button">Logout</a>
        </ul>
          <a class="dropdown pull-right">You are logged in as <?php echo $_SESSION["displayName"]?> </a>
        <button class="btn btn-success navbar-btn create-shootrecords-button pull-right m-b-15px ">Add New Shoot</button>
    </div>
</nav>

<!-- our app will be injected here -->
<div id="app" class="panel panel-default"></div>

<!-- jQuery library -->
<script src="app/assets/js/jquery.js"></script>

<!-- bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"  crossorigin="anonymous"></script>

<!-- bootbox for confirm pop up -->
<script src="app/assets/js/bootbox.min.js"></script>

<!-- app js script -->
<script src="app/app.js"></script>

<!-- products scripts -->
<script src="app/products/read-products.js"></script>
<script src="app/products/create-product.js"></script>
<!--<script src="app/products/read-one-product.js"></script>-->
<script src="app/products/update-product.js"></script>
<script src="app/products/delete-product.js"></script>
<script src="app/products/upload-product.js"></script>
<script src="app/products/read-jlo.js"></script>
<script src="app/products/personal-export.js"></script>
<script src="app/products/JLOStats.js"></script>
</body>
</html>