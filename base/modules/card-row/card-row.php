<?php if( !empty($title) || !empty($description) ) : ?>
    <article class="card-row">
        <div class="card-row__inner">
            <?php if( !empty($image) || empty( $disable_default_image ) ) : ?>
                <div class="card-row__image-inner">
                    <?php if( !empty($cta_link) ) : ?>
                        <a class="card-row__image-cta" href="<?php echo $cta_link; ?>"<?php if ($target_blank) : ?> target="_blank"<?php endif; ?> title="<?php echo esc_attr($title); ?>">
                    <?php endif; ?>
                    <?php
                    the_module('image', array(
                        'size' => 'large',
                        'id' => $image,
                        'cover' => true,
                        'class' => 'card-row__image-figure'
                    ));
                    ?>
                    <?php if( !empty($cta_link) ) : ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="card-row__block-content">
                <div class="card-row__content">
                    <?php if( !empty($title) ) : ?>
                        <h3 class="section-subtitle-gutter main-heading card-row__title"><?php echo $title; ?></h3>
                    <?php endif; ?>
                    <?php if( !empty($description) ) : ?>
                        <div class="wysiwyg p card-row__description"><?php echo $description; ?></div>
                    <?php endif; ?>
                </div>
                <?php if( !empty($cta_link) && !empty($cta_text) ) : ?>
                    <?php
                        $cta_text = cd_genericLinkTextFix($cta_text, $title);
                    ?>
                    <div class="card-row__footer">
                        <a class="button-link card-row__cta" href="<?php echo $cta_link; ?>"<?php if ($target_blank) : ?> target="_blank"<?php endif; ?> title="<?php echo esc_attr($title . ' - ' . $cta_text); ?>"><?php echo $cta_text; ?><span class="icon-arrow"></span></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </article>
<?php endif; ?>
