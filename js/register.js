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
        if (!emailRegex.test(emailValue)) {
            emailInput.setCustomValidity('Please enter a valid email address.');
            // signUpButton.disabled = true;
        } else {
            emailInput.setCustomValidity('');
            // signUpButton.disabled = false;
        }
    }

    function validatePassword1() {
        const passwordValue1 = passwordInput1.value.trim();
        if (!passwordRegex.test(passwordValue1)) {
            passwordInput1.setCustomValidity('Password must\n  ' +
                '      Have at least 8 characters long\n' +
                '      Contain at least one uppercase letter\n' +
                '      Contain at least one lowercase letter\n' +
                '      Contain at least one digit\n' );
            // signUpButton.disabled = true;
        } else {
            passwordInput1.setCustomValidity('');
            // signUpButton.disabled = false;
        }
    }

    function validatePassword2() {
        const passwordValue1 = passwordInput1.value.trim();
        const passwordValue2 = passwordInput2.value.trim();
        if (passwordValue1 !== passwordValue2) {
            passwordInput2.setCustomValidity('Passwords do not match.');
            // signUpButton.disabled = true;
        } else {
            passwordInput2.setCustomValidity('');
            // signUpButton.disabled = false;
        }
    }

    emailInput.addEventListener('input', validateEmail);
    passwordInput1.addEventListener('input', validatePassword1);
    passwordInput2.addEventListener('input', validatePassword2);
});
