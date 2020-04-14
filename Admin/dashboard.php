
<?php


$api_url = 'http://localhost/JudgeDatabase/api/shootrecords/read.php';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$user_data = json_decode($json_data);

// Cut long data into small & select only first 10 records
//$user_data = array_slice($user_data, 0, 9);

// Print data if need to debug
//print_r($user_data);

// Traverse array and display user data
echo "<table>";
foreach($user_data->records as $articleDetails){
echo "
	<tr>
	<td>";
	echo $articleDetails->{"ID"};
	echo"
	</td>
	<td>";
	echo $articleDetails->{"EvName"};
	echo"</td>
	</tr>
	";

}
echo "</table>";
