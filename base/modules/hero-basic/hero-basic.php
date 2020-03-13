<section class="hero-basic" role="banner" aria-label="<?= empty($title) ? __('Hero', 'crn') : $title; ?>">
    <div class="container hero-basic__container">
        <div class="hero-basic__inner">
            <?php if ( !empty($subtitle) ) : ?>
                <p class="label-text hero-basic__subtitle">
                    <?php echo $subtitle; ?>
                </p>
            <?php endif; ?>
            <?php if ( !empty($title) ) : ?>
                <h1 class="main-title hero-basic__title"><?php echo $title; ?></h1>
            <?php endif; ?>
            <?php if ( !empty($description) ) : ?>
                <div class="p hero-basic__description">
                    <?php
                        $desc_array = explode(": ", $description);
                        echo "<p class='d-inline'>" . $desc_array[0] . ": </p>";
                        echo "<p class='d-inline'>" . $desc_array[1] . "</p>";
                    ?>
                </div>
            <?php endif; ?>
            <?php if ( !empty($image) ) :
                the_module('image', array(
                    'class' => 'hero-basic__image',
                    'id' => $image,
                    'size' => 'large',
                    'cover' => true,
                ));
            endif; ?>
        </div>
    </div>
</section>
