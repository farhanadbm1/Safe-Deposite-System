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
if (isset($_POST['deleteUser']))
{
    $id = $_POST['deleteUser'];
    $query = "DELETE from sendmsg where ac_id ='$id'";
    $result = mysqli_query($conn, $query);
    if($result)
    {
        echo "deletion succesfully";
    }
    else echo "Cant delete user"; 

}
else
echo " couldn't found the button";




?>     