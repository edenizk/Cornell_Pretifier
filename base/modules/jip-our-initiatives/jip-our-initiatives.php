<?php if (!empty($list)) : ?>
    <div class="jip-our-initiatives jip-wave-wrapper<?php if ( ! empty( $class ) ) { echo ' ' . $class; } ?>">
        <div class="jip-our-initiatives__wrapper">
            <div class="jip-container jip-our-initiatives__container">
                <div class="jip-our-initiatives__inner">
                    <?php if (!empty($title)) {
                        the_module('jip-header-section', array(
                            'title' => $title,
                            'class' => 'jip-our-initiatives__header'
                        ));
                    } ?>
                    <div class="jip-carousel jip-carousel--our-initiatives jip-our-initiatives__list" data-module="carousel" data-carousel='{"contain": true, "cellAlign": "left", "pageDots": true, "prevNextButtons": true, "groupCells": true, "adaptiveHeight": true, "arrowShape": "M6.018 51.275l10.908 11.212-2.15 2.092L0 49.391 14.805 35l2.091 2.151L5.452 48.275h93.661v3H6.018z"}'>
                        <?php foreach ($list as $item) {
                            the_module('jip-our-initiatives-item', $item);
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
