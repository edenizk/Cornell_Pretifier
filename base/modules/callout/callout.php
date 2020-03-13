<?php if( !empty($title) || !empty($description) ) : ?>
    <?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
    <div class="section-gutter callout<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
        <div class="container<?php if( !empty($class_container) ) : echo ' ' . $class_container; endif; ?> callout__container">
            <div class="callout__wrapper">
                <?php
                    if (!empty($image)) {
                        the_module('image', array(
                            'class' => !empty($image_mobile) ? 'image--absolute callout__image-figure callout__image-figure--desktop' : 'image--absolute callout__image-figure',
                            'cover' => true,
                            'size' => 'full',
                            'id' => $image
                        ));
                    }
                ?>
                <?php
                if (!empty($image_mobile)) {
                    the_module('image', array(
                        'class' => 'image--absolute callout__image-figure callout__image-figure--mobile',
                        'cover' => true,
                        'size' => 'full',
                        'id' => $image_mobile
                    ));
                }
                ?>
                <div class="callout__block-content">
                    <div class="callout__content">
                        <?php if( !empty($title) ) : ?>
                            <h3 class="main-heading callout__title"><?php echo $title; ?></h3>
                        <?php endif; ?>
                        <?php if( !empty($description) ) : ?>
                            <div class="p callout__description"><?php echo $description; ?></div>
                        <?php endif; ?>
                    </div>
                    <?php if( !empty($cta_text) && !empty($cta_link) ) : ?>
                        <?php
                            $cta_text = cd_genericLinkTextFix($cta_text, $title);
                        ?>
                        <div class="callout__footer">
                            <?php if (!empty($new_button)) : ?>
                                <?php
                                    the_module('jip-button', array(
                                        'link' => $cta_link,
                                        'text' => $cta_text,
                                        'target' => $target
                                    ));
                                ?>
                            <?php else: ?>
                                <a class="button callout__cta button--dark-red" href="<?php echo $cta_link; ?>"<?php if (!empty($target)) : echo ' target="'.$target.'"'; endif;?>><?php echo $cta_text; ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($svg_mask) : ?>
                <div class="callout__mask callout__mask--mobile"><div class="callout__mask-image" style="background-image: url(<?php echo THEME_URI; ?>/assets/img/wave-mobile.png);"></div></div>
                <div class="callout__mask callout__mask--tablet"><div class="callout__mask-image" style="background-image: url(<?php echo THEME_URI; ?>/assets/img/wave-tablet.png);"></div></div>
                    <div class="callout__mask callout__mask--desktop"><div class="callout__mask-image" style="background-image: url(<?php echo THEME_URI; ?>/assets/img/wave-desktop.png);"></div></div>
                <?php else : ?>
                    <div class="callout__mask" style="background-image: url(<?php echo THEME_URI; ?>/assets/img/callout-mask.png);"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
