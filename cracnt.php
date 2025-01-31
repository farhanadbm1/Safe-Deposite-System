<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "service";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $rg_id =$_POST["rg_id"];
    $name = $_POST["name"];
    $pnNo =$_POST["phoneno"];
    $city = $_POST["city"];
    $box_id = $_POST["box_id"];
    $hcl = $_POST["bank_branch"];
    $eyecl = $_POST["eyeclr"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
  

    $sql = "INSERT INTO pending (id,name,phoneno,b_id,hairColor,eyeColor,height,weight,city) VALUES ('$rg_id', '$name',' $pnNo', '$box_id', '$hcl', '$eyecl','$height','$weight','$city')";

    if ($conn->query($sql) === TRUE) {
        echo "Please wait for approved";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
