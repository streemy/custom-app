<h1><?php echo Translator::translate('registration-form'); ?></h1>
    <form action="" name="regForm" method="post" id="sign-up-form" enctype="multipart/form-data" onsubmit="return validateRegForm();">
        <div class="block user-login">
            <label for="user-login">
                <?php echo Translator::translate('enter-login-label'); ?><span class="require"> *</span>
            </label>
            <input type="text" name="user[login]" value="<?php echo ($this->data['fieldLogin']) ? $this->data['fieldLogin']['value'] : ''; ?>" id="user-login" placeholder="<?php echo Translator::translate('enter-login-placeholder'); ?>" class="input text">
                <span id="login-message" class="error"><?php echo ($this->data['fieldLogin']['message']); ?></span>
        </div>
        <div class="block user-password">
            <label for="user-password">
                <?php echo Translator::translate('enter-password-label'); ?><span class="require"> *</span>
            </label>
            <input onblur="return isEqualPasswords()" type="password" name="user[password]" value="<?php echo ($this->data['fieldPassword']) ? $this->data['fieldPassword']['value'] : ''; ?>" id="user-password" placeholder="<?php echo Translator::translate('enter-password-placeholder'); ?>" class="input text">
                <span id="password-message" class="error"><?php echo ($this->data['fieldPassword']['message']); ?></span>
        </div>
        <div class="block user-password-repeat">
            <label for="user-password-repeat">
                <?php echo Translator::translate('enter-password-repeat-label'); ?><span class="require"> *</span>
            </label>
            <input onblur="return isEqualPasswords()" type="password" name="user[password-repeat]" value="<?php echo ($this->data['fieldPasswordRepeat']) ? $this->data['fieldPasswordRepeat']['value'] : ''; ?>" id="user-password-repeat" placeholder="<?php echo Translator::translate('enter-password-repeat-placeholder'); ?>" class="input text">
            <span id="password-repeat-message" class="error"><?php echo ($this->data['fieldPasswordRepeat']['message']); ?></span>
        </div>

        <div class="block user-email">
            <label for="user-email">
                <?php echo Translator::translate('enter-email-label'); ?><span class="require"> *</span>
            </label>
            <input onblur="return validateEmail();" type="text" name="user[email]" value="<?php echo ($this->data['fieldEmail']) ? $this->data['fieldEmail']['value'] : ''; ?>" id="user-email" placeholder="<?php echo Translator::translate('enter-email-placeholder'); ?>" class="input text">
                <span id="email-message" class="error"><?php echo ($this->data['fieldEmail']['message']); ?></span>
        </div>
        <div class="block user-firstname">
            <label for="user-firstname">
                <?php echo Translator::translate('enter-firstname-label'); ?><span class="require"> *</span>
            </label>
            <input type="text" name="user[firstname]" value="<?php echo ($this->data['fieldFirstname']) ? $this->data['fieldFirstname']['value'] : ''; ?>" id="user-firstname" placeholder="<?php echo Translator::translate('enter-firstname-placeholder'); ?>" class="input text">
                <span id="firstname-message" class="error"><?php echo ($this->data['fieldFirstname']['message']); ?></span>
        </div>
        <div class="block user-lastname">
            <label for="user-lastname">
                <?php echo Translator::translate('enter-lastname-label'); ?><span class="require"> *</span>
            </label>
            <input type="text" name="user[lastname]" value="<?php echo ($this->data['fieldLastname']) ? $this->data['fieldLastname']['value'] : ''; ?>" id="user-lastname" placeholder="<?php echo Translator::translate('enter-lastname-placeholder'); ?>" class="input text">
                <span id="lastname-message" class="error"><?php echo ($this->data['fieldLastname']['message']); ?></span>
        </div>
        <div class="block user-avatar">
            <label for="user-avatar">
                <?php echo Translator::translate('enter-avatar-label'); ?><span class="require"> *</span>
            </label>
            <input onblur="return validateAvatar();" type="file" name="user-avatar" id="user-avatar" class="input text">
                <span id="avatar-message" class="error"><?php echo ($this->data['fieldAvatar']['message']); ?></span>
        </div>
        <div class="block user-country">
            <label for="user-country">
                <?php echo Translator::translate('enter-country-label'); ?><span class="require"> *</span>
            </label>
            <input type="text" name="user[country]" value="<?php echo ($this->data['fieldCountry']) ? $this->data['fieldCountry']['value'] : ''; ?>" id="user-country" placeholder="<?php echo Translator::translate('enter-country-placeholder'); ?>" class="input text">
                <span id="country-message" class="error"><?php echo ($this->data['fieldCountry']['message']); ?></span>
        </div>
        <div class="block user-city">
            <label for="user-city">
                <?php echo Translator::translate('enter-city-label'); ?><span class="require"> *</span>
            </label>
            <input type="text" name="user[city]" value="<?php echo ($this->data['fieldCity']) ? $this->data['fieldCity']['value'] : ''; ?>" id="user-city" placeholder="<?php echo Translator::translate('enter-city-placeholder'); ?>" class="input text">
                <span id="city-message" class="error"><?php echo ($this->data['fieldCity']['message']); ?></span>
        </div>
        <input type="submit" class="sign-up-submit" value="<?php echo Translator::translate('sign-up'); ?>">
    </form>