<?php if(!empty($list)) : ?>
<section class="section-gutter research-events-list<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" aria-label="<?= empty($headline) ? __('Archive List', 'crn') : $headline; ?>">
    <div class="container research-events-list__container">
        <div class="research-events-list__wrapper">
            <?php if( !empty($headline) ) : ?>
                <div class="research-events-list__header">
                    <h2 class="secondary-title section-title-gutter"><?php echo $headline; ?></h2>
                </div>
            <?php endif; ?>
            <div class="research-events-list__articles js-load-more-container">
                <div class="grid research-events-list__grid">
                    <?php foreach($list as $item) :
                        the_module($item['module'], $item['args']);
                    endforeach; ?>
                </div>
            </div>
            <?php if (!empty($cta_text) || !empty($cta_url)) : ?>
                <div class="research-events-list__load-more">
                    <a href="<?php echo $cta_url; ?>" class="button label-text research-events-list__load-more-button" ><?php echo $cta_text; ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
