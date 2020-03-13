<?php if ( !empty($item) ) : ?>
<?php
    $image = $item['card_image'];
    $description = $item['card_description'];
    $title = $item['card_title'];
    $subtitle = $item['card_subtitle'];
    $list_cta = $item['card_cta'];
    $has_list_cta = false;
    ob_start();
    if (!empty($list_cta)) : ?>
        <div class="jip-card__ctas">
            <?php foreach ( $list_cta as $cta  ) :
                $cta_title = $cta['cta_title'];
                $cta_image = $cta['cta_image'];
                $cta_text = $cta['cta_text'];
                $cta_url = $cta['cta_url'];
                if (!empty($cta_text) && !empty($cta_url)) :
                    $has_list_cta = true;
            ?>
                <div class="jip-card__cta">
                    <a href="<?php echo $cta_url ?>" class="jip-card__cta-image-wrap">
                        <?php  if ( !empty($cta_image) ){
                            the_module('image', array(
                                'id' => $cta_image,
                                'size' => 'large',
                                'class' => 'jip-card__cta-image',
                                'cover' => true,
                            ));
                        }
                        if ( !empty($cta_title) ) : ?>
                            <div class="jip-card__cta-title">
                                <h4 class="jip-card-title-text jip-heading jip-card__cta-title-text"><?php echo $cta_title; ?></h4>
                            </div>
                        <?php endif; ?>
                    </a>
                    <?php  if ( !empty($cta_url) && !empty($cta_text) ) : ?>
                        <div class="jip-card__cta-link">
                            <?php
                            the_module('jip-button', array(
                                'text' => esc_html( $cta_text, 'cornell-tech' ),
                                'link' => $cta_url,
                                'class' => 'jip-button--link',
                                'icon' => 'arrow-left'
                            ));
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; endforeach; ?>
        </div>
    <?php endif; ?>
<?php $card_ctas = ob_get_contents();
    ob_end_clean();
?>

<div
    class="jip-card__item js-jip-card__item<?php if (!$has_list_cta) { echo ' jip-card__item--no-cta'; } ?>"
    data-index="<?php echo $slide_index; ?>"
>
    <div class="jip-card__item-wrap">
        <div class="jip-card__item-inner jip-card__item-inner--block">
            <div class="jip-card__image-wrap js-card-image">
                <?php if ( !empty($image) ) : ?>
                    <?php
                    the_module('image', array(
                        'id' => $image,
                        'size' => 'large',
                        'class' => 'jip-card__image',
                        'cover' => true,
                    ));
                    ?>
                <?php endif; ?>
                <?php if ( !empty($subtitle) ) : ?>
                    <h4 class="heading-bold jip-card__image-subtitle jip-card-image-subtitle-text"><?php echo $subtitle; ?></h4>
                <?php endif; ?>
            </div>
            <div class="jip-card__detail js-card-detail">
                <span class="jip-card__waving"><?php echo _get_svg('jip-card-waving-line'); ?></span>
                <div class="jip-card__detail-inner">
                    <div class="jip-card__title">
                        <?php if ( !empty( $title ) ) : ?>
                            <h3 class="jip-secondary-heading heading-bold jip-card__title-text jip-card-title-text js-jip-card-title"><?php echo $title; ?></h3>
                        <?php endif; ?>
                        <button type="button" class="jip-card__toggle js-jip-card-toggle"></button>
                    </div>
                    <div class="jip-card__description js-jip-description">
                        <?php if ( !empty( $description ) ) : ?>
                            <p class="jip-p heading-demi jip-card__description-text jip-card-description-text">
                                <?php echo $description; ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($has_list_cta) : ?>
                            <div class="jip-card__cta--mobile">
                                <?php echo $card_ctas; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ($has_list_cta) : ?>
                <div class="jip-card__cta--desktop js-jip-card-ctas">
                    <?php echo $card_ctas; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
