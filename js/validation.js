var psw1 = getElementById(password1);
var psw = getElementById(password2);
function validate(){
	if(psw1.value != "" && psw1.value == psw2.value) {
	      if(psw1.value.length < 8) {
	        alert("Error: Password must contain at least 8 characters!");
	        psw1.focus();
	        return false;
	      }
	      re = /[0-9]/;
	      if(!re.test(psw1.value)) {
	        alert("Error: password must contain at least one number (0-9)!");
	        psw1.focus();
	        return false;
	      }
	      re = /[a-z]/;
	      if(!re.test(psw1.value)) {
	        alert("Error: password must contain at least one lowercase letter (a-z)!");
	        psw1.focus();
	        return false;
	      }
	    }
	 else {
	      alert("Error: Please check that you've entered and confirmed your password!");
	      psw1.focus();
	      return false;
	    }
	}