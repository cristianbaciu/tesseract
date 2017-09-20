<?php 
include("header.php");
//error_reporting(0);

// Raportează erorile simple la rulare
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$connection = mysql_connect("127.0.0.1", "root", "");
$db = mysql_SELECT_db("foodster", $connection);


$sql_q = "SELECT * FROM recipes WHERE Id=".$_GET['id'];
	//die($sql_q);
$results = mysql_query($sql_q, $connection);

$count_rows = @mysql_num_rows($results);

?>
<!DOCTYPE html>
<html>
<head>
<title>Details</title>
<link href="css\recipes.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
	<br>
	<br>
	<br>
	<br>
</header>
<div class = "results">
	<a href = "#">Home/</a><a href = "javascript:history.back()">Recipes/</a><a href = "#">Details</a>
<?php
// do we have results? if cont_rows is > 1 then yes 
if($count_rows < 1){

?>

<div>No details found</div>

<?php 
}else{

?>
<?php

//link = ""
		while ($row = mysql_fetch_assoc($results)){
				$RecipeName =$row['RecipeName'];
				$EstimatedTime = $row['EstimatedTime'];
				$Difficulty = $row["Difficulty"];
				$Culture = $row["Culture"];
				$Diet = $row['Diet'];
				$Rating = $row['Rating'];
				echo "<h2 id = name>".$RecipeName."</h2>";
				echo "<img src = 'css/images/results.png'/>";
				echo "<div id = text-container>
				<label>Estimated Time: ".$EstimatedTime."</label><br>
				<label>Difficulty: ".$Difficulty;"</label><br>
				<label>Rating: ".$Rating."</label></div></div>";
				echo "<div id = ing-section></div>";
			}
}
?>

<footer>

</footer>
</body>
</html>