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

if (isset($_POST['deleteUser'])) {
    $id = $_POST['deleteUser'];

    $query = "SELECT * FROM pending WHERE ac_id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Check if the account ID already exists in the account table
        $checkQuery = "SELECT * FROM account WHERE ac_id = '$id'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) == 0) {
            // The account does not exist in the account table, perform the insertion
            $query = "INSERT INTO account (ac_id, id, name, phoneno, b_id, hairColor, eyeColor, height, weight, city, month) 
                      SELECT ac_id, id, name, phoneno, b_id, hairColor, eyeColor, height, weight, city, NOW() 
                      FROM pending WHERE ac_id = '$id'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                // Account inserted successfully
                // Send email and other actions as needed
                // ...

                // Update dp_box status and delete from pending
                $quer = "UPDATE dp_box SET status = '1' WHERE b_id IN (SELECT b_id FROM account WHERE ac_id ='$id')";
                $res = mysqli_query($conn, $quer);

                if ($res) {
                    echo "Approved successfully";
                    $qu = "DELETE FROM pending WHERE ac_id = '$id'";
                    $re = mysqli_query($conn, $qu);
                    if ($re) {
                        echo "Deleted from pending";
                    } else {
                        echo "Error deleting from pending: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error updating status: " . mysqli_error($conn);
                }
            } else {
                echo "Error inserting into account table: " . mysqli_error($conn);
            }
        } else {
            echo "The account ID already exists in the account table.";
        }
    } else {
        echo "The account ID already exists in the pending table.";
    }
} else {
    echo "Button not found";
}

$conn->close();
?>
