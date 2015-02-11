function validateForm()
    {
        var login = document.loginForm.login.value;
        var password = document.loginForm.password.value;
        var errorMessageLogin = translate('error_login');
        var errorMessagePass = translate('error_password');

        if (password.length == 0) {
        document.loginForm.password.focus();
        document.getElementById('password-message').innerHTML = errorMessagePass;
        } else {
    document.loginForm.login.focus();
    document.getElementById('password-message').innerHTML = '';
    }

if (login.length == 0) {
    document.loginForm.login.focus();
    document.getElementById('login-message').innerHTML = errorMessageLogin;
    } else {
    document.loginForm.password.focus();
    document.getElementById('login-message').innerHTML = '';
    }

if (login.length == 0 || password.length == 0) {
    return false;
    } else {
    document.loginForm.submit();
    return true;
    }

}