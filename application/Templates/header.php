<!DOCTYPE html>
<html>
<head>
    <title><?php echo $this->data['title']; ?></title>
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <?php echo $this->assetsFiles; ?>
</head>
<body class="<?php echo Translator::getLocale(); ?>">
<div id="wrapper">
    <div class="header">
        <a class="home-link link" href="<?php echo $this->homeUrl(); ?>"><?php echo Translator::translate('home');?></a>

        <?php if($this->data['model']->isUserLogin()) : ?>
            <a class="profile-link link" href="/user/profile/"><?php echo Translator::translate('profile-page');?></a>
            <a class="logout-link link" href="/user/logout/"><?php echo Translator::translate('logout');?></a>
        <?php endif; ?>
        <div class="languages-checker">
            <ul class="languages">
                <li>
                    <a href="<?php echo Translator::languageSwitcher('ru'); ?>" class="lang<?php echo (Translator::getLocale() == 'ru') ? ' active' : '';?>">RUS</a>
                </li>
                <li>
                    <a href="<?php echo Translator::languageSwitcher('en'); ?>" class="lang<?php echo (Translator::getLocale() == 'en') ? ' active' : '';?>">ENG</a>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="content">
        <div class="content-header"></div>