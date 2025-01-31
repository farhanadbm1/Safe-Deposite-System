<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<style>
		body {
			background-color: #f1f1f1;
			font-family: Arial, sans-serif;
		}

		form {
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
			padding: 20px;
			margin: 20px auto;
			max-width: 500px;
		}

		h1 {
			color: #333;
			text-align: center;
		}

		label {
			color: #333;
			display: block;
			margin-bottom: 5px;
		}

		input[type="text"], input[type="email"], input[type="password"] ,input[type="number"]{
			border: none;
			border-radius: 5px;
			box-sizing: border-box;
			display: block;
			margin-bottom: 20px;
			padding: 10px;
			width: 100%;
			color: rgb(24, 27, 26);
			background-color: rgb(172, 238, 178);
			
		}

		button {
			background-color: #4CAF50;
			border: none;
			border-radius: 5px;
			color: #fff;
			cursor: pointer;
			padding: 10px 20px;
		}

		button:hover {
			background-color: #3e8e41;
		}

		.error {
			color: red;
			margin-bottom: 10px;
		}
		a{
			background-color: #4CAF50;
			border: none;
			border-radius: 5px;
			color: #fff;
			cursor: pointer;
			padding: 10px 20px;

		}
		a:hover{
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<form action="sign.php" method="POST">
		<h1>Sign Up</h1>
		<label for="id">ID</label>
		<input type="number" id="id" name="id" placeholder="Enter id">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required>
        <label for="Age">Age:</label>
		<input type="number" id="Age" name="Age" required>
        
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required>
		<div style="display: flex;">
		<button type="submit">Sign Up</button>
		<p style="margin:auto " ></p>
		<a href="userLogin.html">Login</a>
		</div>
		
		
		
		
	</form>
</body>
</html>
