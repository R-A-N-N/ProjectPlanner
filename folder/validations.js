function validateform(){
    var illegalChars = /^((?=.*[\W])(?=.*[!@#$%^&*]))$/; 
    var error = ""; 
	var name = document.forms["register"]["full_name"].value;
	var uname = document.forms["register"]["username"].value;
	var password = document.forms["register"]["password"].value;

	name = name.trim();
	if (name.length < 3) {
		alert("Name must contain more than 3 characters");
		return false;
	}

	uname = uname.trim();
	if (uname.length < 3) {
		alert("Username must contain more than 3 characters");
		return false;
	}

	password = password.trim();
	if (password.trim < 6) {
		alert("Password must contain more than 6 characters");
		return false;
	}

	if ((password.search(/[a-z]+/)==-1) || (password.search(/[0-9]+/)==-1) || (password.search(/[A-Z]+/)==-1)) {
		alert("Password must contain atleast one numeral, one Capital and one small letter.");
		return false;
	}

	if (illegalChars.test(password)) {
		alert("Password contains illegal Characters");
		return false;
	}	
}