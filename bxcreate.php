<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "service";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST["box_id"];
$s = $_POST["b_size"];


$query = "INSERT INTO dp_box (b_id, box_size) VALUES ('$id', '$s')";
$result = mysqli_query($conn, $query);

if ($result) {
    // If the query was successful, fetch the row to check the value of b_size
    $query = "SELECT box_size FROM dp_box WHERE b_id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $b_rent = null;
    if ($row['box_size'] == '5*5') {
        $b_rent = '45';
    } else if ($row['box_size'] == '3*5') {
        $b_rent = '25';
    } else if ($row['box_size'] == '3*10') {
        $b_rent = '75';
    } else if ($row['box_size'] == '5*10') {
        $b_rent = '100';
    } else if ($row['box_size'] == '10*10') {
        $b_rent = '175';
    } else if ($row['box_size'] == '15*10') {
        $b_rent = '225';
    } else if ($row['box_size'] == '13*21') {
        $b_rent = '350';
    } else if ($row['box_size'] == '26*21') {
        $b_rent = '600';
    } else if ($row['box_size'] == '38*21') {
        $b_rent = '1000';
    } else {
        echo "error: The box size not found";
        exit;
    }
    
    $update_query = "UPDATE dp_box SET b_rent = '$b_rent' WHERE b_id = '$id'";
    $update_result = mysqli_query($conn, $update_query);
    
    if ($update_result) {
        echo "Box inserted with rental value $b_rent";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

?>
