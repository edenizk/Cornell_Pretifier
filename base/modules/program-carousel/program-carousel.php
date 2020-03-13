<?php if ( !empty($list) || !empty($title) ) : ?>
<section class="program-carousel">
    <div class="container program-carousel__container">
        <div class="program-carousel__inner">
            <div class="program_carousel__content">
                <?php if ( !empty($title) ) : ?>
                    <h2 class="secondary-title program-carousel__title"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if ( !empty($description) ) : ?>
                    <p class="p-large program-carousel__description"><?php echo $description; ?></p>
                <?php endif; ?>
                <?php if ( !empty($cta_url) && !empty($cta_text) ) : ?>
                    <a class="label button-link program-carousel__button" href="<?php echo $cta_url; ?>">
                        <?php echo $cta_text; ?>
                        <span class="icon-arrow"></span>
                    </a>
                <?php endif; ?>
            </div>
            <?php if (!empty($list)) : ?>
                <div class="program-carousel__list-wrap">
                    <div class="program-carousel__list" data-module="carousel" data-carousel='{"contain": true, "cellAlign": "left", "pageDots": false, "prevNextButtons": true, "groupCells": true, "adaptiveHeight": true}'>
                        <?php foreach( $list as $item ) : ?>
                            <?php
                            the_module('company-list-item', array(
                                'class' => 'program-carousel__item',
                                'item' => $item
                            ));
                            ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
