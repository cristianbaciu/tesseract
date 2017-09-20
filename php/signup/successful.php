<?php
session_start();
$error='';
if(isset($_POST['signup'])){
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$email = $_POST['email'];
	$uname = $_POST['uname'];
	$psw = $_POST['psw1'];
	$_SESSION['username'] = $uname;
	$_SESSION['fname'] = $firstname;
	$_SESSION['lname'] = $lastname;
	$_SESSION['email'] = $email;
	$_SESSION['psw1'] = $psw;
?>
<head>
<title>Successful</title>
</head>
<?php
	if($_POST['psw1'] != $_POST['psw2']){
		
		$error = "The passwords you entered are not the same!";
		echo $error;
?>
<?php
	}else{
		$connection = mysql_connect("127.0.0.1", "root", "");
		$db = mysql_select_db("foodster",$connection);
		$query = mysql_query("INSERT INTO users (firstname,lastname,email,username,password) VALUES('{$firstname}','{$lastname}','{$email}','{$uname}','{$psw}')",$connection);
		$welcome = $_SESSION['username'];
		$error = "Successfully signed up";
?>
<body>
<h1><?php echo $welcome; ?></h1>
<h2 style = "text-align:center;font-family: "Century Gothic", CenturyGothic, Geneva, AppleGothic, sans-serif;"><?php echo $error; ?></h2>
<a href = "/foodster2\index.php">Start your journey!</a>
</body>
<?php
		mysql_close($connection);
		}
	session_destroy();
}
?>