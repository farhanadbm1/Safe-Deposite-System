
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

$query = "SELECT * from  sendmsg ";
$result = mysqli_query($conn, $query);

?>     
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My National Bank</title>
    <link rel="stylesheet" href="service.css">

       <style>
        table{
			margin:auto;
			align-items: center;
			margin-right:25px;
			color: white;
			width: 1100px;
			line-height: 40px;
			border-radius:20%;
			
			
        }
		th, td{
			box-sizing: content-box;
			padding: 2px;
			border: 1px solid black;
			justify-content: center;
            background-color: gray;
			
		}
		td{
           
		}
       </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.jpg" alt="My National Bank Logo">
            <h1 style="font-size: xx-large;">J</h1>
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
    <main> 
        <div class=" display">
            
            <section class=" service" style="background-color: black;color: aliceblue;">
                <h1 style="font-size: xx-large; padding: 4px;">DASHBORED</h1>
                <div style="margin-left: 5 px;padding: 4px;">
                <h2 style="width: auto;">
                <form action="REGISTERuSER.php" method="post">
                            <button type="submit" name="submit">Account Management</button>
                        </form>
                
                        <form action="seePayment.php" method="post">
                            <button type="submit" name="submit">See Due payment</button>
                        </form>
                        <form action="SeeExpirepayment.php" method="post">
                            <button type="submit" name="submit">See Expire payment</button>
                        </form>
                        <form action="seepand.php" method="post">
                            <button type="submit" name="submit">Approve Account</button>
                        </form>
                        <form action="" method="post">
                            <button type="submit" name="submit">Transaction Management</button>
                        </form>
                        <form action="seeMsg.php" method="post">
                            <button type="submit" name="submit">Customer Support</button>
                        </form>
                
                        <form action="Payment.php" method="POST">
                            <button type="submit" name="button">
                                Notify For Payment
                            </button>  
                        </form>
                        <form action="expirePayment.php" method="POST">
                            <button type="submit" name="button">
                                Notify  immediately
                            </button>  
                        </form>
                        <form action="seeEXaccount.php" method="post">
                            <button type="submit" name="submit">See Expire Account</button>
                        </form>
            </h2>
                </div>
               
            </section>
            <section class="hero">
                 <table>
                    <tr>
                        <th colspan="5"><h2>Due Payment Account Information</h2></th>
                    </tr>
                    <tr>
                        <th>Account ID</th>
                        <th>Name</th>
                        <th>Messege</th>
                        <th></th>
                        
                    </tr>
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") 
                    while ($rows = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $rows['ac_id']; ?></td>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['msg']; ?></td>
                        <td><form action="deletemsg.php" method =  "POST">  <button type="submit" name ="deleteUser" value =" <?=  $rows['ac_id']; ?>">Delete</button></form></td>
                       
                    </tr>
                    <?php } ?>
                </table>
            </section>
        </div>
        
        
    </main>
    
</body>
</html>