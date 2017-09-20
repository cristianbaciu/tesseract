<?php  
include('header.php');
//error_reporting(0);

// Raportează erorile simple la rulare
error_reporting(E_ERROR | E_WARNING | E_PARSE);


$connection = mysql_connect("127.0.0.1", "root", "");
$db = mysql_SELECT_db("foodster", $connection);

$ingredients=$_POST['ingredients'];

$cultures =$_POST['culture'];
$diets = $_POST['diet'];
$difficulties = $_POST['difficulty'];	
if($cultures){
	$sql_culture =" AND (Culture='".$cultures[0]."'" ;
	foreach($cultures as $culture){
		$sql_culture .= " OR Culture='".$culture."'"; 
	}

	$sql_culture .=")";
}
if($diets){
	$sql_diet = " AND (Diet = '".$diets[0]."' ";
	foreach($diets as $diet){
		$sql_diet .= " OR Diet = '".$diet."'";
	}
	$sql_diet .=")";
}
if($difficulties){
	$sql_diet = " AND (Difficulty = '".$difficulties[0]."' ";
	foreach($difficulties as $difficulty){
		$sql_difficulty .= " OR Difficulty = '".$difficulty."'";
	}
	$sql_difficulty .=")";
}
$sql_q = "SELECT * FROM recipes WHERE Ingredients LIKE '%$ingredients%' $sql_culture $sql_diet $sql_difficulty ORDER BY RecipeName ASC ";
//die($sql_q);
$results = mysql_query($sql_q, $connection);

$count_rows = @mysql_num_rows($results);

?>
<!DOCTYPE html>
<html>
<head>
<link href="css\result.css" rel="stylesheet" type="text/css">
<title>Results</title>
</head>
<body style = "background:url('css/images/result.png');">
<header>
</header>
<div id = "results">

<?php
// do we have results? if cont_rows is > 1 then yes 
if($count_rows < 1){

?>

<div>No result found</div>

<?php 
}else{

?>
<?php
	while ($row = mysql_fetch_assoc($results)){
		$RecipeName =$row['RecipeName'];
		$EstimatedTime = $row['EstimatedTime'];
		$Difficulty = $row["Difficulty"];
		$Link = "./recipe.php?id=".$row['Id'];
		$Culture = $row["Culture"];
		$Diet = $row['Diet'];
		echo"<a href = ".$Link.">
			<div class = container>
				<img src= 'css/images/result.png' >
				<div id = text-container>
					<label> &#167; Name: ".$RecipeName."</label>
					<label> &#167; Estimated Time: ".$EstimatedTime."</label>
					<label> &#167; Difficulty: ".$Difficulty." </label>
				</div>
			</div>
			</a>";
	};
}
?>

</div>
<footer>
	<div id = "footer" class = "col-12 page">
		<div id = credit>
				<h3>Credits</h3>
				<h4>Icon made by https://www.flaticon.com/authors/freepik from www.flaticon.com</h4>
			</div>
		<div id = "footer-info">
			<p>© 2017 All rights reserved</p>
			<a href="tos.html" style = "color:white" >Terms of Service</a> I <a href="#" style = "color:white">Privacy</a> I <a href="#" style = "color:white">SiteMap</a>			
		</div>
	</div>
</footer>
</body>
</html>