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
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$ac_id = $_POST["account_id"];
	
	$query = "SELECT * FROM account where ac_id ='$ac_id' ";
	$result = mysqli_query($conn, $query);

	
	if (!$result) {
		printf("Error: %s\n", mysqli_error($conn));
		exit();
	}else{
		


// Get the user's IP address
$ip_address = $_SERVER['REMOTE_ADDR'];

// Get the current date and time
$timestamp = date("Y-m-d H:i:s");

// Get the account number and name




// Get the total time spent on the page (in seconds)
// Get the total time spent on the page (in seconds)

  
// Get the URL of the current page
$url = $_SERVER['REQUEST_URI'];

// Insert a new row into the log table with the relevant data
$sql = "INSERT INTO log_seeaccount (ip_address, timestamp, account_no, url) VALUES ('$ip_address', '$timestamp', '$ac_id',  '$url')";

mysqli_query($conn, $sql);

// Close the database connection



}
	
}
else {
	echo "Error: Invalid Request";
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<title>My National Bank</title>
	<link rel="stylesheet" href="home_page.css">
    <style>
		main{
			
		}
       .faka{
		height : 100px;
	   }
        table{
			margin:auto;
			align-items: center;
			color: white;
			width: 500px;
			line-height: 70px;
			border-radius:20%;	
        }
		th, td{
			box-sizing: content-box;
			padding: 3px;
			border: 1px solid black;
			justify-content: center;
			background-color: black;	
		}
		th{
            font-weight: bold;
        }
	</style>
</head>
<body>
	<header>
		<div class="logo">
			<img src="logo.jpg" alt="My National Bank Logo">
            <h1>J</h1>
            <h2>UST BANK</h2>
		</div>
		<nav>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Box</a></li>
				<li><a href="sign_up.php">Services</a></li>
				<li><a href="#">News &amp; Events</a></li>
				<li><a href="#">Contact Us</a></li>
                <li><a href="admin.html">Admin</a></li>				
			</ul>
		</nav>
	</header>
	<div class="faka"></div>
	<main> 
    <table>
        <tr>
            <th colspan="4"><h2>Account Information</h2></th>
        </tr>
        <tr>
            <th>Account ID</th>
            <th>Name</th>
            <th>Box ID</th>
			<th>City</th>
        </tr>
		<?php while ($rows = mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td><?php echo $rows['ac_id']; ?></td>
			<td><?php echo $rows['name']; ?></td>
			<td><?php echo $rows['b_id']; ?></td>
			<td><?php echo $rows['city']; ?></td>		
		</tr>
		<?php } ?>
    </table>
	</main>
	<script>
  var startTime = new Date();
  window.addEventListener('beforeunload', function(event) {
    var endTime = new Date();
    var timeSpent = Math.round((endTime - startTime) / 1000);
    document.getElementById('total_time').value = timeSpent;
  });
</script>
<script>
  var startTime = new Date().getTime();
  window.addEventListener('beforeunload', function() {
    var endTime = new Date().getTime();
    var totalTime = Math.round((endTime - startTime) / 1000);
    var account_id = "<?php echo $ac_id ?>";
    var account_name = "<?php echo $account_name ?>";
    var xhr = new XMLHttpRequest();
xhr.open('POST', 'log_seeaccount.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.send('total_time=' + timeSpent + '&account_id=' + account_id + '&account_name=' + account_name);

  });
</script>



</body>
</html>
