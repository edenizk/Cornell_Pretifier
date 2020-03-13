<?php if (!empty($title) && !empty($cta_link)) : ?>
    <div class="cta-item">
        <div class="cta-item__inner">
            <h4 class="sub-title-2 cta-item__title"><?php echo $title; ?></h4>
            <a class="button-link cta-item__button" href="<?php echo $cta_link; ?>">
                <span><?php _e('Learn More', 'crn'); ?></span>
                <span class="icon-arrow"></span>
            </a>
        </div>
    </div>
<?php endif; ?>
