
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
                .f {
            display: flex;
            flex-direction: column;
            align-items: center;
            width:50%;
            position: relative;
            }

            .f input[type="text"] {
            padding: 10px;
            margin: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            }


		input[type="text"] {
			padding: 10px;
			margin: 10px;
			width: 300px;
			border: 1px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px;
			margin: 10px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}

		label {
			font-size: 16px;
			font-weight: bold;
			margin-bottom: 5px;
            margin-right: 0%;
            color:white;
		}

		h1 {
			text-align: center;
			margin-top: 50px;
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
    <form class="f" action="bxcreate.php" method="POST">
		<h2>ADD BOX</h2>
		
		<label for="box_id">Box ID:</label>
		<input type="text" id="box_id" name="box_id" required>
		<label for="b_size">Box Size:</label>
		<input type="text" id="b_size" name="b_size" required>
	
		<button type="submit" name="submit">Submit</button>
	</form>
            </section>
        </div>
        
        
    </main>
    
</body>
</html>