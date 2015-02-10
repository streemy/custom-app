<?php if ($this->data['model']->isUserLogin()) : ?>
    <div class="welcome"><?php echo sprintf(Translator::translate('welcome-text'), $this->data['model']->getUserNameFromSession()); ?></div>
<?php else : ?>
    <div class="welcome"><?php echo sprintf(Translator::translate('welcome-text-guest'), Translator::translate('guest')); ?></div>
    <div class="home-buttons">
        <div class="sign-in">
            <a href="/user/login/">
                <div class="button">
                    <h2 class="text">
                        <?php echo Translator::translate('sign-in'); ?>
                    </h2>
                </div>
            </a>
        </div>
        <div class="sign-up">
            <a href="/user/registration/">
                <div class="button">
                    <h2 class="text">
                        <?php echo Translator::translate('sign-up'); ?>
                    </h2>
                </div>
            </a>
        </div>
    </div>
<?php endif; ?>