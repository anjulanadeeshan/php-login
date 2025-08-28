<html>
	<head>
		<title>Login | first php webpage</title>
	</head>
	<body>
		<h2>Login Page</h2>
		<a href="index.php">Click here to go back</a>
		<form action="login.php" method="POST">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" required><br><br>
			
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required><br><br>
			
			<button type="submit" name="submit">Login</button>
		</form>
	</body>
</html>

<?php
	session_start();
	
	//database connection
	$servername = "localhost";
	$username = "root";
	$password = "200210702007";
	$dbname = "login_sys";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	//check connection
	if ($conn->connect_error) {
		die("Connection failed: " .$conn->connect_error);
	}
	
	//Check if username and password are set_error_handler
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		//hash the password using md5
		$password_hashed = MD5($password);

		//prepare and execute sql query
		$sql = "select*from users where username =? and password =?";
		    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password_hashed);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        echo "Login successful! Welcome, " . $username;
        // redirect to dashboard or home page
        // header("Location: dashboard.php");
        // exit();
    } else {
        echo "Invalid username or password!";
    }

    $stmt->close();

	}
	$conn -> close();
?>