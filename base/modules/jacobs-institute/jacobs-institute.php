<div class="jacobs-institute">
    <div class="container jacobs-institute__container">
        <div class="jacobs-institute__inner">
            <div class="jacobs-institute__background" data-module="canvas-octagon">
                <figure class="jacobs-institute__canvas-image" style="background-image: url('<?php echo THEME_URI . '/assets/img/octagon.svg'; ?>');"></figure>
                <canvas class="jacobs-institute__canvas js-canvas" height="1010" width="1010"></canvas>
            </div>
            <div class="jacobs-institute__header">
                <div class="jacobs-institute__logo">
                    <a href="<?php if (!empty($logo_link)) { echo $logo_link; } else { echo esc_url( home_url('/') ); } ?>" class="jacobs-institute__logo-link">
                        <img src="<?php echo THEME_URI; ?>/assets/img/jacobs-vertical@2x.png" class="jacobs-institute__logo-img jacobs-institute__logo--desktop" alt="Jacobs Institute at Cornell Tech">
                        <img src="<?php echo THEME_URI; ?>/assets/img/jacobs-horizontal@2x.png" class="jacobs-institute__logo-img jacobs-institute__logo--mobile" alt="Jacobs Institute at Cornell Tech">
                    </a>
                </div>
                <?php if( !empty($description) ) : ?>
                <div class="sub-heading jacobs-institute-description jacobs-institute__description">
                    <?php echo $description; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php if( !empty($lists) ) : ?>
            <div class="jacobs-institute__content">
                <div class="grid carousel jacobs-institute__carousel" data-module="carousel" data-carousel='{"cellAlign": "left", "pageDots": false, "prevNextButtons": true, "watchCSS": true}'>
                    <?php foreach($lists as $key => $item) : ?>
                        <div class="grid__item jacobs-institute__item">
                            <?php if( !empty($item['label']) ) : ?>
                                <div class="jacobs-institute-item-label jacobs-institute__item-label"><?php echo $item['label']; ?></div>
                            <?php endif; ?>
                            <?php
                            the_module('image', array(
                                'id' => $item['image'],
                                'cover' => true,
                                'class' => 'jacobs-institute__item-image'
                            ));
                            ?>
                            <?php if( !empty($item['url']) && !empty($item['title']) ) : ?>
                            <div class="<?php if ($key === 0) : ?>jacobs-institute-item-title-main<?php else : ?><?php endif; ?> jacobs-institute__item-title">
                                <a
                                    href="<?php echo !empty($item['external_link']) ? $item['external_link'] : $item['url']; ?>"
                                    class="button-link-white"
                                    <?php if (!empty($item['external_link'])): ?>target="_blank"<?php endif; ?>
                                >
                                    <?php echo $item['title']; ?> <span class="icon-arrow"></span>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
