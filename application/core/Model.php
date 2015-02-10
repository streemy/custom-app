<?php

class Model
{
    protected $db;

    protected $assetsFiles = array();

    protected $title;

    protected $data;

    public function __construct()
    {
        $this->db = DB::getInstance();

        $assetsFiles = array(
            'css' => array(
//                'enter names of css files, that you want include in some page',
            ),
            'js' => array(
//                'enter names of js files, that you want include in some page',
            ),
        );

        $this->assetsFiles = $this->registerAssets($assetsFiles);

        $this->setTitle(Translator::translate('title'));
    }

    /**
     * Include js and css files to your project
     *
     *
     * @param array $assets - array with names of css and js files
     *
     * @return string - html string of scripts (js) and links (css)
     */
    public function registerAssets($assets = array())
    {
        $default = array(
            'css' => array(
                'style',
            ),
            'js' => array(
                'jquery-1.6.2',
            ),
        );

        if(empty($assets)) {

            $assets = $default;
        } else {
            $assets['css'] = array_merge($assets['css'], $default['css']);
            $assets['js'] = array_merge($assets['js'], $default['js']);
            $assets['css'] = array_unique($assets['css']);
            $assets['js'] = array_unique($assets['js']);

        }

        $assetsHtmlString = '';

        if(array_key_exists('css', $assets) && count($assets['css']) > 0) {
            foreach($assets['css'] as $name) {
                $assetsHtmlString .= '<link rel="stylesheet" href="'.CSS_DIR.'/'.$name.'.css" type="text/css">';
            }
        }

        if(array_key_exists('js', $assets) && count($assets['js']) > 0) {
            foreach($assets['js'] as $name) {
                $assetsHtmlString .= '<script type="text/javascript" src="'.JS_DIR.'/'.$name.'.js"></script>';
            }
        }

        return $assetsHtmlString;
    }

    public function setData($data) {

        $this->data = array(
            'title'         => $this->getTitle(),
            'assetsFiles'   => $this->assetsFiles,
            'model'          => $this,
        );

        $this->data = array_merge($this->data, $data);
    }

    public function getData()
    {
        return $this->data;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDB() {
        return $this->db;
    }

    /**
     * Checking, is user login?
     *
     * @return bool
     */
    public function isUserLogin()
    {
        if(array_key_exists(USERS_SESSION_TOKEN, $_SESSION) && array_key_exists(USER_SESSION_ID, $_SESSION[USERS_SESSION_TOKEN])) {

            return true;

        } else {

            return false;
        }
    }

    public function getUploadURL() {

        return UPLOADS_URL;
    }

    public function getUserIdFromSession() {

        if($this->isUserLogin()) {

            return $_SESSION[USERS_SESSION_TOKEN][USER_SESSION_ID];

        } else {

            return false;
        }
    }

    public function isExists($login)
    {
        $user = $this->getUserByLogin($login);

        if(is_null($user))
        {
            return false;
        }

        return $user;
    }

    public function getUserByLogin($login)
    {
        $login = array('login' => $login);
        $STH = $this->db->prepare('SELECT * FROM users WHERE login = :login');
        $STH->execute($login);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $user = $STH->fetch();

        return $user;
    }

    public function getUserIdByLogin($login)
    {
        $userData = $this->getUserByLogin($login);

        $userId = $userData['id'];

        return $userId;
    }

    public function getUserById($id)
    {
        $id = array('id' => $id);
        $STH = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $STH->execute($id);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $user = $STH->fetch();

        return $user;
    }

    public function getUserNameById($id)
    {
        $user = $this->getUserById($id);

        return $user['firstname'];
    }

    public function getUserNameFromSession()
    {
        $userId = $this->getUserIdFromSession();

        return $this->getUserNameById($userId);
    }


}

