<?php if( !empty($list) ) : ?>
    <section class="schedule-program-v2<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" role="contentinfo" aria-label="<?= empty($title) ? __('Schedule', 'crn') : $title; ?>">
        <div class="container schedule-program-v2__container">
            <?php if( !empty($title) ) : ?>
                <h2 class="secondary-title schedule-program-v2__title"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php
            if( !empty($list) ) : ?>
            <div class="schedule-program-v2__body" data-module="page-scroll">
                <?php
                foreach($list as $item) :
                    the_module('program-v2', $item);
                endforeach;
                ?>
            </div>
            <?php endif; ?>
            <?php if (!empty($footer_note)) : ?>
                <div class="p-small schedule-program-v2__footer"><?php echo $footer_note; ?></div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
