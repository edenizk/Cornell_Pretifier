<?php if( !empty($list) ) : ?>
    <?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
    <section class="section-gutter accordion<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" data-module="accordion" role="contentinfo" aria-label="<?= empty($headline) ? __('Accordion List', 'crn') : $headline; ?>">
        <div class="container accordion__container">
            <div class="accordion__inner">
                <?php if( !empty($headline) ) : ?>
                    <h2 class="section-title-gutter secondary-title accordion__title"><?php echo $headline; ?></h2>
                <?php endif; ?>
                <div class="accordion__list">
                    <?php foreach ($list as $row) : ?>
                        <?php the_module('accordion-row', $row); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
