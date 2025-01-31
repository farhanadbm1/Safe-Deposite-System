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

if (isset($_POST['button'])) {
    $sql = "SELECT * from users,account,dp_box  WHERE  users.id=account.id and DATEDIFF(NOW(), account.month) >= 180 ";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        while ($row = mysqli_fetch_assoc($result)) {
            // Do something with the data
            $name = $row["username"];
            $email = $row["email"];
            $billAmount = $row["b_rent"];
            $b= $row["b_id"];
            $dueDate = $row["month"];
            $to = $email;
            $subject = "Reminder: Your account will be opene";
            $message = "Dear $name,\n\nThis is a reminder that your account expired  of $" . $billAmount . " that you renwened on " . $dueDate . ". Your account will be opene .\n\nThank you,\n[JUST Bank]";

            $headers = "From: 190118.cse@student.just.edu.bd" ; 
            if( mail($to, $subject, $message, $headers))
            {
                echo "Payment reminder email sent successfully to $name ($to).";
            }
            else {
                $error = error_get_last();
                echo "Failed to send payment reminder email to $name ($to): " . $error['message'];
            }
        }
        
    }
    else {
        $error = mysqli_error($conn);
        echo "Failed to retrieve data from database: " . $error;
    }

} 
else {
    echo "The post button name is incorrect";
    }

// Close database connection
mysqli_close($conn);
?>
