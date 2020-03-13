<?php
if( !empty($list) ) :
$tab_title_list = crn_get_curriculum_nav_items($list);
?>
    <section class="schedule-program <?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" role="contentinfo" aria-label="<?= empty($title) ? __('Schedule', 'crn') : $title; ?>">
        <div class="container">
            <div class="schedule-program__inner">
                <?php if( !empty($title) ) : ?>
                    <h2 class="secondary-title section-title-gutter"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php
                if( !empty($list) ) : ?>
                    <?php
                        the_module('program-nav', array(
                            'list' => $tab_title_list
                        ));
                    ?>
                    <div class="schedule-program__tabs-body" data-module="page-scroll">
                        <?php
                        foreach($list as $item) :
                            the_module('program-tab', $item);
                        endforeach;
                        ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($footer_note)) : ?>
                    <div class="p-small schedule-program__footer"><?php echo $footer_note; ?></div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
