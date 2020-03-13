<?php
if ( !empty($event_list) ) :
?>
<?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
<section class="section-gutter event-section<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" aria-label="<?= empty($headline) ? __('Events', 'crn') : $headline; ?>">
    <div class="container event-section__container">
        <div class="event-section__inner">
            <?php if ( !empty($headline) ) : ?>
                <header class="event-section__header">
                    <h2 class="main-heading home-event-section-headline event-section__headline"><?php echo $headline; ?></h2>
                    <?php if ( !empty($cta_text) && !empty($cta_link) ) : ?>
                        <a href="<?php echo $cta_link; ?>" class="button-link event-section__link"<?php if ( $target_blank ) : ?> target="_blank"<?php endif; ?>><span><?php echo $cta_text; ?></span><span class="icon-arrow"></span></a>
                    <?php endif; ?>
                </header>
            <?php endif; ?>
            <div class="grid event-section__content">
                <?php if ( !empty($event_intro) ) :
                    the_module('event-intro', $event_intro);
                endif;
                if ( !empty($event_list) ) :
                    the_module('event-list', $event_list);
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
<?php
endif;
?>
