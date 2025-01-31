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

    // fix: use a JOIN query to join the pending and users tables on id
    $quer = "SELECT pending.*,users.username, users.email FROM pending JOIN users ON pending.id = users.id WHERE pending.ac_id = '$id'";

    $query = "DELETE FROM pending WHERE ac_id = '$id'";

    // fix: execute the queries separately to check if they were successful
    $res = mysqli_query($conn, $quer);
    $result = mysqli_query($conn, $query);

    if ($result && $res)
    {
        // fix: fetch the row from the result of the SELECT query
        $row = mysqli_fetch_assoc($res);
        if ($row != null && !empty($row["email"]))
        {
            $name = $row["name"];
            $email = $row["email"];

            $to = $email;
            $subject = "Sorry : Your account is not approved";
            $message = "Dear $name,\n\nThis is a notice that your account is not approved due to some issues.\n\nThank you,\n[JUST Bank]";

            $headers = "From: 190118.cse@student.just.edu.bd" ;

            if (mail($to, $subject, $message, $headers))
            {
                echo "Don't approved emails sent successfully to $to.";
            }
            else
            {
                echo "Couldn't send email to $to.";
            }
        }
        else
        {
            echo " approvement is not allowed.";
        }
    }
    else
    {
        echo "Couldn't delete user.";
    }
}
else
{
    echo "Couldn't find the deleteUser button.";
}
?>
