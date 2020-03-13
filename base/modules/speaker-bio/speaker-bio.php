<?php if (!empty($content)) : ?>
    <section class="speaker-bio">
        <div class="speaker-bio__inner">
            <h2 class="sub-title speaker-bio__title"><?php echo __('Speaker Bio', 'cornell-tech'); ?></h2>
            <div class="speaker-bio__content">
                <?php
                    the_module('wysiwyg', array(
                        'class' => 'wysiwyg--speaker-bio',
                        'content' => $content
                    ));
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>
