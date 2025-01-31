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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id =$_POST["ac"];
    $username = $_POST["username"];

    $password = $_POST["msg"];
	
    // Insert data into database
    $sql = "INSERT INTO sendmsg (ac_id,name, msg)
            VALUES ('$id','$username', '$password')";

		if (mysqli_query($conn, $sql)) {
			// Redirect to new page
			echo " Send messege suucesfully";
			// Make sure to exit after the header is sent
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

}

// Close database connection
mysqli_close($conn);
?>
