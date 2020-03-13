<?php
/* No image, no background define */
if (empty($image) && empty($background_color)) {
    $background_color = '#323A46';
}
?>
<section class="hero hero--skew js-hero" data-module="hero" role="banner" aria-label="<?= empty($title) ? __('Hero', 'crn') : $title; ?>">
    <div class="hero__block-image">
        <div class="hero__background"<?php if( !empty($image) ) : ?> style="background-image: url('<?php echo wp_get_attachment_url($image); ?>');"<?php else : ?>style="background-color: <?php echo $background_color; ?>"<?php endif; ?>></div>
    </div>
    <div class="hero__block-content">
        <div class="container container--xl hero__container">
            <div class="hero__wrapper">
                <div class="hero__content">
                    <?php if ( !empty( $subtitle ) ) : ?>
                        <p class="sub-heading hero__subtitle"><?php echo $subtitle; ?></p>
                    <?php   endif; ?>
                    <?php if( !empty($title) ) : ?>
                        <h1 class="hero-skew-title hero__title"><?php echo $title; ?></h1>
                    <?php endif; ?>
                    <?php if( !empty($description) ) : ?>
                        <div class="hero-skew-description hero__description"><?php echo $description; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
