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
    $query = "SELECT * FROM account WHERE ac_id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO accountdept.exac SELECT * FROM service.account";
        $result = mysqli_query($conn, $query);
 
        if ($result) {
            echo "Sent sucessfully";
            $quer = "UPDATE dp_box SET status = '0' WHERE b_id IN (SELECT b_id FROM account WHERE ac_id ='$id')";
            $res = mysqli_query($conn, $quer);

            if ($res) {
                echo "Status updated successfully";
                // Use a JOIN query to join the pending and account tables on ac_id
                $qu = "DELETE * FROM account WHERE ac_id = '$id'";

                $re = mysqli_query($conn, $qu);
                if ($re) {
                    echo "Deleted from account";
                } else {
                    echo "Error deleting from account: " . mysqli_error($conn);
                }
            } else {
                echo "Error updating status: " . mysqli_error($conn);
            }
        } else {
            echo "Error inserting into exac table: " . mysqli_error($conn);
        }
    } else {
        $query = "SELECT * FROM accountdept.exac WHERE ac_id = '$id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "The account ID already exists in the exac table.";
        } else {
            $query = "INSERT INTO accountdept.exac SELECT * FROM service.account WHERE ac_id = '$id'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "Sent sucessfully";
                $quer = "UPDATE dp_box SET status = '0' WHERE b_id IN (SELECT b_id FROM account WHERE ac_id ='$id')";
                $res = mysqli_query($conn, $quer);

                if ($res) {
                    echo "Status updated successfully";
                    // Use a JOIN query to join the pending and account tables on ac_id

                 $sql="   INSERT into open_box(ac_id,name,city,b_id,Phoneno,hairColor,eyeColor,height,weight,DateFrom,b_rent,Box_size,things,DateTO)
SELECT ac_id,name,city,account.b_id,phoneno,hairColor,eyeColor,height,weight,account.month,b_rent,box_size,things,now()
FROM account JOIN dp_box ON account.b_id = dp_box.b_id
WHERE account.ac_id = '$id'";


                    $let = mysqli_query($conn, $sql);
                    if($let)
                    {
                        $qu = "DELETE FROM account WHERE ac_id = '$id'";

                        $re = mysqli_query($conn, $qu);
                        if ($re) {
                            echo "Deleted from account";
                        } else {
                            echo "Error deleting from account: " . mysqli_error($conn);
                        }
                    }
                    else{
                        echo" error : cant insert into open box";
                    }
                   
                } else {
                    echo "Error updating status: " . mysqli_error($conn);
                }
            } else {
                echo "Error inserting into exac table: " . mysqli_error($conn);
            }
        }
    }
} else {
    echo "Button not found";
}

$conn->close();
?>
