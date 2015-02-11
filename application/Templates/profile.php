<h1><?php echo Translator::translate('profile-page'); ?></h1>
<div class="avatar">
    <img src="<?php echo $this->data['model']->getUploadURL(); ?><?php echo ($this->data['avatar']) ? $this->data['avatar'] : 'default.jpg'; ?>">
</div>
<form action="" method="get" id="sign-up-form" enctype="multipart/form-data">
    <div class="block user-login">
        <label for="user-login">
            <?php echo Translator::translate('enter-login-label'); ?>
        </label>
        <input type="text" name="login" value="<?php echo ($this->data['login']) ? $this->data['login'] : ''; ?>" id="user-login" readonly class="input text">
    </div>
    <div class="block user-email">
        <label for="user-email">
            <?php echo Translator::translate('enter-email-label'); ?>
        </label>
        <input type="text" name="email" value="<?php echo ($this->data['email']) ? $this->data['email'] : ''; ?>" id="user-email" readonly class="input text">
    </div>
    <div class="block user-firstname">
        <label for="user-firstname">
            <?php echo Translator::translate('enter-firstname-label'); ?>
        </label>
        <input type="text" name="firstname" value="<?php echo ($this->data['firstname']) ? $this->data['firstname'] : ''; ?>" id="user-firstname" readonly class="input text">
    </div>
    <div class="block user-lastname">
        <label for="user-lastname">
            <?php echo Translator::translate('enter-lastname-label'); ?>
        </label>
        <input type="text" name="lastname" value="<?php echo ($this->data['lastname']) ? $this->data['lastname'] : ''; ?>" id="user-lastname" readonly class="input text">
    </div>
    <div class="block user-country">
        <label for="user-country">
            <?php echo Translator::translate('enter-country-label'); ?>
        </label>
        <input type="text" name="country" value="<?php echo ($this->data['country']) ? $this->data['country'] : ''; ?>" id="user-country" readonly class="input text">
    </div>
    <div class="block user-city">
        <label for="user-city">
            <?php echo Translator::translate('enter-city-label'); ?>
        </label>
        <input type="text" name="city" value="<?php echo ($this->data['city']) ? $this->data['city'] : ''; ?>" id="user-city" readonly class="input text">
    </div>
</form>