function translate(stringKey) {
    var translations = getTranslationsByLocale();

    if (array_key_exists(stringKey, translations)) {
        return translations[stringKey];
    } else {
        return stringKey;
    }
}

function array_key_exists(key, search) {

    if (!search || (search.constructor !== Array && search.constructor !== Object)) {
        return false;
    }

    return key in search;
}

function getLocale() {
    return document.body.className;
}

function getTranslationsByLocale() {
    var translationsRu = [];
    var translationsEn = [];
    var result = [];

    translationsEn['error_login'] = 'Enter your login';
    translationsEn['error_password'] = 'Enter your password';
    translationsRu['not-match-passwords'] = 'Passwords do not match';

    translationsEn['error-login']       = 'Field "Nickname (login)" is required';
    translationsEn['error-pass']        = 'Field "Password" is required';
    translationsEn['error-pass-repeat'] = 'Field "Repeat Password" is required';
    translationsEn['error-email']       = 'Field "E-mail" is required';
    translationsEn['error-firstname']   = 'Field "First Name" is required';
    translationsEn['error-lastname']    = 'Field "Last Name" is required';
    translationsEn['error-country']     = 'Field "Country" is required';
    translationsEn['error-city']        = 'Field "City" is required';
    translationsEn['error-avatar-required'] = 'Photo (avatar) is required. Upload an image with the extension jpg, png or gif. And size up to 2MB';
    translationsEn['error-avatar-size'] = 'Error. Photo (avatar) bigger than 2MB. Upload an image with the extension jpg, png or gif. And size up to 2MB';
    translationsEn['error-avatar-type'] = 'Error. Incorrect extension photo (avatar). Upload an image with the extension jpg, png or gif. And size up to 2MB';
    translationsEn['error-email-pattern'] = 'Email is invalid. Please, enter valid Email';

    translationsRu['error_login'] = 'Введите ваш логин';
    translationsRu['error_password'] = 'Введите ваш пароль';
    translationsRu['not-match-passwords'] = 'Пароли не совпадают';

    translationsRu['error-login'] = 'Поле "Ник (логин)" обязательно для заполнения';
    translationsRu['error-pass'] = 'Поле "Пароль" обязательно для заполнения';
    translationsRu['error-pass-repeat'] = 'Поле "Повторить пароль" обязательно для заполнения';
    translationsRu['error-email'] = 'Поле "E-mail" обязательно для заполнения';
    translationsRu['error-firstname'] = 'Поле "Имя" обязательно для заполнения';
    translationsRu['error-lastname'] = 'Поле "Фамилия" обязательно для заполнения';
    translationsRu['error-country'] = 'Поле "Страна" обязательно для заполнения';
    translationsRu['error-city'] = 'Поле "Город" обязательно для заполнения';
    translationsRu['error-avatar-required'] = 'Фото (аватар) обязательно для заполнения. Загрузите изображение с расширением jpg, png или gif. И размером до 2Мб';
    translationsRu['error-avatar-size'] = 'Ошибка. Фото (аватар) больше чем 2Мб. Загрузите изображение с расширением jpg, png или gif. И размером до 2Мб';
    translationsRu['error-avatar-type'] = 'Ошибка. Неверное расширение фото (аватара). Загрузите изображение с расширением jpg, png или gif. И размером до 2Мб';
    translationsRu['error-email-pattern'] = 'Email адрес введен не верно';


    if (getLocale() == 'en') {
        result = translationsEn;
    }

    if (getLocale() == 'ru') {
        result = translationsRu;
    }

    return result;
}