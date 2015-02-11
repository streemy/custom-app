<?php

class UserController extends Controller
{

    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new UserView();
    }

    public function loginAction()
    {
        if ($this->model->isUserLogin()) {
            header('Location: ' . SITE_URL . '/user/profile/');
        }

        $sessionKey = SESSION_AUTH_FORM_KEY;
        $fieldLogin = false;
        $fieldPassword = false;

        if (array_key_exists('password', $_POST) || array_key_exists('login', $_POST)) {


            $userName = $_POST['login'];
            $userPassword = $_POST['password'];

            $validate = $this->model->authValidate($userName, $userPassword);


            if ($validate !== true) {

                if (array_key_exists('userName', $validate)) {
                    $_SESSION[$sessionKey]['login'] = $validate['userName'];
                }

                if (array_key_exists('userPassword', $validate)) {
                    $_SESSION[$sessionKey]['password'] = $validate['userPassword'];
                }

                header('Location: ' . SITE_URL . '/user/login/');
            } else {

                unset($_SESSION[$sessionKey]);

                $userId = $this->model->getUserIdByLogin($userName);

                $_SESSION[USERS_SESSION_TOKEN][USER_SESSION_ID] = $userId;

                header('Location: ' . SITE_URL . '/user/profile/');
            }
        }

        if (array_key_exists($sessionKey, $_SESSION)) {

            if (array_key_exists('login', $_SESSION[$sessionKey])) {
                $fieldLogin = $_SESSION[$sessionKey]['login'];
            }

            if (array_key_exists('password', $_SESSION[$sessionKey])) {
                $fieldPassword = $_SESSION[$sessionKey]['password'];
            }

        }

        $this->getModel()->setTitle(Translator::translate('auth'));

        $data = array(
            'fieldLogin' => $fieldLogin,
            'fieldPassword' => $fieldPassword,
            'assetsFiles' => array(
                'css' => array(),
                'js' => array(
                    'login-form-validator',
                    'translator',
                ),
            )
        );

        $this->getModel()->setData($data);

        $this->view->render(
            'login-form',
            'basic-template',
            $this->getModel()->getData()
        );
    }

    public function registrationAction()
    {
        if ($this->model->isUserLogin()) {
            header('Location: ' . SITE_URL . '/user/profile/');
        }

        $userData['login'] = false;
        $userData['password'] = false;
        $userData['password-repeat'] = false;
        $userData['email'] = false;
        $userData['firstname'] = false;
        $userData['lastname'] = false;
        $userData['avatar'] = false;
        $userData['country'] = false;
        $userData['city'] = false;

        $sessionKey = SESSION_REG_FORM_KEY;

        if (array_key_exists('user', $_POST)) {

            $userData = $_POST['user'];
            $userData['avatar'] = $_FILES['user-avatar'];

            $result = $this->model->regValidate($userData);

            if ($result !== true) {

                if (array_key_exists('user', $result)) {

                    $_SESSION[$sessionKey]['user'] = $result['user'];
                }

                header('Location: ' . SITE_URL . '/user/registration/');
            } else {
                unset($_SESSION[$sessionKey]);
                $userId = $this->model->prepareAndSave($userData);
                $_SESSION[USERS_SESSION_TOKEN][USER_SESSION_ID] = $userId;

                header('Location: ' . SITE_URL . '/user/profile/');
            }


        }

        if (array_key_exists($sessionKey, $_SESSION)) {

            if (array_key_exists('user', $_SESSION[$sessionKey])) {
                $userData = $_SESSION[$sessionKey]['user'];
            }


        }

        $this->getModel()->setTitle(Translator::translate('registration-form'));

        $data = array(
            'fieldLogin' => $userData['login'],
            'fieldPassword' => $userData['password'],
            'fieldPasswordRepeat' => $userData['password-repeat'],
            'fieldEmail' => $userData['email'],
            'fieldFirstname' => $userData['firstname'],
            'fieldLastname' => $userData['lastname'],
            'fieldAvatar' => $userData['avatar'],
            'fieldCountry' => $userData['country'],
            'fieldCity' => $userData['city'],
            'assetsFiles' => array(
                'css' => array(),
                'js' => array(
                    'registration-form-validator',
                    'translator',
                ),
            )
        );

        $this->getModel()->setData($data);

        $this->view->render(
            'registration-form',
            'basic-template',
            $this->getModel()->getData()
        );
    }

    public function profileAction()
    {
        if (array_key_exists(USERS_SESSION_TOKEN, $_SESSION) && array_key_exists(USER_SESSION_ID, $_SESSION[USERS_SESSION_TOKEN])) {

            $userId = $_SESSION[USERS_SESSION_TOKEN][USER_SESSION_ID];

            $userData = $this->model->getUserById($userId);

            $this->getModel()->setTitle(Translator::translate('profile-page'));

            $data = $userData;

            $this->getModel()->setData($data);

            $this->view->render(
                'profile',
                'basic-template',
                $this->getModel()->getData()
            );

        } else {

            header('Location: ' . SITE_URL . '/404/');
        }

    }

    public function logoutAction()
    {
        if (array_key_exists(USERS_SESSION_TOKEN, $_SESSION) && array_key_exists(USER_SESSION_ID, $_SESSION[USERS_SESSION_TOKEN])) {
            unset($_SESSION[USERS_SESSION_TOKEN][USER_SESSION_ID]);

            header('Location: ' . SITE_URL . '/');
        }
    }
}