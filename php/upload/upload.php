<?php
session_start();
$author = $_SESSION['login_user'];
$error = '';
if (isset($_POST['upload'])){
	$title = $_POST['recipename'];
	$ingredients =  $_POST['ingredients'];
	$time =  $_POST['et'];
	$difficulty =  $_POST['difficulty'];
	$culture =  $_POST['culture'];
	$diet =  $_POST['dt'];
	$_SESSION['title'] = $title;
	$_SESSION['ing'] = $ingredients;
	$_SESSION['et'] = $time;
	$_SESSION['difficulty'] = $difficulty;
	$_SESSION['culture'] = $culture;
	$_SESSION['dt'] = $diet;
	$connection = mysql_connect("127.0.0.1", "root", "");
	$db = mysql_select_db("foodster",$connection);
	$query = mysql_query("INSERT INTO recipes (RecipeName,Ingredients,Culture,Difficulty,EstimatedTime,Author) VALUES ('{$title}','{$ingredients}','{$culture}','{$difficulty}','{$time}','{$author}')",$connection);
	if ($query == True){
		$error = "Recipe successfully uploaded!";
		echo $error;
		header('location:successful.php');
	}
	mysql_close($connection);
}
?>