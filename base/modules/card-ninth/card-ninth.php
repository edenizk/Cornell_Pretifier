<?php if( !empty($title) && !empty($link) ) : ?>
    <div class="card-ninth">
        <div class="card-ninth__inner">
            <?php the_module('image', array(
                'id' => $image,
                'class' => 'card-ninth__image-figure',
                'size' => 'medium_large',
                'cover' => true
            )); ?>
            <div class="card-ninth__content">
                <a
                    class="button-link-white link-hover card-ninth__link"
                    href="<?php echo !empty($external_link) ? $external_link : $link; ?>"
                    <?php if (!empty($external_link)) : ?> target="_blank" <?php endif; ?>
                >
                    <span class="text"><?php echo $title; ?></span>
                    <span class="icon-arrow"></span>
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>
