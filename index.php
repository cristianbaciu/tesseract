<?php
include('search.php'); // Includes Login Script

if(isset($_SESSION['string'])){
header("location: results.php");
}
?>
<head>
<title>Foodster</title>
<link href="index.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<form class="search" method="post">
			<div class="container">
				<img src = "logo.png" style = "height:160px; width:360px;"/>
				<br>
				<input type="text" name="ingredients" id = "sb" value = "" style = "text-transform:lowercase;"/>
				<button id = "searchbutton" name="submit" type="submit" onclick = "format();saveString();">Search</button><br><br>
				<ul id = "myList" style = "list-style:none;float:center;">
				</ul>
				<div id = "filters">
					<div id = "culture">
						<a class="filterbuttons"><p>Culture</p></a>
						<div class="details">
						    <div class = "checkbox"><label><input type = "checkbox" name = "culture[]" value ="africancuisine"/>African Cuisine</label></div>
						    <div class = "checkbox"><label><input type = "checkbox" name = "culture[]" value ="europeancuisine"/>European Cuisine</label></div>
						    <div class = "checkbox"><label><input type = "checkbox" name = "culture[]" value ="northamericancuisine"/>North American Cuisine</label></div>
						    <div class = "checkbox"><label><input type = "checkbox" name = "culture[]" value ="oceaniancuisine"/>Oceanian Cuisine</label></div>
						    <div class = "checkbox"><label><input type = "checkbox" name = "culture[]" value ="orientalcuisine"/>Oriental Cuisine</label></div>
						    <div class = "checkbox"><label><input type = "checkbox" name = "culture[]" value ="orientalcuisine"/>South American Cuisine</label></div>
						</div>
					</div>
					<div id = "diet">
						<a class="filterbuttons"><p>Diet</p></a>
							<div class = "details">
							<div class = "checkbox"><label><input type = "checkbox" name = "diet[]" value ="Balanced Diet"/>Balanced Diet</label></div>
							<div class = "checkbox"><label><input type = "checkbox" name = "diet[]" value ="Vegetarian"/>Vegetarian</label></div>
							<div class = "checkbox"><label><input type = "checkbox" name = "diet[]" value ="Vegan"/>Vegan</label></div>
						</div>
					</div>
					<div id = "et">
						<a class="filterbuttons"><p>Estimated Time</p></a>
						<div class = "details">
							<div class = "checkbox"><label><input type = "checkbox" name = "et[]" value ="Less than 10 Min "/>Less than 10 Min</label></div>
							<div class = "checkbox"><label><input type = "checkbox" name = "et[]" value ="10 Min to 30 Min"/>10 Min to 30 Min</label></div>
							<div class = "checkbox"><label><input type = "checkbox" name = "et[]" value ="Around 30 Min to 1 Hour"/>Around 30 Min to 1 Hour</label></div>
							<div class = "checkbox"><label><input type = "checkbox" name = "et[]" value ="More than 1 Hour"/>More than 1 Hour</label></div>
						</div>
					</div>
					<div id = "difficulty">
						<a class="filterbuttons"><p>Difficulty</p></a>
							<div class = "details">
							<div class = "checkbox"><label><input type = "checkbox" name = "diff[]" value ="1 / 5"/>Definition of a newbie..</label></div>
							<div class = "checkbox"><label><input type = "checkbox" name = "diff[]" value ="3 / 5"/>I know how to cook.</label></div>
							<div class = "checkbox"><label><input type = "checkbox" name = "diff[]" value ="5 / 5"/>I'M THE MASTERR!</label></div>
						</div>
				</div>
			</div>
				<div id = total>
				<button class="section" type = button>Meats</button>
				<div class="panel">
					<button type=button onclick="addArray(this);newElement(this);" value = "Eggs">Eggs</button>
					<button type=button onclick="addArray(this);newElement(this);" value = "Ribs">Ribs</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Bacon">Bacon</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Beef steak">Beef steak</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Chicken breast">Chicken breast</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Chicken wing">Chicken wing</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Ground beef">Ground beef</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Lamb">Lamb</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Pork rib">Pork rib</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Sausage">Sausage</button>
				</div>
				<button class="section" type = button>Vegetables</button>
				<div class="panel">	
				  	<button type=button onclick="addArray(this);newElement(this);" value="Argula" >Arugula</button>					  	
					<button type=button onclick="addArray(this);newElement(this);" value="Broccoli" >Broccoli</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Brussels Sprouts" >Brussels Sprouts</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Cabbage" >Cabbage</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Celery" >Celery</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Carrots" >Carrots</button>			
					<button type=button onclick="addArray(this);newElement(this);" value="Kale" >Kale</button>
				</div>

				<button class="section" type = button>Fruits</button>
				<div class="panel">
					
				  	<button type=button onclick="addArray(this);newElement(this);" value="Apple">Apple</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Avocado">Avocado</button>					
					<button type=button onclick="addArray(this);newElement(this);" value="Blueberries">Blueberries</button>			
					<button type=button onclick="addArray(this);newElement(this);" value="Cantaloupe">Cantaloupe</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Forestberries">Forestberries</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Grapefruit">Grapefruit</button>						
					<button type=button onclick="addArray(this);newElement(this);" value="Kiwi">Kiwi</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Lime">Lime</button>
				</div>
				<button class="section" type = button>Seafoods</button>
				<div class="panel">
				 	<button type=button onclick="addArray(this);newElement(this);" value="Anchovy">Anchovy</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Bass">Bass</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Cod">Cod</button>		
					<button type=button onclick="addArray(this);newElement(this);" value="Kingfish">Kingfish</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Lobster">Lobster</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Salmon">Salmon</button>
				</div>
				<button class="section" type = button>Dairy</button>
				<div class="panel">						
					<button type=button onclick="addArray(this);newElement(this);" value="Butter">Butter</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Cheese">Cheese</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Cream">Cream</button>	
				  	<button type=button onclick="addArray(this);newElement(this);" value="Milk">Milk</button>				  	
				</div>
				<button class="section" type = button>Seasonings</button>
				<div class="panel"> 						
				  	<button type=button onclick="addArray(this);newElement(this);" value="Salt">Salt</button>					  	
					<button type=button onclick="addArray(this);newElement(this);" value="Black pepper">Black pepper</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Boia">Boia</button>					
					<button type=button onclick="addArray(this);newElement(this);" value="Cinammon">Cinammon</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Garlic">Garlic powder</button>
					<button type=button onclick="addArray(this);newElement(this);" value="Parsley">Parsley</button>
				</div>
				</div>				
		</form>
	<script>
		var button =  document.getElementById("sb");
		var ingredients = new Array();
		var x = 0;
		function addArray(ing){
			ingredients[x] = ing.value;
			x++;
			ingredients.toString();
			document.getElementById('sb').value = ingredients;
			var li = document.createElement("button");
			var value = ing.value;
			li.setAttribute('type','button');
			var t = document.createTextNode(value);
			li.appendChild(t);
			document.getElementById("myList").appendChild(li);
			var span = document.createElement("span");
				var txt = document.createTextNode("\u00D7");
				span.className = "close";
				span.appendChild(txt);
				li.appendChild(span);
	  			var close = document.getElementsByClassName("close");
				var y;
				for (y = 0; y < close.length; y++) {
				close[y].onclick = function() {
 				var div = this.parentElement;
  				div.style.display = "none";
				}
			}
			$('#searchbutton').focus();
		}

		var sec = document.getElementsByClassName("section");
		var i;

		for (i = 0; i < sec.length; i++) {
		    sec[i].onclick = function(){
		        /* Toggle between adding and removing the "active" class,
		        to highlight the button that controls the panel */
		        this.classList.toggle("active");

		        /* Toggle between hiding and showing the active panel */
		        var panel = this.nextElementSibling;
		        if (panel.style.display === "block") {
		            panel.style.display = "none";
		        } else {
		            panel.style.display = "block";
		        }
		    }
		}
		$(document).ready(function() {
		    $("p").click(function() {
		        $(this).parent().nextAll('.details').first().toggle('fast');
		    });
		});
	</script>
</body>