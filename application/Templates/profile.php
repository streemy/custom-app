<?php //var_dump($_SESSION); echo '<br/>'; ?>
<?php //var_dump($_GET); echo '<br/>'; ?>
<?php //var_dump($this->data['fieldLogin']); echo '<br/>'; ?>
<?php //var_dump($this->data['fieldPassword']); echo '<br/>'; ?>

<?php echo '<pre>';?>
<?php //var_dump($this->data['userModel']->getAll()); ?>
<?php echo '</pre>';?>


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
<!--        --><?php //if($this->data['fieldLogin']['message']) : ?>
<!--            <span class="error">--><?php //echo ($this->data['fieldLogin']['message']); ?><!--</span>-->
<!--        --><?php //endif; ?>
    </div>
<!--    <div class="block user-password">-->
<!--        <label for="user-password">-->
<!--            --><?php //echo Translator::translate('enter-password-label'); ?>
<!--        </label>-->
<!--        <input type="password" name="password" value="--><?php //echo ($this->data['fieldPassword']) ? $this->data['fieldPassword'] : ''; ?><!--" id="user-password" placeholder="--><?php //echo Translator::translate('enter-password-placeholder'); ?><!--" class="input text">-->
<!--        --><?php //if($this->data['fieldPassword']['message']) : ?>
<!--            <span class="error">--><?php //echo ($this->data['fieldPassword']['message']); ?><!--</span>-->
<!--        --><?php //endif; ?>
<!--    </div>-->
<!--    <div class="block user-password-repeat">-->
<!--        <label for="user-password-repeat">-->
<!--            --><?php //echo Translator::translate('enter-password-repeat-label'); ?>
<!--        </label>-->
<!--        <input type="password" name="password-repeat" value="--><?php //echo ($this->data['fieldPasswordRepeat']) ? $this->data['fieldPasswordRepeat'] : ''; ?><!--" id="user-password-repeat" placeholder="--><?php //echo Translator::translate('enter-password-repeat-placeholder'); ?><!--" class="input text">-->
<!--        --><?php //if($this->data['fieldPasswordRepeat']['message']) : ?>
<!--            <span class="error">--><?php //echo ($this->data['fieldPasswordRepeat']['message']); ?><!--</span>-->
<!--        --><?php //endif; ?>
<!--    </div>-->

    <div class="block user-email">
        <label for="user-email">
            <?php echo Translator::translate('enter-email-label'); ?>
        </label>
        <input type="text" name="email" value="<?php echo ($this->data['email']) ? $this->data['email'] : ''; ?>" id="user-email" readonly class="input text">
<!--        --><?php //if($this->data['fieldEmail']['message']) : ?>
<!--            <span class="error">--><?php //echo ($this->data['fieldEmail']['message']); ?><!--</span>-->
<!--        --><?php //endif; ?>
    </div>
    <div class="block user-firstname">
        <label for="user-firstname">
            <?php echo Translator::translate('enter-firstname-label'); ?>
        </label>
        <input type="text" name="firstname" value="<?php echo ($this->data['firstname']) ? $this->data['firstname'] : ''; ?>" id="user-firstname" readonly class="input text">
<!--        --><?php //if($this->data['fieldFirstname']['message']) : ?>
<!--            <span class="error">--><?php //echo ($this->data['fieldFirstname']['message']); ?><!--</span>-->
<!--        --><?php //endif; ?>
    </div>
    <div class="block user-lastname">
        <label for="user-lastname">
            <?php echo Translator::translate('enter-lastname-label'); ?>
        </label>
        <input type="text" name="lastname" value="<?php echo ($this->data['lastname']) ? $this->data['lastname'] : ''; ?>" id="user-lastname" readonly class="input text">
<!--        --><?php //if($this->data['fieldLastname']['message']) : ?>
<!--            <span class="error">--><?php //echo ($this->data['fieldLastname']['message']); ?><!--</span>-->
<!--        --><?php //endif; ?>
    </div>
<!--    <div class="block user-avatar">-->
<!--        <label for="user-avatar">-->
<!--            --><?php //echo Translator::translate('enter-avatar-label'); ?>
<!--        </label>-->
<!--        <input type="file" name="avatar" value="--><?php //echo ($this->data['fieldAvatar']) ? $this->data['fieldAvatar'] : ''; ?><!--" id="user-avatar" class="input text">-->
<!--        --><?php //if($this->data['fieldAvatar']['message']) : ?>
<!--            <span class="error">--><?php //echo ($this->data['fieldAvatar']['message']); ?><!--</span>-->
<!--        --><?php //endif; ?>
<!--    </div>-->
    <div class="block user-country">
        <label for="user-country">
            <?php echo Translator::translate('enter-country-label'); ?>
        </label>
        <input type="text" name="country" value="<?php echo ($this->data['country']) ? $this->data['country'] : ''; ?>" id="user-country" readonly class="input text">
<!--        --><?php //if($this->data['fieldCountry']['message']) : ?>
<!--            <span class="error">--><?php //echo ($this->data['fieldCountry']['message']); ?><!--</span>-->
<!--        --><?php //endif; ?>
    </div>
    <div class="block user-city">
        <label for="user-city">
            <?php echo Translator::translate('enter-city-label'); ?>
        </label>
        <input type="text" name="city" value="<?php echo ($this->data['city']) ? $this->data['city'] : ''; ?>" id="user-city" readonly class="input text">
<!--        --><?php //if($this->data['fieldCity']['message']) : ?>
<!--            <span class="error">--><?php //echo ($this->data['fieldCity']['message']); ?><!--</span>-->
<!--        --><?php //endif; ?>
    </div>
<!--    <input type="submit" class="sign-up-submit" value="--><?php //echo Translator::translate('sign-up'); ?><!--">-->
</form>
</form>