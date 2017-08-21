<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
	if (empty($_POST['ingredients'])) {
		$error = "Please enter at least one ingredient!";
		echo $error;
	}
	else
	{
		$string=$_POST['ingredients'];
		$connection = mysql_connect("127.0.0.1", "root", "");
		$db = mysql_select_db("foodster", $connection);
		if (isset($_POST['culture'])){
			foreach($_POST['culture'] as $culture){
				$query = mysql_query("SELECT * FROM recipes WHERE Ingredients LIKE '%$string%' AND Culture = '$culture' ORDER BY RecipeName ASC ", $connection);
				$rows = mysql_num_rows($query);
				if($rows >= 1){
					$_SESSION['string'] = $string;
					$_SESSION['culture'] = $culture;
					header("location: results.php");
				}
				else {
				$error = "No recipe was found.";
				echo "<script>alert('$error');</script>";
				}
			}
		}
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		// Selecting Database
		else{
			$query = mysql_query("select * FROM recipes WHERE Ingredients LIKE '%$string%' ORDER BY RecipeName ASC", $connection);
			$rows = mysql_num_rows($query);
			if ($rows >= 1) {
			$_SESSION['string'] = $string;
			$_SESSION['culture'] = $culture; 
			header("location: results.php");
			} 
			else {
			$error = "No recipe was found.";
			echo "<script>alert('$error');</script>";
			}
		}
	mysql_close($connection);
	}
}
?>
