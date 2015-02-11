<?php
define('BASIC_PATH', __DIR__);
define('SITE_URL', 'http://'.$_SERVER['SERVER_NAME']);
define('APPLICATION_DIR', 'application');
define('TEMPLATES_DIR', 'Templates');
define('UPLOADS_DIR', 'Uploads');
define('UPLOADS_URL', SITE_URL.'/'.APPLICATION_DIR.'/'.UPLOADS_DIR.'/');
define('JS_DIR', SITE_URL.'/'.APPLICATION_DIR.'/Assets/js');
define('CSS_DIR', SITE_URL.'/'.APPLICATION_DIR.'/Assets/css');
define('SESSION_AUTH_FORM_KEY', 'form-sign-in');
define('SESSION_REG_FORM_KEY', 'form-sign-up');
define('USER_SESSION_ID', 'user-id');
define('USERS_SESSION_TOKEN', 'user-token');