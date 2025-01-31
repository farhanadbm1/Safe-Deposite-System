<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "service";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    $id = $_POST['account_id'];
    $n = $_POST['name'];
 
    $bid = $_POST['b_id'];
 
$sql = "SELECT * FROM account WHERE ac_id = $id AND name = '$n'  AND b_id = $bid ";

     $result = mysqli_query($conn, $sql);
 
     if ($result && mysqli_num_rows($result) > 0) {
         // Redirect to new page
         header("Location: service3.html");
         exit();

     } else {
         echo "Invalid Information.";
     }
 }
 

// Close database connection
mysqli_close($conn);
?>
