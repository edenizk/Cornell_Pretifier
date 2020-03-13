<section class="section-gutter two-up-intro" aria-label="<?= empty($headline) ? __('Content columns', 'crn') : $headline; ?>">
    <div class="container">
        <?php if ( !empty($headline) ) : ?>
            <h2 class="section-title-gutter secondary-title two-up-intro__headline"><?php echo $headline; ?></h2>
        <?php endif; ?>
        <div class="two-up-intro__inner">
            <div class="two-up-intro__image-inner">
                <?php
                the_module('image', array(
                    'size' => 'large',
                    'id' => $image,
                    'cover' => true,
                    'class' => 'two-up-intro__image-figure'
                ));
                ?>
            </div>
            <div class="two-up-intro__content">
                <div class="two-up-intro__content-inner">
                    <?php
                    the_module('card-tertiary', array(
                        'title' => $title,
                        'description' => $description
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
