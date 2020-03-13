<?php if (!empty($content)) : ?>
    <div class="wysiwyg<?php if (!empty($class)) : echo ' '.$class; endif; ?>">
        <div class="wysiwyg__container">
            <div class="wysiwyg__content">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
