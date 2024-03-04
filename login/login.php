<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login page</title>
    <link rel='stylesheet' href='../css/login.css'>
    <style>
        body {
            background-image: url('.../login/food.jpg');
            background-size: cover;
            background-position: center;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .top-banner {
            background-color: #3498db;
            color: black;
            padding: 10px;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            word-spacing: 1px;
            font-weight: bold;
            font-size: larger;
        }
        .login-container {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input {
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        #error-message {
            color: red;
            margin-top: 15px;
        }
        .sign-up {
            text-align: center;
            margin-top: 20px;
        }
        .sign-up a {
            color: #3498db;
            text-decoration: none;
        }
        .sign-up a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="top-banner">
        <p>Eats Elite</p>
    </div>
    <div class="login-container">
        <h2>Login</h2>
        <hr>
        <form id="loginForm" onsubmit="validateForm(); return false;" action="../actions/login_user.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="remember">Remember Password:</label>
            <input type="checkbox" id="remember" name="remember">

            <button type="submit" name="submit" id="button">Login</button>
        </form>
        <p id="error-message"></p>
        <p class="forgot-password"><a href="#" onclick="forgotPassword()">Forgot Password?</a></p>
        <p class="sign-up">Don't have an account? <a href="../login/register.php">Sign up</a></p>
    </div>
    <script>
        window.onload = function () {
            var rememberedUsername = localStorage.getItem('rememberedUsername');
            var rememberedPassword = localStorage.getItem('rememberedPassword');
    
            if (rememberedUsername && rememberedPassword) {
                document.getElementById('username').value = rememberedUsername;
                document.getElementById('password').value = rememberedPassword;
                document.getElementById('remember').checked = true;
            }
        };
        function forgotPassword() {
            var username = prompt('Enter your username to initiate password recovery:');
            if (username) {
                alert('Password recovery initiated for ' + username + '. Check your email for instructions.');
            }
        }
        const emailfield = document.getElementById("username")
        const emailRegex=/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const button= document.getElementById("button")
        const passwordfield = document.getElementById("password")
        const passwordRegex= /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?_"]).{8,}$/;
        button.addEventListener("click", function(e) {
            if (emailfield.value===""){
                e.preventDefault()
                alert("Fill out this field")
                emailfield.style.borderColor="red";
            } else if (!emailRegex.test(emailfield.value)){
                alert("Invalid input format")
                emailfield.style.borderColor="red"; 
            } else if (passwordfield.value===""){
                alert("Fill out this field")
                passwordfield.style.borderColor="red";
            } else if (!passwordRegex.test(passwordfield.value)){
                alert("Invalid input format")
                passwordfield.style.borderColor="red";
            } else {
                emailfield.style.borderColor= "green";
                passwordfield.style.borderColor="green";
            }
        })
    </script>
</body>
</html>
