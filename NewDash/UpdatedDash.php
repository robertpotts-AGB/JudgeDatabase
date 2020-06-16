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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" rel="stylesheet">

    <!-- custom CSS -->
    <link href="app/assets/css/style.css" rel="stylesheet" />




</head>
<body>
<div id="flash" role="alert">
</div>
<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"> Judge Records System</a>
    <div class="collapse navbar-collapse"id="navbarToggleExternalContent">



        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="JudgeDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My Shoots
                </a>
                <div class="dropdown-menu" aria-labelledby="JudgeDropdownMenuLink">
                    <a href="#"class="dropdown-item"><span class='create-shootrecords-button'>Add a shoot</span></a>
                    <a href="#"class="dropdown-item"><span class='read-products-button'>My Shoots</span></a>
                    <a href="#"class="dropdown-item"><span class='upload-shootrecords-button'>Upload Shoots from J07</span></a>
                    <a href="#"class="dropdown-item"><span class='personalexport-shootrecords-button'>Export my shoots</span></a>
                    <a href="#"class="dropdown-item"><span class='read-level-button'>Current Level statistics</span></a>
                </div>
            </li>
            <?php if ($_SESSION["isJLO"] == 1){
                echo' <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="JLODropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    JLO Overview
                </a>
                <div class="dropdown-menu" aria-labelledby="JLODropdownMenuLink">
                    <a href="#"class="dropdown-item"><span class=readJLO-products-button>Regional Judge Records</span></a>
                    <a href="#"class="dropdown-item"><span class=JLOExport-shootrecords-button>Export All Records</span></a>
                   <a href="#"class="dropdown-item"><span class=JLOstats-products-button>Statistics for the Region</span></a>
                   <a href="#"class="dropdown-item"><span class=J08-view-button>Regional J08</span></a>
                   <a href="#"class="dropdown-item"><span class=J08-download-button>Regional J08 Download</span></a>
                   <a href="#"class="dropdown-item"><span class=upload-JLO-button>JLO J07 Uploader</span></a>
                      
   
                </div>
            </li>
            ';
            } ?>
            </ul>
                 <ul class="navbar-nav">
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link dropdown-toggle " id="navDropDownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My Details
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navDropDownLink">
                    <a href="#"class="dropdown-item"><span>Logged in as: <?php echo $_SESSION["displayName"]?> </span></a>
                    <a href="#"class="dropdown-item"> <span> Current Grade: <?php echo $_SESSION["CurrLevel"]?> </span></a>
                    <a href="#"class="dropdown-item"><span> Grade Since: <?php echo $_SESSION["LevSince"]?> </span></a>
                    <a href="app/products/datechange.php" class="dropdown-item"><span>Showing Year: <strong><?php echo $_SESSION["ShYear"] ?></strong></span> </a>
                    <div><button onclick="window.location.href = './logout.php';" class="" btn btn-danger logout-button  ">Logout</button></div>
                </div>
            </li>
        </ul>






    </div>
</nav>

<!-- our app will be injected here -->


    <div id="app" class="panel panel-default w-100-pct" ></div>




<!-- jQuery library -->
<script src="app/assets/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
<!-- bootstrap JavaScript -->


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
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
<script src="app/products/J08View.js"></script>
<script src="app/products/upload-JLO.js"></script>
<script src="app/products/Read-Level.js"></script>
</body>
</html>