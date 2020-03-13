<?php if (!empty($title)) : ?>
    <section class="jip-hero<?php if ( !empty($class) ) : echo ' ' .$class; endif; ?>">
        <div class="jip-hero__background">
            <?php
            if (!empty($image)) {
                the_module('image', array(
                    'class' => 'jip-hero__background-image',
                    'id' => $image['ID'],
                    'size' => 'full',
                    'cover' => true
                ));
            }
            ?>
        </div>
        <div class="jip-container jip-hero__container">
            <div class="jip-hero__inner">
                <div class="jip-hero__content">
                    <h1 class="jip-secondary-heading-large jip-hero__subtitle"><?php echo $title; ?></h1>
                    <?php if (!empty($subtitle)) : ?>
                        <h2 class="jip-main-heading text-stroke jip-hero__title"><?php echo $subtitle; ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($description)) : ?>
                        <div
                            class="jip-p-large jip-hero__description"
                        ><?php echo $description; ?></div>
                    <?php endif; ?>
                    <?php if (!empty($cta_text) && !empty($cta_url)) : ?>
                        <div class="jip-hero__footer">
                            <?php
                                the_module('jip-button', array(
                                    'class' => 'jip-hero__button',
                                    'text' => $cta_text,
                                    'link' => $cta_url
                                ));
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
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
