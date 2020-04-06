
<?php
// Include the database config file
include_once 'Config.php';

if(!empty($_POST["Disc"])){
    // Fetch state data based on the specific country
    $query = "SELECT Distinct Class FROM tblrecords WHERE Disc = ".$_POST['disc']." ";
    $result = $db->query($query);

    // Generate HTML of state options list
    if($result->num_rows > 0){
        echo '<option value="">Select State</option>';
        while($row = $result->fetch_assoc()){
            echo '<option value="'.$row['Class'].'">'.$row['Class'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}elseif(!empty($_POST["Class"])){
    // Fetch city data based on the specific state
    $query = "SELECT Round FROM tblrecords WHERE Disc = ".$_POST['Disc']." ";
    $result = $db->query($query);

    // Generate HTML of city options list
    if($result->num_rows > 0){
        echo '<option value="">Select city</option>';
        while($row = $result->fetch_assoc()){
            echo '<option value="'.$row['Round'].'">'.$row['Round'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>