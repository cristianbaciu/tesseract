<?php
session_start();
$error=''; // Variable To Store Error Message
if (isset($_POST['login'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}
	else
		{
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysql_connect("127.0.0.1", "root", "");
		$db = mysql_select_db("foodster", $connection);
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		// Selecting Database
		$db = mysql_select_db("foodster", $connection);
		// SQL query to fetch information of registerd users and finds user match.
		$query = mysql_query("select * from users where password='$password' AND username='$username'", $connection);
		$rows = mysql_num_rows($query);
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Your Home Page</title>
	<link href="/foodster2\css\profile.css" rel="stylesheet">
	</head>
	<?php
	if ($rows == 1) {
		$_SESSION['login_user']=$username;
	?>
	<body>
		<div id = header class = "col-12">
			<ul>
				<div id = nav>
					<li><a href = "/foodster2\index.php">Home</a></li>
				</div>
				<div id = user>
					<li><a><img src = "/foodster2\css\images\icon2\user.png"></li></a>
					<li><a><img src = "/foodster2\css\images\icon2\cogwheel.png"></li></a>
					<a href = "/foodster2\php\upload\create.php"><li><img src = "/foodster2\css\images\icon2\add.png"></li></a>
				</div>
			</ul>
		</div>
		<div id = profile class = "col-12">
			<div id = "main" class = "col-5">
				<h2>Welcome, <?php echo $_SESSION['login_user']; ?></h2>
				<img src = "/foodster2\css\images\user\boy.png">
				<a href = logout.php>Log out</a>
			</div>
		</div>
		<div id = footer class = "col-12">
			<div id = credit>
				<h5>Icon made by https://www.flaticon.com/authors/freepik from www.flaticon.com</h5>
				<h5>Icon made by https://www.flaticon.com/authors/maxim-basinski from www.flaticon.com</h5>
			</div>
		</div>
	</body>
	<?php
	}else {
	$error = "Username or Password is invalid";
	$_SESSION['uname'] = $_POST['username'];
	echo $error;
	}
	mysql_close($connection); // Closing Connection
		}
	}
	?>
</html> 