<!DOCTYPE html>
<html>
<head>
<title>Results</title>
<link href="result.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
<h2>Results:</h2>
</header>
<div class = "results">
<?php
	$connection = mysql_connect("127.0.0.1", "root", "");
	$db = mysql_SELECT_db("foodster", $connection);
	session_start();
	$string_check=$_SESSION['string'];
	if (isset($_SESSION['culture'])){
		$culture_check = $_SESSION['culture'];
		$ses_sql=mysql_query("SELECT * FROM recipes WHERE Ingredients LIKE '%$string_check%' AND Culture = '$culture_check' ORDER BY RecipeName ASC", $connection);
	}
	else{
		$ses_sql=mysql_query("SELECT * FROM recipes WHERE Ingredients LIKE '%$string_check%' ORDER BY RecipeName ASC", $connection);
	}
	echo "<div id = results-container>";
	echo "<ul>";
		while ($row = mysql_fetch_assoc($ses_sql)){
				$RecipeName =$row['RecipeName'];
				$EstimatedTime = $row['EstimatedTime'];
				$Difficulty = $row["Difficulty"];
				$Link = $row["Link"];
				$Culture = $row["Culture"];
				$Diet = $row['Diet'];
				echo "<li class = result>
				<img scr=><br>
				<label>Name: <a href =".$Link."> ".$RecipeName."</a></label><br>
				<label>Estimated Time: <a>".$EstimatedTime."</a></label><br>
				<label>Difficulty: <a>".$Difficulty;"</a></label></li>";
			}
	echo "</ul>";
	echo "</div>";
?>
</div>
<footer>
<h3><a href="back.php" id="logout">Go back</a></h3>
</footer>
</body>
</html>