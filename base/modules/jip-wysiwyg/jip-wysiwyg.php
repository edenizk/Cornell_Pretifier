<?php if ( !empty($content) || !empty($title) ) : ?>
    <div class="jip-wysiwyg<?php if (!empty($class)) : echo ' '.$class; endif; ?>">
        <div class="<?php echo (!empty($width_extended)) ? 'jip-container ' : 'container '; ?> jip-wysiwyg__container">
            <div class="jip-wysiwyg__inner">
                <h2 class="secondary-title jip-wysiwyg__title"><?php echo $title; ?></h2>
                <div class="wysiwyg jip-wysiwyg__content">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
