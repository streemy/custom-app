<?php if (count($this->data['films']) == 0) : ?>
    <div class="welcome"><?php echo Translator::translate('filmov NET'); ?></div>
<?php else : ?>
    <?php $films = $this->data['films']; ?>
    <div class="welcome"><?php echo Translator::translate('Perechen\' filmov'); ?></div>
    <ul class="films">
        <?php foreach($films as $film) : ?>
            <li class="film-item"><?php echo $film['name']; ?></li>
        <?php endforeach; ?>
    </ul>
<!--    --><?php //echo '----------<br />'; var_dump($this->data['model']->getFilmsByName('а')); ?>
    <form name="" action="" method="post" id="" >
        <div class="block search">
            <label for="search">
                <?php echo Translator::translate('Poisk:'); ?>
            </label>
            <input type="text" name="search" value="" id="search" class="input text" onkeyup="return getFilms();">
        </div>
    </form>
    <div id="test" style="color: red"></div>
    <div id="result"></div>
    <script>
        function getFilms()
        {
            var req = jQuery('#search').val();

            jQuery('#test').html(req);

            var request = jQuery.ajax({
                url: "film/search",
                type: "POST",
                data: { str : req },
                dataType: "html"
            });

            request.done(function( msg ) {
                jQuery( "#result" ).html( msg );
            });

            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        }
    </script>
<?php endif; ?>