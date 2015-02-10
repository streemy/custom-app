<?php
include_once 'config.php';
include_once 'core/InitApplication.php';
error_reporting(E_ALL);
$core = array(
    'DB',
    'Controller',
    'Translator',
    'Model',
    'View',
    'Route',
);
session_start();
if(isset($_GET['lang']) && ($_GET['lang'] != $_SESSION['lang'])) {
    unset($_SESSION[SESSION_AUTH_FORM_KEY]);
    unset($_SESSION[SESSION_REG_FORM_KEY]);
}

if(isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if(!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'ru';
}

InitApplication::includeCore($core);

Route::start();

