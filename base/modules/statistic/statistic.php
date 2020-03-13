<?php if ( !empty($list) ) : ?>
    <?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
    <section class="section-gutter statistic" role="contentinfo" aria-label="<?= empty($headline) ? __('Grid of content', 'crn') : $headline; ?>">
        <div class="container">
            <?php if ( !empty($headline) ) : ?>
                <h2 class="section-title-gutter secondary-title statistic__headline"><?php echo $headline; ?></h2>
            <?php endif; ?>
            <div class="grid statistic__content">
                <?php foreach ($list as $item) :
                    the_module('card-seventh', $item);
                endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
