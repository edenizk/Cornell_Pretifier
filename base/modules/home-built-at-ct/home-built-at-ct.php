<div class="home-built-at-ct<?php if (empty($image)) : ?> home-built-at-ct--no-bg<?php endif; ?>">
    <div class="home-built-at-ct__inner">
        <div class="home-built-at-ct__background">
            <?php if (!empty($image)) {
                the_module('image', array(
                    'class' => 'home-built-at-ct__background-image',
                    'id' => $image,
                    'size' => 'large',
                    'contain' => true
                ));
            } ?>
        </div>
        <div class="container container--xl home-built-at-ct__container">
            <div class="home-built-at-ct__wrapper">
                <div class="home-built-at-ct__content">
                    <?php if(!empty($title)) : ?>
                        <h3 class="main-title home-built-at-ct__title secondary-title"><?php echo $title; ?></h3>
                    <?php endif; ?>

                    <?php if ( ! empty( $description ) ) : ?>
                        <p class="p-large home-built-at-ct__description"><?php echo esc_textarea( $description ); ?></p>
                    <?php endif; ?>

                    <?php if(!empty($cta_text) && !empty($cta_link)) : ?>
                        <div class="home-built-at-ct__button-wrapper">
                            <a class="button-link home-built-at-ct__button" href="<?php echo $cta_link; ?>"><span><?php echo $cta_text; ?></span><span class="icon-arrow"></span></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
