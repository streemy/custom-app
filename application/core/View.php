<?php

class View {

    protected $data;

    public function render($contentView, $templateView, $data = array())
    {
        $this->data = $data;

        include 'application/'.TEMPLATES_DIR.'/'.$templateView.'.php';
    }

    public function getHeader()
    {
        include_once BASIC_PATH.'/'.TEMPLATES_DIR.'/header.php';
    }

    public function getFooter()
    {
        include_once BASIC_PATH.'/'.TEMPLATES_DIR.'/footer.php';
    }

    public function getContent($templateName)
    {
        include_once BASIC_PATH.'/'.TEMPLATES_DIR.'/'.$templateName.'.php';
    }

    public function homeUrl() {
        return SITE_URL;
    }

//    public function isUserLogin()
//    {
//        if(array_key_exists(USERS_SESSION_TOKEN, $_SESSION) && array_key_exists(USER_SESSION_ID, $_SESSION[USERS_SESSION_TOKEN])) {
//
//            return true;
//
//        } else {
//
//            return false;
//        }
//    }





}

