<?php if ( !empty($title) && !empty($content) ) : ?>
    <section class="jip-about">
        <div class="jip-about__wrap">
            <div class="jip-container">
                <div class="jip-about__inner">
                    <?php if ( !empty($title) ) : ?>
                        <h2 class="jip-title-text text-stroke jip-about__title"><?php echo $title; ?></h2>
                    <?php endif; ?>
                    <div class="jip-about__content">
                        <?php if ( !empty($content) ) : ?>
                            <div class="wysiwyg jip-about__content-text">
                                <?php echo $content; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($image_desktop) ) : ?>
                            <div class="jip-about__image jip-about__image--desktop">
                                <?php
                                    the_module('image', array(
                                        'class' => 'jip-about__image-item',
                                        'cover' => true,
                                        'size' => 'full',
                                        'id' => $image_desktop
                                    ));
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( !empty($image_mobile) || !empty($image_desktop) ) : ?>
                            <div class="jip-about__image jip-about__image--mobile">
                                <?php
                                    the_module('image', array(
                                        'class' => 'jip-about__image-item',
                                        'cover' => true,
                                        'size' => 'full',
                                        'id' => !empty($image_mobile) ? $image_mobile : $image_desktop
                                    ));
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
