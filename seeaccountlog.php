<?php
// Connect to the MySQL database
$db = mysqli_connect("localhost", "username", "password", "database_name");

// Get the user's IP address
$ip_address = $_SERVER['REMOTE_ADDR'];

// Get the current date and time
$timestamp = date("Y-m-d H:i:s");

// Get the account number and name
$account_no = $_POST['account_no'];
$account_name = $_POST['account_name'];

// Get the total time spent on the page (in seconds)
if (isset($_POST['total_time'])) {
  $total_time = intval($_POST['total_time']);
} else {
  $total_time = 0;
}

// Get the URL of the current page
$url = $_SERVER['REQUEST_URI'];

// Insert a new row into the log table with the relevant data
$sql = "INSERT INTO log_table (ip_address, timestamp, account_no, account_name, total_time, url) VALUES ('$ip_address', '$timestamp', '$account_no', '$account_name', $total_time, '$url')";
mysqli_query($db, $sql);

// Close the database connection
mysqli_close($db);
?>
