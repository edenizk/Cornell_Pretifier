<?php if(!empty($list)) : ?>
    <section class="section-gutter gallery-carousel" aria-label="<?= empty($headline) ? __('Gallery', 'crn') : $headline; ?>">
        <div class="gallery-carousel__container">
            <div class="gallery-carousel__inner">
                <div class="gallery-carousel__header">
                    <div class="gallery-carousel__header-inner">
                        <?php if(!empty($headline)) : ?>
                        <h2 class="home-gallery-headline gallery-carousel__headline"><?php echo $headline; ?></h2>
                        <?php endif; ?>
                        <?php if(!empty($intro)) : ?>
                            <div class="gallery-carousel__intro"><?php echo $intro; ?></div>
                        <?php endif; ?>
                        <div class="card-header">
                            <?php the_module('image', array(
                                'size' => 'large',
                                'id' => $header_card_image,
                                'cover' => true,
                                'class' => 'card-header__image-figure'
                            )); ?>
                            <?php if(!empty($header_card_description)) : ?>
                                <div class="card-header__description"><?php echo $header_card_description; ?></div>
                            <?php endif; ?>
                            <?php if(!empty($header_card_cta_link) && !empty($header_card_cta_text)) : ?>
                                <a class="button button--dark-red card-header__cta" href="<?php echo $header_card_cta_link; ?>"><?php echo $header_card_cta_text; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="gallery-carousel__grid-wrapper">
                    <div class="gallery-carousel__grid carousel js-gallery-carousel" data-module="carousel" data-carousel='{"contain": true, "cellAlign": "left", "pageDots": true, "prevNextButtons": true, "selectedAttraction": 0.3, "friction": 0.8}' data-show-order>
                        <?php foreach($list as $item) :
                            $class = ' card-fourth__item';
                            if( isset($item['args']) ):
                                $item['args']['class'] = isset($item['args']['class']) ? $item['args']['class'].$class : $class;
                            endif;
                            the_module($item['module'], $item['args']);
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
