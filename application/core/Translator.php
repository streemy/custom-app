<?php

/**
 * Class Translator
 */
class Translator {

    /**
     * include translation file for needed locale
     *
     * @return array - array of translations
     */
    public static function getTranslations() {

        $translationFIleName = $_SESSION['lang'].'.php';
        $translationFIlePath = 'application/Assets/locale/'. $translationFIleName;
        if(file_exists($translationFIlePath))
        {
            include $translationFIlePath;

        } else {
            $translationFIlePath = 'application/Assets/locale/ru.php';
            if(file_exists($translationFIlePath))
            {
             include $translationFIlePath;
            }
        }

        return $translations;
    }

    /**
     * get language from session
     *
     * @return string
     */
    public static function getLocale()
    {
        return $_SESSION['lang'];
    }

    /**
     * Translate strings,
     *
     *
     * @param $string
     *
     * @return string
     */
    public static function translate($string)
    {
        $translations = self::getTranslations();
        if(array_key_exists($string, $translations)) {
            $translation = $translations[$string];
        } else {
            $translation = $string;
        }

        return $translation;
    }


    /**
     * Generate url with lang parameter,
     *
     * @param $locale
     *
     * @return string - like http://example.com/user/login/?lang={$locale}
     */
    public static function languageSwitcher($locale)
    {
        $validLocales = array('ru','en');

        if(!in_array($locale, $validLocales)) {
            $locale = 'ru';
        }

        $uriArr = explode('/', $_SERVER['REQUEST_URI']);

        if($_GET['lang']) {
            $uriArr = array_diff($uriArr, array('?lang='.$_GET['lang']));
        }

        $lastPath = count($uriArr) - 1;
        $uri = implode('/', $uriArr);

        $fullUrl = SITE_URL . $uri;

        if($uriArr[$lastPath] != '') {
            $fullUrl .= '/';
        }

        $params = '?lang='.$locale;

        $fullUrl .= $params;

        return $fullUrl;
    }
}

