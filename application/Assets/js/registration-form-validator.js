function validateRegForm()
    {
        var login = document.regForm.elements['user[login]'].value;
        var password = document.regForm.elements['user[password]'].value;

        var password_repeat = document.regForm.elements['user[password-repeat]'].value;
        var email = document.regForm.elements['user[email]'].value;
        var firstname = document.regForm.elements['user[firstname]'].value;
        var lastname = document.regForm.elements['user[lastname]'].value;
        var country = document.regForm.elements['user[country]'].value;
        var city = document.regForm.elements['user[city]'].value;

        var error_login = translate('error-login');
        var error_pass = translate('error-pass');
        var error_pass_repeat = translate('error-pass-repeat');
        var error_firstname = translate('error-firstname');
        var error_lastname = translate('error-lastname');
        var error_country = translate('error-country');
        var error_city = translate('error-city');


        if (login.length == 0) {
            document.getElementById('login-message').innerHTML = error_login;
        } else {
            document.getElementById('login-message').innerHTML = '';
        }

        if (password.length == 0) {
            document.getElementById('password-message').innerHTML = error_pass;
        } else {
            document.getElementById('password-message').innerHTML = '';
        }

        if (password_repeat.length == 0) {
            document.getElementById('password-repeat-message').innerHTML = error_pass_repeat;
        } else {
            document.getElementById('password-repeat-message').innerHTML = '';
        }

        validateEmail();
        validateAvatar();

        if (firstname.length == 0) {
            document.getElementById('firstname-message').innerHTML = error_firstname;
        } else {
            document.getElementById('firstname-message').innerHTML = '';
        }

        if (lastname.length == 0) {
            document.getElementById('lastname-message').innerHTML = error_lastname;
        } else {
            document.getElementById('lastname-message').innerHTML = '';
        }

        if (country.length == 0) {
            document.getElementById('country-message').innerHTML = error_country;
        } else {
            document.getElementById('country-message').innerHTML = '';
        }
        if (city.length == 0) {
            document.getElementById('city-message').innerHTML = error_city;
        } else {
            document.getElementById('city-message').innerHTML = '';
        }

        if(countErrors() > 0 && countEnteredField() != 0) {
            return false;
        } else {
            document.regForm.submit();
            return true;
        }

}

function countErrors()
{
    var obj = document.getElementsByClassName('error');
    var count = 0;

    var i;
    for (i = 0; i < obj.length; i++) {
       if (obj.item(i).innerHTML != '') {
           count++;
       }
    }

    return count;
}

function validateEmail()
{
    var email = document.regForm.elements['user[email]'].value;
    var error_email = translate('error-email');
    var error_email_pattern = translate('error-email-pattern');
    var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(email.length > 0) {
        if(!pattern.test(email)) {
            document.getElementById('email-message').innerHTML = error_email_pattern;
            return false;
        } else {
            document.getElementById('email-message').innerHTML = '';
            return true;
        }
    } else {
        document.getElementById('email-message').innerHTML = error_email;
        return false;
    }
}

function countEnteredField()
{
    var obj = document.getElementsByClassName('input');
    var count = obj.length;

    var i;
    for (i = 0; i < obj.length; i++) {
        if (obj.item(i).innerHTML != '') {
            count++;
        }
    }

    return count;
}

function validateAvatar()
{
    var fileInput = document.regForm['user-avatar'];
    var file;
    var fileName;
    var fileValue = fileInput.value;
    var fileSize;
    var fileType;

    var validTypes = ['image/jpg', 'image/png', 'image/gif', 'image/jpeg']
    var validFileSize = 2000000;

    var message = '';
    if(fileValue.length > 0) {
        file = fileInput.files[0];
        fileSize = file.size;
        fileName = file.name;
        fileType = file.type;

        if(fileSize > validFileSize) {
            message = translate('error-avatar-size');
        }

        if(!in_array(fileType, validTypes)) {
            message = translate('error-avatar-type');
        }

        document.getElementById('avatar-message').innerHTML = message;

        if(document.getElementById('avatar-message').innerHTML != '') {
            return false
        } else {
            return true;
        }


    } else {
        message = translate("error-avatar-required");
        document.getElementById('avatar-message').innerHTML = message;
        return false;
    }
}

function in_array(what, where) {
    for(var i = 0; i < where.length; i++)
        if(what == where[i])
            return true;
    return false;
}

function isEqualPasswords() {
    var password = document.regForm.elements['user[password]'].value;
    var password_repeat = document.regForm.elements['user[password-repeat]'].value;

    var notMatchPasswords = translate('not-match-passwords');

    if(password_repeat != password && password.length != 0) {
        document.getElementById('password-repeat-message').innerHTML = notMatchPasswords;
        return false;
    } else {
        document.getElementById('password-repeat-message').innerHTML = '';
        return true;
    }

}