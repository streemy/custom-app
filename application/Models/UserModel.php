<?php

class UserModel extends Model
{
    public function authValidate($userName, $userPassword)
    {
        $result = array();

        if (!empty($userName) && !empty($userPassword)) {

            $user = $this->isExists($userName);

            if (!$user) {

                $result['userName'] = array(
                    'value' => $userName,
                    'message' => Translator::translate('user-do-not-exist-error'),
                );

                $result['userPassword'] = array(
                    'value' => $userPassword,
                    'message' => Translator::translate('enter-password-error'),
                );

                return $result;
            }

            if (md5($userPassword) != $user['password']) {

                $result['userName'] = array(
                    'value' => $userName,
                    'message' => false,
                );

                $result['userPassword'] = array(
                    'value' => false,
                    'message' => Translator::translate('enter-valid-password-error'),
                );

                return $result;

            } else {

                return true;
            }

        } else {

            if (empty($userName)) {
                $result['userName'] = array(
                    'value' => false,
                    'message' => Translator::translate('enter-login-error'),
                );
            } else {
                $result['userName'] = array(
                    'value' => $userName,
                    'message' => false,
                );
            }

            if (empty($userPassword)) {
                $result['userPassword'] = array(
                    'value' => false,
                    'message' => Translator::translate('enter-password-error'),
                );
            } else {
                $result['userPassword'] = array(
                    'value' => $userPassword,
                    'message' => false,
                );
            }
        }


        return $result;
    }

    public function imgValidate($img)
    {
        $result = array(
            'value' => false,
            'message' => false,
        );

        if ($img['name'] == '') {
            $result = array(
                'value' => false,
                'message' => Translator::translate('blank-message-avatar'),
            );

        } else {

            $imgValidSize = 2000000;

            if ($img['size'] > $imgValidSize) {
                $result = array(
                    'value' => false,
                    'message' => Translator::translate('size-error-message-avatar'),
                );
            }

            $imgValidTypes = array('image/jpg', 'image/png', 'image/gif', 'image/jpeg');

            if (!in_array($img['type'], $imgValidTypes)) {
                $result = array(
                    'value' => false,
                    'message' => Translator::translate('type-error-message-avatar'),
                );
            }

        }

        return $result;
    }

    public function prepareValue($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    public function regValidate($userData)
    {
        $user = array();
        $result['user'] = array();

        foreach ($userData as $field => $value) {
            if ($field == 'avatar') {
                $result['user']['avatar'] = $this->imgValidate($userData['avatar']);
            } else {
                $user[$field] = $this->prepareValue($value);
            }
        }



        foreach ($user as $field => $value) {

            if (empty($user[$field])) {
                $result['user'][$field] = array(
                    'value' => false,
                    'message' => sprintf(Translator::translate('blank-message'), Translator::translate('enter-' . $field . '-label'))
                );
            } else {
                $result['user'][$field] = array(
                    'value' => $user[$field],
                    'message' => false,
                );
            }

            if ($field == 'email' && !empty($user[$field])) {
                $check = filter_var($user[$field], FILTER_VALIDATE_EMAIL);
                if (!$check) {
                    $result['user'][$field] = array(
                        'value' => $user[$field],
                        'message' => Translator::translate('email-message-error'),
                    );
                }
            }

            if ($field == 'password-repeat' && !empty($user[$field])) {
                if ($user[$field] != $user['password']) {
                    $result['user'][$field] = array(
                        'value' => $user[$field],
                        'message' => Translator::translate('repeat-password-message-error'),
                    );

                    $result['user']['password'] = array(
                        'value' => $user['password'],
                        'message' => false,
                    );
                }
            }

            if ($field == 'login' && $this->isExists($user['login']) != false) {
                $result['user'][$field] = array(
                    'value' => $user[$field],
                    'message' => Translator::translate('exists-message-login'),
                );
            }
        }

        $errorsCount = 0;
        foreach ($result['user'] as $field => $value) {
            if ($result['user'][$field]['message'] !== false) {
                $errorsCount++;
            }
        }

        if ($errorsCount > 0) {
            return $result;
        } else {
            return true;
        }
    }

    protected function saveImage($img)
    {
        $info = pathinfo($img['name']);
        $ext = $info['extension'];
        $name = rand(11111, 99999999) . strlen($img['name']);
        $prefix = 'avatar-';
        $newName = $prefix . $name . '.' . $ext;

        $path = 'application/Uploads/';
        move_uploaded_file($img['tmp_name'], $path . $newName);

        return $newName;
    }

    protected function saveUser($user)
    {
        $user['avatar'] = $this->saveImage($user['avatar']);

        $data = array(
            'login' => $user['login'],
            'password' => md5($user['password']),
            'email' => $user['email'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'avatar' => $user['avatar'],
            'country' => $user['country'],
            'city' => $user['city'],
        );
        $STH = $this->db->prepare("INSERT INTO users (login, password, email, firstname, lastname, avatar, country, city) values (:login, :password, :email, :firstname, :lastname, :avatar, :country, :city)");
        $STH->execute($data);

        return $this->getUserIdByLogin($user['login']);
    }

    public function prepareAndSave($user)
    {
        $user = $this->prepareUser($user);
        $result = $this->saveUser($user);

        return $result;
    }

    protected function prepareUser($userData)
    {
        $user = array();
        foreach ($userData as $field => $value) {
            if ($field == 'avatar') {
                $user[$field] = $userData[$field];
            } else {
                $user[$field] = $this->prepareValue($value);
            }
        }

        return $user;
    }
}
