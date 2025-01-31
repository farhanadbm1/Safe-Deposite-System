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
$b_id = $_GET['b_id'];

$query = "SELECT * FROM dp_box where b_id ='$b_id' ";
$result = mysqli_query($conn, $query);


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
				<li><a href="boxAvailable.php">Box</a></li>
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
            <th colspan="3"><h2>box Information</h2></th>
        </tr>
        <tr>
            <th>Box ID</th>
            <th>Box rent</th>
            <th>Box Size</th>
			
            
        </tr>
		<?php 
		 while ($rows = mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td><?php echo $rows['b_id']; ?></td>
			<td><?php echo $rows['b_rent']; ?></td>
			<td><?php echo $rows['box_size']; ?></td>
			
			
		</tr>
		<?php } ?>
    </table>
	</main>
	
	  
</body>
</html>
