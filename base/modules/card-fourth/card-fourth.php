<?php if( !empty($title) || !empty($description) ) : ?>
    <article class="card-fourth<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
        <div class="card-fourth__inner">
            <?php $alt = 'Open video of ' . (!empty($title) ? esc_attr($title) : esc_attr($description)); ?>
            <?php if ( !empty($video) && $card_style === 'green' ) :?>
                <a href="#<?php echo $modal_id; ?>" id="trigger-<?php echo $modal_id; ?>" aria-label="<?= $alt ?>" class="card-fourth__video-link js-video-toggle" data-video-modal="<?php echo $modal_id; ?>">
            <?php endif; ?>
            <?php the_module('image', array(
                'size' => 'large',
                'id' => $image,
                'alt' => $alt,
                'cover' => true,
                'class' => 'card-fourth__background card-fourth__background-image'
            )); ?>

                <?php if ( !empty($video) && $card_style === 'green' ) :?>
                    <span class="icon-play-video card-fourth__video-icon"></span>
                    </a>
                <?php endif; ?>
            <div class="card-fourth__background card-fourth__background-color"></div>
            <div class="card-fourth__content">
                <?php if( !empty($cat) ) : ?>
                    <div class="card-fourth__cat">
                        <?php
                        $cat_array = explode(',', $cat);
                        foreach ($cat_array as $cat_id) :
                            $cat_item = get_category($cat_id);
                            $category_link = get_category_link( $cat_id );
                            ?>
                            <h3 class="label-text"><a href="<?php echo esc_html($category_link); ?>" class="button button--dark-red card-fourth__label"><span class='visually-hidden'>News Category </span><?php echo $cat_item->name; ?></a></h3>
                        <?php endforeach; ?>
                        <?php
                            if ( !empty( $label_secondary ) ) :
                        ?>
                                <h3 class="label-text"><a href="<?php echo !empty( $label_secondary['url'] ) ? $label_secondary['url'] : '#' ; ?>" class="button button--dark-red card-fourth__label"><span class='visually-hidden'>News Category </span><?php echo !empty( $label_secondary['text'] ) ? $label_secondary['text'] : ''; ?></a></h3>
                        <?php
                            endif;
                        ?>
                    </div>
                <?php endif; ?>
                <div class="card-fourth__content-inner">
                    <?php if ( !empty($video) && $card_style !== 'green' ) :?>
                        <a tabindex="0" id="trigger-<?php echo $modal_id; ?>" aria-label="<?= $alt ?>" class="card-fourth__video-link js-video-toggle" data-video-modal="<?php echo $modal_id; ?>">
                            <span class="icon-play-video card-fourth__video-icon"></span>
                        </a>
                    <?php endif; ?>
                    <?php if( !empty($title) ) : ?>
                        <h3 class="card-fourth-title secondary-title card-fourth__title"><a href="<?php echo $cta_link; ?>"><?php echo $title; ?></a></h3>
                    <?php endif; ?>
                    <?php if( !empty($description) ) : ?>
                        <div class="card-fourth-description card-fourth__description"><?php echo $description; ?></div>
                    <?php endif; ?>
                    <?php if( !empty($cta_text) ) : ?>
                        <div class="card-fourth__footer">
                            <a class="button-link button-link-white card-fourth__button" href="<?php echo $cta_link; ?>"><span><?php echo $cta_text; ?></span><span class="icon-arrow"></span></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </article>
<?php endif; ?>
