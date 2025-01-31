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

$sql = "SELECT * FROM dp_box WHERE status = 0 OR status = 1";


$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My National Bank</title>
	<link rel="stylesheet" href="home_page.css">
	<style>
		
		main {
			margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
		
        overflow: auto; /* add this line */
		margin-top:180px;display: flex;
		flex-wrap: wrap;
		justify-content: center;
		align-items: center;
			}

		.bs {margin-left:20px;
			width: 50%;
			height: 50%;
			overflow: auto;
			border: 1px solid #ccc;
			padding: 10px;
			box-sizing: border-box;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
		}

main .bs .b 
{
	color: aliceblue;
	background-color: rgb(14, 63, 54);
	box-sizing: content-box;
	padding: 2px;
	width: fit-content;
	margin-left: 5px;
	border-radius: 10%;
	align-items: center;
}
.bs{
	
	height:130px;width:120px;
	border-radius:10%;
}
.b {
			margin: 10px;
			background-color: #f0f0f0;
			padding: 10px;
			box-shadow: 1px 1px 3px rgba(0,0,0,0.2);
			border-radius: 5px;
		}
		main .bs a{
			color: white;
		}
		main .bs h3{
			color: white;
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

	<main style ="
	"> 
		<?php
while ($rows = mysqli_fetch_assoc($result)) {
  if ($rows['status'] == 0) { // status is 0
?>
    <div class="bs" style="background-color: green;
	">
      <h3>box <?php echo $rows['b_id']; ?></h3>
	  <a href="seedetails.php?b_id=<?php echo $rows['b_id']; ?>">See details</a>
    </div>
<?php
  } else { // status is not 0
?>
    <div class="bs" style="background-color: red;">
      <h3>box <?php echo $rows['b_id']; ?></h3>
	  <a href="seedetails.php?b_id=<?php echo $rows['b_id']; ?>">See details</a>

    </div>
<?php
  }
}
?>

	</main>
	
</body>
</html>
