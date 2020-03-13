<?php if ( !empty($list) ) : ?>
<?php
    $hero_has_content = false;
    foreach ( $list as $item ) :
        if( !empty($item['title']) || !empty($item['description']) ) :
            $hero_has_content = true;
        endif;
    endforeach;
?>
    <?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
    <section class="carousel section-gutter<?php if( !empty($class) ) : echo ' ' . $class; endif; ?> js-hero" aria-label="<?= empty($headline) ? __('Gallery', 'crn') : $headline; ?>">
        <div class="carousel__wrapper">
            <div class="container carousel__container">
                <?php if ( !empty($title) ) : ?>
                    <h2 class="section-title-gutter secondary-title carousel__title"><?php echo $title; ?></h2>
                <?php endif; ?>
                <div class="carousel__inner">
                    <?php if ( !empty( $list ) ) : ?>
                        <div class="carousel carousel--fade-in carousel__block carousel__images js-carousel-images" data-module="carousel" data-carousel='{"cellAlign": "left", "contain": true, "prevNextButtons": <?php var_export(!$hero_has_content); ?>, "pageDots": false, "resize": true}'>
                            <?php foreach ( $list as $item ) : ?>
                                <?php if( !empty($item['video']) ) : ?>
                                    <div class="carousel__item-video">
                                        <?php the_module('video', array(
                                            'class' => 'carousel__video-image',
                                            'video' => $item['video'],
                                            'image' => $item['image']
                                        )); ?>
                                    </div>
                                <?php else: ?>
                                    <div class="carousel__item-image">
                                        <?php
                                        the_module('image', array(
                                            'class' => 'carousel__image',
                                            'id' => $item['image'],
                                            'size' => 'large',
                                            'sizes' => '100vw',
                                            'cover' => true,
                                        )); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <?php if ($hero_has_content): ?>
                            <div class="carousel carousel--fade-in carousel__block carousel__content">
                                <div class="carousel-content-inner js-carousel-content" data-module="carousel" <?php if( $has_order ) : echo ' data-show-order'; endif; ?> data-carousel='{"cellAlign": "left", "contain": true, "pageDots": false, "resize": true, "sync": ".js-carousel-images"}'>
                                <?php foreach ( $list as $key => $item ) : ?>
                                    <div class="carousel__item js-item">
                                        <?php
                                        the_module('card-tertiary', array(
                                            'title' => isset($item['title']) ? $item['title'] : null,
                                            'description' => isset($item['description']) ? $item['description'] : null,
                                            'cta_link' => isset($item['cta_link']) ? $item['cta_link'] : null,
                                            'cta_text' => isset($item['cta_text']) ? $item['cta_text'] : null
                                        ));

                                        ?>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                                <?php if( $has_order ) : ?>
                                    <p class="carousel-order"><span class="js-index">1</span> OF <span class="js-total"></span></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<style>
    .carousel-order {
        color: <?php echo isset($color) ? $color : '#C4D600'; ?>
    }
</style>
