<?php
include('upload.php');
?>
<head>
<link href = "/foodster2\css\create.css" rel = "stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>	
<body>
	<form method = "post" id = "form1">
			<h1>Upload your own recipe!</h1>
			<div id = steps class = "col-6">
				<label><h2 style = "text-align:center;font-size:30px;">Step(s)</h2></label>
				<label><h2>1.</h2></label>
				<input class = "input" type = "text" placeholder = "Simple description of the process..." name = "steps"><span onclick = "newElement()">&#43</span>
			</div>

			<div class = "inputs col-5">
				<label><h2>Title:</h2></label>
				<input type="text" id = "recipename" class =  "input" name="recipename" required>
			</div>

			<div class = "inputs col-5">
				<label><h2>Ingredients:</h2></label>
				<input type="text" id = "ingredients" class =  "input" name ="ingredients" placeholder = "bacon, eggs..etc" required>
			</div>

			<div class = "inputs col-5">
				<label><h2>Estimated time(hh:mm):</h2></label>
				<input type="text" id = "estimatedtime" class =  "without input" name="et">
			</div>

			<div class = "inputs col-5">
				<label><h2>Difficulty:</h2></label>
				<input type="text" id = "difficulty" class =  "input" name="difficulty" >
			</div>

			<div class = "inputs col-5">
				<label><h2>Culture:</h2></label>
				<select id = "culture" class =  "input" name="culture" required>
				<option value = "none"></option>
				<option value = "africancuisine">African cuisine</option>
				<option value = "africancuisine">European cuisine</option>
				<option value = "africancuisine">North american cuisine</option>
				<option value = "africancuisine">Oceanian cuisine</option>
				<option value = "africancuisine">Oriental cuisine</option>
				</select>
			</div>

			<div class = "inputs col-5">
				<label><h2>Diet type:</h2></label>
				<select id = "diettype" class =  "input col-5" name="dt">
				<option value = "none"></option>
				<option value = "balanceddiet">Balanced diet</option>
				<option value = "vegetarian">Vegetarian</option>
				<option value = "vegan">Vegan</option>
				</select>
			</div>
		<div class = col-12>
			<button name = upload type = submit class = "col-10" id = "button" >Upload!</button>
		</div>
		<h4><a href = "javascript:history.back()">Back</a></h4>
	</form>
<script>
	var i = 1;
	var n = 1;
	function newElement() {
		i++;
		n++
		var text = document.createElement("input");
		var h2= document.createElement("h2");
		var span = document.createElement("span");
		document.getElementById("steps").appendChild(h2);
		document.getElementById("steps").appendChild(text);
		document.getElementById('steps').appendChild(span);
		text.placeholder = "Simple description of the process...";
		text.className = "col-6";
		text.className = "input";
		text.name = "step" + n;
		h2.innerHTML = i + ".";
		h2.className = "numbers";
		span.innerHTML = "\u00D7";
		span.className = "delete";
		text.maxlength = "50";

	}
	var deletebtn = document.getElementByClassName('delete');
	deletebtn.onclick = function(){
		 document.getElementById('input').remove();
		this.remove;
	}
</script>
</body>