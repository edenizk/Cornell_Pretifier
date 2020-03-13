<?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
<section class="section-gutter two-up-diagonal<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" aria-label="<?= empty($headline) ? __('Content columns', 'crn') : $headline; ?>">
    <div class="container">
        <div class="two-up-diagonal__wrapper">
            <?php if ( !empty($headline) ) : ?>
                <h2 class="section-title-gutter secondary-title two-up-diagonal__headline"><?php echo $headline; ?></h2>
            <?php endif; ?>
            <?php if ( !empty($image) && !empty($title) ) : ?>
                <div class="two-up-diagonal__inner">
                    <div class="two-up-diagonal__image">
                        <?php
                        the_module('image', array(
                            'size' => 'large',
                            'id' => $image,
                            'cover' => true,
                            'class' => 'two-up-diagonal__image-figure'
                        ));
                        ?>
                    </div>
                    <div class="two-up-diagonal__content">
                        <div class="two-up-diagonal__content-inner">
                            <?php
                            the_module('card-tertiary', array(
                                'cat' => $cat,
                                'title' => $title,
                                'description' => $description,
                                'cta_link' => $cta_link,
                                'cta_text' => $cta_text
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
