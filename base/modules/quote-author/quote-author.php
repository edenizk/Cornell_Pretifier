<?php if( !empty($title) || !empty($name) ) : ?>
    <div class="quote-author">
        <div class="quote-author__inner">
            <?php the_module('image', array(
                'class' => 'quote-author__image-inner',
                'cover' => true,
                'id' => !empty($image) ? $image : crn_get_default_person_image()
            )); ?>
            <div class="quote-author__content">
                <div class="quote-author__info">
                    <?php if( !empty($name) ) : ?>
                        <h4 class="quote-author-name quote-author__name"><?php echo $name; ?></h4>
                    <?php endif; ?>
                    <?php if( !empty($title) ) : ?>
                        <p class="quote-author-title quote-author__title"><?php echo $title; ?></p>
                    <?php endif; ?>
                </div>
                <?php
                    if( !empty($cta_text) && !empty($modal_id) ) :

                ?>
                    <div class="quote-author__cta">
                        <button aria-role="button" tabindex="0" title="<?php echo esc_attr($cta_text); ?>" class="label-text video-modal-toggle js-video-toggle" data-video-modal="<?php echo $modal_id; ?>">
                            <span class="icon-video"></span>
                            <span><?php echo $cta_text; ?></span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php if( !empty($after) ) :
                    echo $after;
                endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
