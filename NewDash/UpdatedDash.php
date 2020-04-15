<?php session_start();

if(!isset($_SESSION['username'])){
//User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<?php


include ('../common/head.php');
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Shoots</title>

    <!-- bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- custom CSS -->
    <link href="app/assets/css/style.css" rel="stylesheet" />



</head>
<body>


<!-- our app will be injected here -->
<div id="app"></div>

<!-- jQuery library -->
<script src="app/assets/js/jquery.js"></script>

<!-- bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
<script src="app/products/JLOstats.js"></script>
</body>
</html>