const emailfield = document.getElementById("username");
const emailRegex=/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

const passwordfield = document.getElementById("password");
// const passwordRegex= /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?_"]).{8,}$/;

const loginButton= document.getElementById("login-btn");
const errMsg= document.getElementById("error-message");

const form = document.getElementById('loginForm');
const formData = new FormData(form);


loginButton.addEventListener("click", function(e) {
    e.preventDefault();
    if (emailfield.value===""){
        errMsg.innerHTML = "empty email field";
        emailfield.style.borderColor="red";
    } else if (!emailRegex.test(emailfield.value)){
        errMsg.innerHTML = "invalid email";
        emailfield.style.borderColor="red";
    } else if (passwordfield.value===""){
        errMsg.innerHTML = "empty password field";
        passwordfield.style.borderColor="red";
    // } else if (!passwordRegex.test(passwordfield.value)){
    //     alert("Invalid input format")
    //     passwordfield.style.borderColor="red";
    } else {
        emailfield.style.borderColor= "green";
        passwordfield.style.borderColor="green";

        // fetch api
        fetch('../actions/login_user_action.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // assuming the response is JSON
        .then(data => {
            console.log('Success:', data);
            // Handle the response data as needed
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle errors
        });
    }
})
