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
    $query = "DELETE from account where ac_id ='$id'";
    $result = mysqli_query($conn, $query);
    if($result)
    {
        echo "deletion succesfully";
       
        $quer = "UPDATE dp_box SET status = '0' WHERE b_id IN (SELECT b_id FROM account WHERE ac_id ='$id')";
        $res = mysqli_query($conn, $quer);

        if ($res) {
            echo "Status updated successfully";
            // Use a JOIN query to join the pending and account tables on ac_id
            $qu = "DELETE FROM pending WHERE ac_id = '$id'";

            $re = mysqli_query($conn, $qu);
            if ($re) {
                echo "Deleted from account";
            } else {
                echo "Error deleting from account: " . mysqli_error($conn);
            }
        } else {
            echo "Error updating status: " . mysqli_error($conn);
        }
    }
    else echo "Cant delete user"; 

}
else
echo " couldn't found the button";




?>     