<?php //var_dump($_SESSION); echo '<br/>'; ?>
<?php //var_dump($_GET); echo '<br/>'; ?>
<?php //var_dump($this->data['fieldLogin']); echo '<br/>'; ?>
<?php //var_dump($this->data['fieldPassword']); echo '<br/>'; ?>

<?php echo '<pre>';?>
<?php //var_dump($this->data['userModel']->isExists('admin1')); ?>
<?php echo '</pre>';?>


<h1><?php echo Translator::translate('login-form'); ?></h1>
    <form action="" method="get" id="sign-in-form" enctype="text/plain">
        <div class="block user-login">
            <label for="user-login">
                <?php echo Translator::translate('enter-login-label'); ?>
            </label>
            <input type="text" name="login" value="<?php echo ($this->data['fieldLogin']) ? $this->data['fieldLogin']['value'] : ''; ?>" id="user-login" placeholder="<?php echo Translator::translate('enter-login-error'); ?>" class="input text">
            <div class="clear"></div>
            <?php if($this->data['fieldLogin']['message']) : ?>
                <span class="error"><?php echo ($this->data['fieldLogin']['message']); ?></span>
            <?php endif; ?>

        </div>
        <div class="block user-password">
            <label for="user-password">
                <?php echo Translator::translate('enter-password-label'); ?>
            </label>
            <input type="password" name="password" value="<?php echo ($this->data['fieldPassword']) ? $this->data['fieldPassword']['value'] : ''; ?>" id="user-password" placeholder="<?php echo Translator::translate('enter-password-error'); ?>" class="input text">
            <div class="clear"></div>
            <?php if($this->data['fieldPassword']['message']) : ?>
                <span class="error"><?php echo ($this->data['fieldPassword']['message']); ?></span>
            <?php endif; ?>
        </div>
        <input type="submit" class="sign-in-submit" value="<?php echo Translator::translate('sign-in'); ?>">
    </form>