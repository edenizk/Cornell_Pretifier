<div class="jip-our-ideas-item<?php if ( ! empty( $class ) ) { echo ' ' . $class; } ?>">
    <a href="<?php echo $link; ?>" class="jip-our-ideas-item__wrapper">
        <div class="jip-our-ideas-item__inner">
            <div class="jip-our-ideas-item__image-wrap">
                <?php if (!empty($image)) {
                    the_module('image', array(
                        'class' => 'jip-our-ideas-item__image',
                        'id' => $image,
                        'size' => 'large',
                        'cover' => true
                    ));
                } ?>
            </div>
            <div class="jip-our-ideas-item__content">
                <?php if (!empty($title)) : ?>
                    <h4 class="jip-our-ideas-item__title jip-sub-heading2"><?php echo $title; ?></h4>
                <?php endif; ?>
                <span class="jip-link" title=""><?php _e('Read Article', 'cornell-tech'); ?></span>
            </div>
        </div>
    </a>
</div>
