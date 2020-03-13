<?php if( !empty($list) ) : ?>
    <?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
    <section class="section-gutter list-section<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" role="complementary" aria-label="<?= empty($headline) ? __('List', 'crn') : $headline; ?>">
        <div class="container">
            <?php if( !empty($headline) ) : ?>
                <div class="list-section__header">
                    <h2 class="secondary-title section-title-gutter"><?php echo $headline; ?></h2>
                </div>
            <?php endif; ?>
            <div class="list-section__list">
                <?php foreach($list as $item) :
                    the_module($item['module'], $item['args']);
                endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
