<?php
/* No image, no background define */
if (empty($image) && empty($background_color)) {
    $background_color = '#323A46';
}
?>
<section class="hero<?php if ( !empty( $class ) ) echo ' ' . $class; ?> js-hero" data-module="hero" role="banner" aria-label="<?= empty($title) ? __('Hero', 'crn') : $title; ?>">
    <div class="hero__background" <?php if (!empty($background_color)) : ?>style="background-color: <?php echo $background_color; ?>"<?php endif; ?>>
        <?php
        if (!empty($image)) {
            the_module('image', array(
                'class' => 'hero__background-image',
                'id' => $image,
                'size' => 'large',
                'cover' => true
            ));
        }
        ?>
    </div>
    <?php if (!empty($enable_canvas)) : ?>
        <div class="hero__canvas-wrapper" data-module="canvas-octagon">
            <figure class="hero__canvas-image" style="background-image: url('<?php echo $background_canvas; ?>');"></figure>
            <canvas class="hero__canvas js-canvas" height="1010" width="1010"></canvas>
        </div>
    <?php endif; ?>
    <div class="container container--xl hero__container">
        <div class="hero__wrapper">
            <div class="hero__content">
                <?php if(!empty($title)) : ?>
                    <h1 class="main-title hero__title"><?php echo $title; ?></h1>
                <?php endif; ?>

                <?php if ( ! empty( $description ) ) : ?>
                    <p class="hero__description"><?php echo esc_textarea( $description ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php
if (!empty($after)) : ?>
    <div class="hero-after<?php if (!empty($after_class)) {echo ' ' . $after_class;} ?>">
        <?php if (is_array($after) && !empty($after['top'])) {
            echo implode('', $after['top']);
        } ?>
        <div class="hero-after__wrapper">
            <?php if (is_array($after)) {
                if (!empty($after['content'])) { echo $after['content']; }
            } else {
                echo $after;
            } ?>
        </div>
    </div>
<?php endif; ?>
