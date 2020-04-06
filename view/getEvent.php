
<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

<?php
$q = ($_GET['q']);

$con = mysqli_connect('127.0.0.1','root','ianseo','ianseo');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ianseo");
$sql="SELECT * FROM Tournament WHERE ToWhenFrom = '".$q."'";
$result = mysqli_query($con,$sql);

/*echo "<table>
<tr>
<th>Available Events</th>

</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['ToId'] . "</td>";
    echo "<td>" . $row['ToName'] . "</td>";

    echo "</tr>";
}

echo "</table>";*/

echo "<select name='event_names', id='event_names_select'>";
while($row = mysqli_fetch_array($result)) {
echo "<option value=" .$row['ToId'] . ">" . $row['ToName'] . "</option>";
}
echo "</select> ";
//}

//echo $q;
mysqli_close($con);
?>
</body>
</html>