<?php if (!empty($logo) && !empty($title)) : ?>
    <div class="jacobs-cta">
        <div class="jacobs-cta__wrapper">
            <div class="container container--xl jacobs-cta__container">
                <div class="jacobs-cta__inner">
                    <div class="jacobs-cta__grid">
                        <?php if (!empty($logo)) : ?>
                            <div class="jacobs-cta__block jacobs-cta__block--left">
                                <?php the_module('image', array(
                                    'class' => 'jacobs-cta__logo',
                                    'id' => $logo,
                                    'size' => 'large',
                                    'contain' => true
                                )); ?>
                            </div>
                        <?php endif; ?>
                        <div class="jacobs-cta__block jacobs-cta__block--right">
                            <div class="jacobs-cta__content">
                                <?php if (!empty($title) || !empty($description)) : ?>
                                    <div class="jacobs-cta__content-text">
                                        <?php if (!empty($title)) : ?>
                                            <h3 class="jip-label"><?php echo $title; ?></h3>
                                        <?php endif; ?>
                                        <?php if (!empty($description)) : ?>
                                            <p class="p-small"><?php echo $description; ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($button)) : ?>
                                    <div class="jacobs-cta__content-button">
                                        <?php the_module('jip-button', array(
                                            'class' => 'jacobs-cta__button',
                                            'text' => $button['title'],
                                            'link' => $button['url'],
                                            'target' => $target['target']
                                        )); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($background)) : ?>
                <div class="jacobs-cta__background" style="background-image: url(<?php echo get_image_with_size($background, 'large') ?>);"></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
