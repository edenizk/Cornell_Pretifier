<?php if ( !empty($list) ) : ?>
    <?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
    <section class="section-gutter media-highlights<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" <?php echo !empty( $attr ) ? $attr : ''; ?> aria-label="<?= empty($headline) ? __('Media highlights', 'crn') : $headline; ?>">
        <div class="container">
            <?php if ( !empty($headline) ) : ?>
                <h2 class="<?php echo !empty($homepage_headline_class) ? $homepage_headline_class : 'secondary-title '?>section-title-gutter media-highlights__headline"><?php echo $headline; ?></h2>
            <?php endif; ?>
            <div class="grid media-highlights__list">
                <?php foreach ($list as $item) : ?>
                    <div class="grid__item media-highlights__item">
                        <?php if ( !empty($item['label']) ) : ?>
                            <h4 class="label-text media-highlights__label js-label-media-highlight"><?php echo $item['label']; ?></h4>
                        <?php endif; ?>
                        <?php if ( !empty($item['title']) ) : ?>
                            <a href="<?php echo !empty($item['external_link']) ? $item['external_link'] : $item['link']; ?>" class="p media-highlights__title" target="_blank"><?php echo $item['title']; ?></a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
