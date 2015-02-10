
<?php //echo '<pre>';var_dump($_SESSION); echo '<br/>'; ?>
<?php //var_dump($_GET); echo '<br/>'; ?>
<?php //var_dump($this->data); echo '<br/>'; ?>
<?php //var_dump($this->data['fieldPassword']); echo '<br/>'; ?>

<?php //echo '<pre>';?>
<?php //var_dump($this->data['userModel']->getAll()); ?>
<?php echo '</pre>';?>


<h1><?php echo Translator::translate('registration-form'); ?></h1>
    <form action="" method="post" id="sign-up-form" enctype="multipart/form-data">
        <div class="block user-login">
            <label for="user-login">
                <?php echo Translator::translate('enter-login-label'); ?><span class="require"> *</span>
            </label>
            <input type="text" name="user[login]" value="<?php echo ($this->data['fieldLogin']) ? $this->data['fieldLogin']['value'] : ''; ?>" id="user-login" placeholder="<?php echo Translator::translate('enter-login-placeholder'); ?>" class="input text">
            <?php if($this->data['fieldLogin']['message']) : ?>
                <span class="error"><?php echo ($this->data['fieldLogin']['message']); ?></span>
            <?php endif; ?>
        </div>
        <div class="block user-password">
            <label for="user-password">
                <?php echo Translator::translate('enter-password-label'); ?><span class="require"> *</span>
            </label>
            <input type="password" name="user[password]" value="<?php echo ($this->data['fieldPassword']) ? $this->data['fieldPassword']['value'] : ''; ?>" id="user-password" placeholder="<?php echo Translator::translate('enter-password-placeholder'); ?>" class="input text">
            <?php if($this->data['fieldPassword']['message']) : ?>
                <span class="error"><?php echo ($this->data['fieldPassword']['message']); ?></span>
            <?php endif; ?>
        </div>
        <div class="block user-password-repeat">
            <label for="user-password-repeat">
                <?php echo Translator::translate('enter-password-repeat-label'); ?><span class="require"> *</span>
            </label>
            <input type="password" name="user[password-repeat]" value="<?php echo ($this->data['fieldPasswordRepeat']) ? $this->data['fieldPasswordRepeat']['value'] : ''; ?>" id="user-password-repeat" placeholder="<?php echo Translator::translate('enter-password-repeat-placeholder'); ?>" class="input text">
            <?php if($this->data['fieldPasswordRepeat']['message']) : ?>
                <span class="error"><?php echo ($this->data['fieldPasswordRepeat']['message']); ?></span>
            <?php endif; ?>
        </div>

        <div class="block user-email">
            <label for="user-email">
                <?php echo Translator::translate('enter-email-label'); ?><span class="require"> *</span>
            </label>
            <input type="text" name="user[email]" value="<?php echo ($this->data['fieldEmail']) ? $this->data['fieldEmail']['value'] : ''; ?>" id="user-email" placeholder="<?php echo Translator::translate('enter-email-placeholder'); ?>" class="input text">
            <?php if($this->data['fieldEmail']['message']) : ?>
                <span class="error"><?php echo ($this->data['fieldEmail']['message']); ?></span>
            <?php endif; ?>
        </div>
        <div class="block user-firstname">
            <label for="user-firstname">
                <?php echo Translator::translate('enter-firstname-label'); ?><span class="require"> *</span>
            </label>
            <input type="text" name="user[firstname]" value="<?php echo ($this->data['fieldFirstname']) ? $this->data['fieldFirstname']['value'] : ''; ?>" id="user-firstname" placeholder="<?php echo Translator::translate('enter-firstname-placeholder'); ?>" class="input text">
            <?php if($this->data['fieldFirstname']['message']) : ?>
                <span class="error"><?php echo ($this->data['fieldFirstname']['message']); ?></span>
            <?php endif; ?>
        </div>
        <div class="block user-lastname">
            <label for="user-lastname">
                <?php echo Translator::translate('enter-lastname-label'); ?><span class="require"> *</span>
            </label>
            <input type="text" name="user[lastname]" value="<?php echo ($this->data['fieldLastname']) ? $this->data['fieldLastname']['value'] : ''; ?>" id="user-lastname" placeholder="<?php echo Translator::translate('enter-lastname-placeholder'); ?>" class="input text">
            <?php if($this->data['fieldLastname']['message']) : ?>
                <span class="error"><?php echo ($this->data['fieldLastname']['message']); ?></span>
            <?php endif; ?>
        </div>
        <div class="block user-avatar">
            <label for="user-avatar">
                <?php echo Translator::translate('enter-avatar-label'); ?><span class="require"> *</span>
            </label>
            <input type="file" name="user-avatar" id="user-avatar" class="input text">
            <?php if($this->data['fieldAvatar']['message']) : ?>
                <span class="error"><?php echo ($this->data['fieldAvatar']['message']); ?></span>
            <?php endif; ?>
        </div>
        <div class="block user-country">
            <label for="user-country">
                <?php echo Translator::translate('enter-country-label'); ?><span class="require"> *</span>
            </label>
            <input type="text" name="user[country]" value="<?php echo ($this->data['fieldCountry']) ? $this->data['fieldCountry']['value'] : ''; ?>" id="user-country" placeholder="<?php echo Translator::translate('enter-country-placeholder'); ?>" class="input text">
            <?php if($this->data['fieldCountry']['message']) : ?>
                <span class="error"><?php echo ($this->data['fieldCountry']['message']); ?></span>
            <?php endif; ?>
        </div>
        <div class="block user-city">
            <label for="user-city">
                <?php echo Translator::translate('enter-city-label'); ?><span class="require"> *</span>
            </label>
            <input type="text" name="user[city]" value="<?php echo ($this->data['fieldCity']) ? $this->data['fieldCity']['value'] : ''; ?>" id="user-city" placeholder="<?php echo Translator::translate('enter-city-placeholder'); ?>" class="input text">
            <?php if($this->data['fieldCity']['message']) : ?>
                <span class="error"><?php echo ($this->data['fieldCity']['message']); ?></span>
            <?php endif; ?>
        </div>
        <input type="submit" class="sign-up-submit" value="<?php echo Translator::translate('sign-up'); ?>">
    </form>