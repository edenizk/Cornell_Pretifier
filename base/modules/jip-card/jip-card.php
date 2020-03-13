<div class="jip-card__wrap" data-module="jip-carousel-card">
    <div class="jip-card__inner">
        <div class="jip-card__item js-jip-card__item">
            <div class="jip-card__item-wrap">
            <div class="jip-card__item-inner">
                <div class="jip-card__image-wrap">
                    <?php
                    the_module('image', array(
                        'image' => get_field('featured_image', 'option'),
                        'class' => 'jip-card__image',
                        'cover' => true,
                    ))
                    ?>
                </div>
                <div class="jip-card__detail">
                    <span class="jip-card__waving"><?php echo _get_svg('jip-card-waving-line'); ?></span>
                    <div class="jip-card__detail-inner">
                        <div class="jip-card__title">
                            <h3 class="jip-secondary-heading heading-bold jip-card__title-text jip-card-title-text">Pioneers in Academia</h3>
                            <button type="button" class="jip-card__toggle js-jip-card-toggle"></button>
                        </div>
                        <div class="jip-card__description">
                            <p class="jip-p normal-bold jip-card__description-text jip-card-description-text js-jip-description">Our faculty and students are unafraid to break with convention. We support experimentation in flexible, cross-disciplinary hibs instead of traditional academic departments.</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="jip-card__item jip-card__item--wipe js-jip-card__item">
            <div class="jip-card__item-wrap">
                <div class="jip-card__item-inner jip-card__item-inner--block">
                    <div class="jip-card__image-wrap">
                        <?php
                        the_module('image', array(
                            'image' => get_field('featured_image', 'option'),
                            'class' => 'jip-card__image',
                            'cover' => true,
                        ))
                        ?>
                    </div>
                    <div class="jip-card__detail">
                        <span class="jip-card__waving"><?php echo _get_svg('jip-card-waving-line'); ?></span>
                        <div class="jip-card__detail-inner">
                            <div class="jip-card__title">
                                <h3 class="jip-secondary-heading heading-bold jip-card__title-text jip-card-title-text">Pioneers in Academia</h3>
                                <button type="button" class="jip-card__toggle js-jip-card-toggle"></button>
                            </div>
                            <div class="jip-card__description">
                                <p class="jip-p normal-bold jip-card__description-text jip-card-description-text js-jip-description">Our faculty and students are unafraid to break with convention. We support experimentation in flexible, cross-disciplinary hibs instead of traditional academic departments.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jip-card__item-links jip-card__item-inner--block">
                    <div class="jip-card__cta">
                        <a href="#" class="jip-card__cta-image-wrap">
                            <?php
                                the_module('image', array(
                                    'image' => get_field('featured_image', 'option'),
                                    'class' => 'jip-card__cta-image',
                                    'cover' => true,
                                ))
                            ?>
                            <div class="jip-card__cta-title">
                                <span class="jip-sub-heading jip-sub-heading-text">Our People</span>
                            </div>
                        </a>
                        <div class="jip-card__cta-link">
                            <?php
                                the_module('jip-button', array(
                                    'text' => esc_html( 'Learn more', 'cornell-tech' ),
                                    'link' => '#',
                                    'class' => 'jip-button--link',
                                    'icon' => 'arrow-left'
                                ))
                            ?>
                        </div>
                    </div>
                    <div class="jip-card__cta">
                        <a href="#" class="jip-card__cta-image-wrap">
                            <?php
                            the_module('image', array(
                                'image' => get_field('featured_image', 'option'),
                                'class' => 'jip-card__cta-image',
                                'cover' => true,
                            ))
                            ?>
                            <div class="jip-card__cta-title">
                                <span class="jip-sub-heading jip-sub-heading-text">Who We Are</span>
                            </div>
                        </a>
                        <div class="jip-card__cta-link">
                            <?php
                            the_module('jip-button', array(
                                'text' => esc_html( 'Learn more', 'cornell-tech' ),
                                'link' => '#',
                                'class' => 'jip-button--link',
                                'icon' => 'arrow-left'
                            ))
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
