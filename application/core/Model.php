<?php

class Model
{
    protected $db;

    protected $title;

    protected $data;

    public function __construct()
    {
        $this->db = DB::getInstance();

        $this->setTitle(Translator::translate('title'));
    }

    public function setData($data) {

        $this->data = array(
            'title'         => $this->getTitle(),
            'model'          => $this,
        );

        if(is_array($data)) {
            $this->data = array_merge($this->data, $data);
        }

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

    /**
     * Return url reference for folder of uploads
     *
     * @return string
     */
    public function getUploadURL() {

        return UPLOADS_URL;
    }

    /**
     * Get user id from session
     *
     * @return false  - if user did not authenticated
     * @return int - return user id, if user authenticated
     */
    public function getUserIdFromSession() {

        if($this->isUserLogin()) {

            return (int) $_SESSION[USERS_SESSION_TOKEN][USER_SESSION_ID];

        } else {

            return false;
        }
    }

    /**
     * Check is exist $login in table of users
     *
     * @param $login
     *
     * @return bool|mixed
     */
    public function isExists($login)
    {
        $user = $this->getUserByLogin($login);

        if(is_null($user))
        {
            return false;
        }

        return $user;
    }

    /**
     * Get user (array) by login from users table
     *
     * @param $login
     *
     * @return mixed
     */
    public function getUserByLogin($login)
    {
        $login = array('login' => $login);
        $STH = $this->db->prepare('SELECT * FROM users WHERE login = :login');
        $STH->execute($login);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $user = $STH->fetch();

        return $user;
    }

    /**
     * Get user id by login from users table
     *
     * @param $login
     *
     * @return int
     */
    public function getUserIdByLogin($login)
    {
        $userData = $this->getUserByLogin($login);

        $userId = $userData['id'];

        return (int) $userId;
    }

    /**
     * Get user (array) by user_id from users table
     *
     * @param $id
     *
     * @return array
     */
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

    /**
     * get user name from DB by user id in session
     *
     * @return string
     */
    public function getUserNameFromSession()
    {
        $userId = $this->getUserIdFromSession();

        return $this->getUserNameById($userId);
    }


}

