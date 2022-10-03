function validateEmail(email) {
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
  {
    alert('Thank you for your feedback!')
    return (true)

  }
    alert("You have entered an invalid email address!")
    return (false)
}

var userEmail = document.getElementById("email");

function validateForm() {
	var isValidEmail = validateEmail(userEmail.value);
	return isValidEmail;
}