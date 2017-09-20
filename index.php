<?php
session_start();
$_SESSION['username'] = "";
$_SESSION['fname'] = "";
$_SESSION['lname'] = "";
$_SESSION['email'] = "";
$_SESSION['psw1'] = "";
$bg = array('css/images/1.jpeg','css/images/1.2.jpg','css/images/1.3.jpeg');

$i = rand(0, count($bg)-1);
$selectedBg = "$bg[$i]"; 
?>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Foodster</title>
		<link href="css\modal.css" rel="stylesheet">
		<link href="css\button5.css" rel="stylesheet">
		<link href="css\reg.css" rel="stylesheet">
		<link href="css\button6.css" rel="stylesheet">
		<link href="css\login.css" rel = "stylesheet">
		<link href="css\description.css" rel = "stylesheet">
		<link href="css\about us.css" rel = "stylesheet">
		<link href="css\contact.css" rel = "stylesheet">
		<link href="css\index.css" rel="stylesheet">
		<link href="css\search.css" rel = "stylesheet">
		<script type="text/javascript" src = "js\validation.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
		<style>
			#homepage{
				background:url("<?php echo $selectedBg; ?>") no-repeat;
				background-size:cover;
			}
		</style> 	
</head>
<body>
	<a id = "top"></a>
	<div id = "homepage" class = "page">
		<div id = "header" class = "col-12">
			<img src = "css\images\logo.png">
				<ul>
					<li><a href = "#top"><button class = "button col-12"><span>Home</span></button></a></li>
					<li><a href = "#anchor1"><button class = "button col-12"><span>Product</span></button></a></li>
					<li><a href = "#anchor2"><button class = "button col-12"><span>About us</span></button></a></li>
					<li><a href = "#anchor3"><button class = "button col-12"><span>Contact</span></button></a></li>
					<li><button id="button5" class = "col-12"><span>Sign up</span></button></li>
					<div id="modal1">
						<div class="modal-content1">
							<span class="close1">&times;</span>
							<div id = "form1">
								<form method = "post" action = "php\signup\successful.php">
									<fieldset>
									<legend><span class="number">1</span>Your basic info</legend>
									<label for="fname">First name:*</label>
									<input type="text" id="firstName" value = "<?php echo $_SESSION['fname'];?>" name="fname">

									<label for="lname">Last name:*</label>
									<input type="text" id="lastName" value = "<?php echo $_SESSION['lname'];?>" name="lname" >

									<label for="email">Email address:*</label>
									<input type="email" id="email" value = "<?php echo $_SESSION['email'];?>" name="email" >

									<label for="uname">Username:*</label>
									<input type="text" id="userName" value = "<?php echo $_SESSION['username'];?>" name="uname">

									<label for="psw1">Password:*</label>
									<input type="password" id="password1" value = "<?php echo $_SESSION['psw1'];?>" name="psw1" >

									<label for="psw2">Confirm password:*</label>
									<input type="password" id="password2" value = "" name="psw2" >

									<label>Age:</label>
									<label class="light"><input type="checkbox">Under 18</label><br>
									<label class="light"><input type="checkbox">18 or older</label>
									<br>
									<br>
									<label class="light"><input type="checkbox">Sign up for newsletters</label><br>
									<label class="light"><input type="checkbox" checked="checked" required>Terms of service*</label><br>
									</fieldset>
									<button name = signup type = submit onclick = "validate();">Sign Up</button>
								</form>
							</div>
							<script>
							var modal1 = document.getElementById('modal1');

							var btn1 = document.getElementById("button5");

							var span1 = document.getElementsByClassName("close1")[0];

							btn1.onclick = function() {
							modal1.style.display = "block";
							}

							span1.onclick = function() {
							modal1.style.display = "none";
							}

							window.onclick = function(event) {
							if (event.target != modal1) {
							modal1.style.display = "none";
							}
							}
							</script>
						</div>
					</div>
					<li><button id="button6" class = "col-12"><span>Log in</span></button></li>
					<div id="modal2">
						<div class="modal-content2">
						<span class="close2">&times;</span>
							<form action="php\login\profile.php" method="post" id ="form2">
								<fieldset>
									<div class="container">
										<label><h2>Username</h2></label>
										<input id="name" name="username" type="text" value = ""><br>
										<label><h2>Password</h2></label>
										<input id="password" name="password" type="password"><br>
										<input name="login" type="submit" value=" Login " id = "button"><br>
										<input type="checkbox" checked="checked">Remember me
									</div>
									<div class="container">
										<span class="psw">Forgot <a href="#">password?</a></span>
									</div>
								</fieldset>
							</form>
							<script>
							var modal2 = document.getElementById('modal2');

							var btn2 = document.getElementById("button6");

							var span2 = document.getElementsByClassName("close2")[0];

							btn2.onclick = function() {
							modal2.style.display = "block";
							}

							span2.onclick = function() {
							modal2.style.display = "none";
							}

							window.onclick = function(event) {
							if (event.target == modal2) {
							modal2.style.display = "none";
							}
							}
							</script>
						</div>
					</div>
				</ul>		
		</div>
		<form class="search" method="post" action="results.php">
			<div id = search>
				<input type="text" name="ingredients" id = "sb" value = "" placeholder = "bacon,eggs ..etc" style = "text-transform:lowercase;" required/>
				<button id = "searchbutton" name="search" type="submit" onclick = "saveString();">Search</button>
			</div>
			<ul id = "myList" style = "list-style:none;float:center;">
			</ul>
			<div id = filter class = "col-2">
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
					<a class="filterbuttons"><p>Diet Type</p></a>
					<div class = "details">
						<div class = "checkbox"><label><input type = "checkbox" name = "diet[]" value ="balanceddiet"/>Balanced Diet</label></div>
						<div class = "checkbox"><label><input type = "checkbox" name = "diet[]" value ="vegetarian"/>Vegetarian</label></div>
						<div class = "checkbox"><label><input type = "checkbox" name = "diet[]" value ="vegan"/>Vegan</label></div>
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
						<div class = "checkbox"><label><input type = "checkbox" name = "difficulty[]" value ="1 / 5"/>No ideaa</label></div>
						<div class = "checkbox"><label><input type = "checkbox" name = "difficulty[]" value ="3 / 5"/>I know how to cook</label></div>
						<div class = "checkbox"><label><input type = "checkbox" name = "difficulty[]" value ="5 / 5"/>Mastaaa!</label></div>
					</div>
				</div>
			</div>
				<div id = total class = col-8>
					<button class="section" type = button>Meats</button>
					<div class="panel">
						<button class = "ing" type = button onclick="addArray(this);" value = "Eggs">Eggs</button>
						<button class = "ing" type = button onclick="addArray(this);" value = "Ribs">Ribs</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Bacon">Bacon</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Beef steak">Beef steak</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Chicken breast">Chicken breast</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Chicken wing">Chicken wing</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Ground beef">Ground beef</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Lamb">Lamb</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Pork rib">Pork rib</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Sausage">Sausage</button>
					</div>
					<button class="section" type = button>Vegetables</button>
					<div class="panel">	
					  	<button class = "ing" type = button onclick="addArray(this);" value="Argula" >Arugula</button>					  	
						<button class = "ing" type = button onclick="addArray(this);" value="Broccoli" >Broccoli</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Brussels Sprouts" >Brussels Sprouts</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Cabbage" >Cabbage</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Celery" >Celery</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Carrots" >Carrots</button>			
						<button class = "ing" type = button onclick="addArray(this);" value="Kale" >Kale</button>
					</div>
					<button class="section" type = button>Fruits</button>
					<div class="panel">				
					  	<button class = "ing" type = button onclick="addArray(this);" value="Apple">Apple</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Avocado">Avocado</button>					
						<button class = "ing" type = button onclick="addArray(this);" value="Blueberries">Blueberries</button>			
						<button class = "ing" type = button onclick="addArray(this);" value="Cantaloupe">Cantaloupe</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Forestberries">Forestberries</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Grapefruit">Grapefruit</button>						
						<button class = "ing" type = button onclick="addArray(this);" value="Kiwi">Kiwi</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Lime">Lime</button>
					</div>
					<button class="section" type = button>Seafoods</button>
					<div class="panel">
					 	<button class = "ing" type = button onclick="addArray(this);" value="Anchovy">Anchovy</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Bass">Bass</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Cod">Cod</button>		
						<button class = "ing" type = button onclick="addArray(this);" value="Kingfish">Kingfish</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Lobster">Lobster</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Salmon">Salmon</button>
					</div>
					<button class="section" type = button>Dairy</button>
					<div class="panel">						
						<button class = "ing" type = button onclick="addArray(this);" value="Butter">Butter</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Cheese">Cheese</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Cream">Cream</button>	
					  	<button class = "ing" type = button onclick="addArray(this);" value="Milk">Milk</button>				  	
					</div>
					<button class="section" type = button>Seasonings</button>
					<div class="panel"> 						
					  	<button class = "ing" type = button onclick="addArray(this);" value="Salt">Salt</button>					  	
						<button class = "ing" type = button onclick="addArray(this);" value="Black pepper">Black pepper</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Boia">Boia</button>					
						<button class = "ing" type = button onclick="addArray(this);" value="Cinammon">Cinammon</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Garlic">Garlic powder</button>
						<button class = "ing" type = button onclick="addArray(this);" value="Parsley">Parsley</button>
					</div>
				</div>
		</form>
		<a href = "#anchor1" class = "anchor down"></a>
	</div>
	<a id = "anchor1"></a>
	<div id = "description" class = "col-12 page">
		<article>
			<h3>The Product</h3>
			<p style = "font-size:22px;">This is one of a kind state of the art application which intends to make your life easier to enjoy. Trying to cook without knowing the steps can be a tedious and difficult process. Thus as a result we as a team have come up with Foodster, The app that allows people of all age groups to cook like a master chef. All one has to do is to enter the available ingredients and the app gives a variety of related recipes with detailed steps.</p>
			<br>
			<a id = "noti">(Prototype only.)</a>
		</article>
		<a href = "#anchor2" class = "anchor down"></a>
		<a href = "#top" class = "anchor up"></a>
	</div>
	<a id = "anchor2"></a>	
	<a href = "#anchor1"></a>
	<div id = "aboutus" class = "col-12 page">
		<div id = "article" >
			<h3>About us</h3>
			<p class = "col-8">We, the developers are a group of students of 5 students from an international school in Romania. This app was designed as a part of a project/competition under the guidance of a personal tutor from a major tech company.
			Our team consists of 5 students : Matthias Danowsky, Sam Khandavalli, Tudor Lungu, Georgiana Mois, and Longxiang Qian, under the watchful eye of Mr. Cristian Baciu. 
			Our main aim is to make the world a better place to live in, one step at a time.</p>
		</div>
		<ul id = "img-container" class = "col-12">
			<li><h5>Project manager</h5><img src = "css/images/m.png" class = "card"/><br><label>Cristian Baciu</label></li>
			<li><h5 style = "color:white">Visual tester</h5><img src = "css/images/m.png" class = "card"/><br><label style = "color:white">Matthias Danowsky</label></li>
			<li><h5>Back-end assistant</h5><img src = "css/images/m.png" class = "card"/><br><label>Tudor Lungu</label></li>
			<li><h5>Visual tester</h5><img src = "css/images/f.png" class = "card"/><br><label>Georgiana Mois</label></li>	
			<a href = "https://www.facebook.com/samsreedeep.khandavalli?ref=ts&fref=ts" style = "color:black"><li><h5>Content creater</h5><h5>Functionality tester</h5><img src = "css/images/m.png" class = "card"/><br><label>Sam Khandavalli</label></li></a>
			<a href = "https://www.facebook.com/profile.php?id=100006561281707&fref=ts" style = "color:black"><li><h5>Team leader</h5><h5>Chief programmer</h5><img src = "css/images/m.png" class = "card"/><br><label>Longxiang Qian<br></label></li></a>
		</ul>
		<a href = "#anchor3" class = "anchor down"></a>
		<a href = "#anchor1" class = "anchor up"></a>
	</div>
	<a id = "anchor3"></a>
	<div id = "contact" class ="page">
		<h3>Contact</h3>
		<div id = "address" class = col-6>
			<h4>Our location</h4>
			<p>Aleea Băisoara 2, Cluj-Napoca 400000</p>
		<div id="map"></div>
		</div>
		<div id = "info" class = col-6>
			<h4>Email</h4>
			<p>tesseracttc@gmail.com</p>
		</div>
		<a href = "#anchor2" class = "anchor up"></a>
	<a href = "#top" class = anchor></a>
	</div>
		<script>
			function initMap() {
			var TC = {lat: 46.7644, lng: 23.6246};
			var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 14,
			center: TC
			});
			var marker = new google.maps.Marker({
			position: TC,
			map: map
			});
			}
		</script>
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdt_JtjkQpzNYTmzs3NbFnLonst-0U1hQ&callback=initMap">
		</script>
	</div>
	<div id = "footer" class = "col-12 page">
		<div id = "footer-info">
			<p>© Copyright 2017, Longxiang Qian, All rights reserved.</p>
			<a href="tos.html" style = "color:white" >Terms of Service</a> I <a href="css\images\sitemap.png" style = "color:white">Privacy</a> I <a href="#" style = "color:white">SiteMap</a>
		</div>
	</div>
	<script>
			var button =  document.getElementById("sb");
			var ingredients = new Array();
			var x = 0;
				ingredients =  new Array();
			var n = 0
			function addArray(ing){
				ingredients[n] = ing.value;
				n++
				ingredients.toString();
				document.getElementById('sb').value = ingredients;
				var button = document.createElement("button");
				var value = ing.value;
				button.className = "ing";
				button.value = ing.value;
				button.setAttribute('type','button');
				var t = document.createTextNode(value);
				button.appendChild(t);
				document.getElementById("myList").appendChild(button);
				var span = document.createElement("span");
					var txt = document.createTextNode("\u00D7");
					span.className = "close";
					span.appendChild(txt);
					button.appendChild(span);
		  			var close = document.getElementsByClassName("close");
					var y;
					for (y = 0; y < close.length; y++) {
					close[y].onclick = function() {
						var div = this.parentElement;
						div.style.display = "none";
						value = div.value;
						var index = ingredients.indexOf(value);
						if (index != -1){
							ingredients.splice(index,1);
						}
						document.getElementById('sb').value = ingredients;
					}

					$('#searchbutton').focus();
				}
			}
				

			var sec = document.getElementsByClassName("section");
			var i;

			for (i = 0; i < sec.length; i++) {
			    sec[i].onclick = function(){
			        this.classList.toggle("active");
			        var panel = this.nextElementSibling;
			        if (panel.style.display === "block") {
			            panel.style.display = "none";
			        } else {
			            panel.style.display = "block";
			        }
			    }
			}
			$(document).ready(function() {
			    $("a>p").click(function() {
			        $(this).parent().nextAll('.details').first().toggle('fast');
			    });
			});

	</script>
</body>