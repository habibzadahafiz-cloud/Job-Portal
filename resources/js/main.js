const form =  document.getElementById('form');
form.addEventListener("submit", function(e){
    e.preventDefault();
    let email = document.getElementById("email").Value.trim();
    let password = document.getElementById("password").Value.trim();
    let emailError = document.getElementById("emailError");
    let passwordError = document.getElementById("passwrodError");
    let successMessage = document.getElementById("successMessage");
    emailError.textContent = "";
    passwordError.textContent = "";
    successMessage.textContent = "";
    let isValid=true;
    if(email==="" ){
        emailError.textContent = "Email is Required";
        isValid= false;}
        if(password === ""){
            passwordError.textContent = "Password is Required";
            isValid = false;
        }
        if(isValid){
            successMessage.textContent = "Login Succeeful!";
        }

})
