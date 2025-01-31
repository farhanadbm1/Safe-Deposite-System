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
	$id =$_POST["id"];
    $username = $_POST["username"];
	$Age = $_POST["Age"];
	
    $email = $_POST["email"];
    $password = $_POST["password"];
	
    // Insert data into database
    $sql = "INSERT INTO users (id,username, Age,email,password)
            VALUES ('$id','$username','$Age', '$email', '$password')";

		if (mysqli_query($conn, $sql)) {
			// Redirect to new page
			header("Location: userLogin.html");
			exit();
			// Make sure to exit after the header is sent
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

}

// Close database connection
mysqli_close($conn);
?>
