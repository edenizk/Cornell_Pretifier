<?php if ( !empty( $list ) ) : ?>
<div class="jip-carousel__wrap jip-wave-wrapper">
    <div class="jip-container jip-carousel__container">
        <div class="jip-carousel__inner" data-module="jip-carousel-card">
            <div class="jip-carousel__grid">
                <div class="jip-carousel jip-carousel--landing js-jip-carousel" data-module="carousel" data-flickity data-carousel='{"contain": true, "cellAlign": "left", "pageDots": false, "prevNextButtons": true, "groupCells": false, "adaptiveHeight": true, "arrowShape": "M6.018 51.275l10.908 11.212-2.15 2.092L0 49.391 14.805 35l2.091 2.151L5.452 48.275h93.661v3H6.018z"}'>
                    <?php foreach($list as $index => $item) : ?>
                        <?php
                            the_module('jip-carousel-card-item', array(
                                'item' => $item,
                                'slide_index' => $index
                            ));
                        ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
