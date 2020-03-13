<?php if ( !empty($title) && !empty($image) ) : ?>
    <section class="jip-tag<?php if (!empty($class)) : echo ' '.$class; endif; ?>">
        <div class="container">
            <div class="jip-tag__inner">
                <div class="jip-tag__background">
                    <?php
                        if (!empty($image)) {
                            the_module('image', array(
                                'class' => 'jip-tag__background-image',
                                'id' => $image['ID'],
                                'size' => 'full',
                                'cover' => true
                            ));
                        }
                    ?>
                </div>
                <div class="jip-tag__content">
                    <h4 class="jip-h4 jip-tag__title"><?php echo $title; ?></h4>
                    <?php if (!empty($cta_text) && !empty($cta_url)) : ?>
                        <div class="jip-tag__footer">
                            <?php
                                the_module('jip-button', array(
                                    'class' => 'jip-tag__button',
                                    'text' => $cta_text,
                                    'link' => $cta_url
                                ));
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
