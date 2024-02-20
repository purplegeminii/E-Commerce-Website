document.addEventListener('DOMContentLoaded', function () {
    const emailInput = document.getElementById('email');
    const passwordInput1 = document.getElementById('pwd1');
    const passwordInput2 = document.getElementById('pwd2');
    const signUpButton = document.getElementById('sign-up-btn');

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    /*
     * Password regex pattern:
     * At least 8 characters long
     * Contains at least one uppercase letter
     * Contains at least one lowercase letter
     * Contains at least one digit
     * Allows special characters
     */
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

    function validateEmail() {
        const emailValue = emailInput.value.trim();
        signUpButton.disabled = emailValue === '' || !emailRegex.test(emailValue);
    }

    function validatePassword1() {
        const passwordValue1 = passwordInput1.value.trim();
        signUpButton.disabled = passwordValue1 === '' || !passwordRegex.test(passwordValue1);
    }

    function validatePassword2() {
        const passwordValue1 = passwordInput1.value.trim();
        const passwordValue2 = passwordInput2.value.trim();
        signUpButton.disabled = passwordValue1 !== passwordValue2;
    }

    emailInput.addEventListener('input', validateEmail);
    passwordInput1.addEventListener('input', validatePassword1);
    passwordInput2.addEventListener('input', validatePassword2);
});
