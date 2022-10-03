
var lblFullname = document.getElementById("lblname");
var lblUsername = document.getElementById("lbluser");
var lblPassword = document.getElementById("lblpass");
var txtFullname = document.getElementById("full_name");
var txtUsername = document.getElementById("email_address");
var txtPassword = document.getElementById("password");
var btnShow = document.getElementById("show");


lblFullname.addEventListener("click", function(){
	lblFullname.classList.add("small");
})

lblUsername.addEventListener("click", function(){
	lblUsername.classList.add("small");
})

lblPassword.addEventListener("click", function(){
	lblPassword.classList.add("small");
})

txtFullname.addEventListener("focus", function(){
	lblFullname.classList.add("small");
})

txtUsername.addEventListener("focus", function(){
	lblUsername.classList.add("small");
})

txtPassword.addEventListener("focus", function(){
	lblPassword.classList.add("small");
})

txtFullname.addEventListener("blur", function(){
	if ( txtFullname.value == '' ) {
		lblFullname.classList.remove("small");	
	}	
});


txtUsername.addEventListener("blur", function(){
	if ( txtUsername.value == '' ) {
		lblUsername.classList.remove("small");	
	}	
});

txtPassword.addEventListener("blur", function(){
	if ( txtPassword.value == '' ) {
		lblPassword.classList.remove("small");	
	}	
});

btnShow.addEventListener("click", function(){
	if ( txtPassword.getAttribute("type") == "password" ) {
		txtPassword.setAttribute("type", "text");
		btnShow.innerText = "Hide";
	} else {
		txtPassword.setAttribute("type", "password");
		btnShow.innerText = "Show";
	}
});