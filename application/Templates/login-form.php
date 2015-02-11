<h1><?php echo Translator::translate('login-form'); ?></h1>
    <form name="loginForm" action="" method="post" id="loginForm" onsubmit="return validateForm();" >
        <div class="block user-login">
            <label for="user-login">
                <?php echo Translator::translate('enter-login-label'); ?>
            </label>
            <input type="text" name="login" value="<?php echo ($this->data['fieldLogin']) ? $this->data['fieldLogin']['value'] : ''; ?>" id="user-login" placeholder="<?php echo Translator::translate('enter-login-error'); ?>" class="input text">
            <div class="clear"></div>
            <span id="login-message" class="error"><?php echo ($this->data['fieldLogin']['message']); ?></span>
        </div>
        <div class="block user-password">
            <label for="user-password">
                <?php echo Translator::translate('enter-password-label'); ?>
            </label>
            <input type="password" name="password" value="<?php echo ($this->data['fieldPassword']) ? $this->data['fieldPassword']['value'] : ''; ?>" id="user-password" placeholder="<?php echo Translator::translate('enter-password-error'); ?>" class="input text">
            <div class="clear"></div>
             <span id="password-message" class="error"><?php echo ($this->data['fieldPassword']['message']); ?></span>
        </div>
        <input type="submit" class="sign-in-submit" name="submit" value="<?php echo Translator::translate('sign-in'); ?>">
    </form>