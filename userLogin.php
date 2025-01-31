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

if (isset($_POST['login'])) {
    // Sanitize user input to prevent SQL injection attacks
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Redirect to new page
        header("Location: service.html");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}

// Close database connection
mysqli_close($conn);
?>
