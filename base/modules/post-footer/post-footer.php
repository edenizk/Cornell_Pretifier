<section class="post-footer<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" aria-label="<?= __('Article footer', 'crn'); ?>">
    <div class="container post-footer__container">
        <div class="post-footer__inner">
            <div class="post-footer__inner-content">
                <?php if ( !empty($cta_text) && !empty($cta_link) ) : ?>
                    <div class="post-footer__back">
                        <a href="<?php echo $cta_link; ?>" class="label-text"><?php echo $cta_text; ?></a>
                    </div>
                <?php endif; ?>
                <?php if ( !empty($show_socials) ) : ?>
                    <div class="post-footer__social-share">
                        <span class="label-text"><?php _e('SHARE THIS ON:', 'crn') ?></span>
                        <?php
                        the_module('social-links', array(
                            'class' => 'social-links--post',
                            'list' => crn_get_post_social_share()
                        ));
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ( !empty($links) ) : ?>
                <div class="post-footer__links">
                    <?php if ( !empty($title) ) : ?>
                        <h3 class="label-text post-footer__links-title"><?php echo $title; ?></h3>
                    <?php endif; ?>
                    <div class="post-footer__list">
                        <?php foreach ($links as $link) :
                            if ( !empty($link['cta_text']) && !empty($link['cta_link']) ) :
                        ?>
                                <a href="<?php echo $link['cta_link']; ?>" class="p post-footer__link" target="_blank"><?php echo $link['cta_text']; ?></a>
                        <?php endif; endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
