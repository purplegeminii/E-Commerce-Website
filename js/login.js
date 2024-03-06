const emailfield = document.getElementById("username");
const emailRegex=/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

const passwordfield = document.getElementById("password");
// const passwordRegex= /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?_"]).{8,}$/;

const loginButton= document.getElementById("login-btn");
const errMsg= document.getElementById("error-message");

const form = document.getElementById('loginForm');
const formData = new FormData(form);

function validateEmail(){
    if (emailfield.value===""){
        errMsg.innerHTML = "empty email field";
        emailfield.style.borderColor="red";
    } else if (!emailRegex.test(emailfield.value)){
        errMsg.innerHTML = "invalid email";
        emailfield.style.borderColor="red";
    } else {
        emailfield.style.borderColor= "green";
    }
}

function validatePassword(){
    if (passwordfield.value===""){
        errMsg.innerHTML = "empty password field";
        passwordfield.style.borderColor="red";
    } else {
        passwordfield.style.borderColor= "green";
    }
}

emailfield.addEventListener('keypress', validateEmail);
passwordfield.addEventListener('keyup', validatePassword);

loginButton.addEventListener("click", function(e) {
    e.preventDefault();
    form.submit();
})
