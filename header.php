<head>
	<link href="css\modal.css" rel="stylesheet">
	<link href="css\button5.css" rel="stylesheet">
	<link href="css\reg.css" rel="stylesheet">
	<link href="css\button6.css" rel="stylesheet">
	<link href="css\login.css" rel = "stylesheet">
	<link href="css\index.css" rel="stylesheet">
</head>
<div id = "header" class = "col-12">
	<ul>
		<li><a href = "index.php"><button class = "button col-12"><span>Home</span></button></a></li>
		<li><a href = "index.php#anchor1"><button class = "button col-12"><span>Product</span></button></a></li>
		<li><a href = "index.php#anchor2"><button class = "button col-12"><span>About us</span></button></a></li>
		<li><a href = "#index.php#anchor3"><button class = "button col-12"><span>Contact</span></button></a></li>
		<li><button id="button5" class = "col-12"><span>Sign up</span></button></li>
		<div id="modal1">
			<div class="modal-content1">
				<span class="close1">&times;</span>
				<div id = "form1">
					<form method = "post" action = "php\signup\successful.php">
						<fieldset>
						<legend><span class="number">1</span>Your basic info</legend>
						<label for="fname" class = "label">First name:*</label>
						<input type="text" id="firstName" value = "<?php echo $_SESSION['fname'];?>" name="fname">

						<label for="lname" class = "label">Last name:*</label>
						<input type="text" id="lastName" value = "<?php echo $_SESSION['lname'];?>" name="lname" >

						<label for="email" class = "label">Email address:*</label>
						<input type="email" id="email" value = "<?php echo $_SESSION['email'];?>" name="email" >

						<label for="uname" class = "label">Username:*</label>
						<input type="text" id="userName" value = "<?php echo $_SESSION['username'];?>" name="uname">

						<label for="psw1" class = "label"Password:*</label>
						<input type="password" id="password1" value = "<?php echo $_SESSION['psw1'];?>" name="psw1" >

						<label for="psw2" class = "label">Confirm password:*</label>
						<input type="password" id="password2" value = "" name="psw2" >

						<label class = "label">Age:</label>
						<label class="light"><input type="checkbox">Under 18</label><br>
						<label class="light label"><input type="checkbox">18 or older</label>
						<br>
						<br>
						<label class="light label"><input type="checkbox">Sign up for newsletters</label><br>
						<label class="light label"><input type="checkbox" checked="checked" required>Terms of service*</label><br>
						</fieldset>
						<button name = signup type = submit>Sign Up</button>
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
						<div class="log-container">
							<label class = "label"><h2>Username</h2></label>
							<input id="name" name="username" type="text" value = ""><br>
							<label class = "label"><h2>Password</h2></label>
							<input id="password" name="password" type="password"><br>
							<input name="login" type="submit" value=" Login " id = "button"><br>
							<input type="checkbox" checked="checked">Remember me
						</div>
						<div class="log-container">
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