<?php if( !empty($headline) || !empty($list) ) : ?>
    <?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
    <section class="section-gutter two-up<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" aria-label="<?= empty($headline) ? __('Columns of content', 'crn') : $headline; ?>">
        <div class="container">
            <?php if( !empty($headline) ) : ?>
                <div class="two-up__header">
                    <h2 class="secondary-title section-title-gutter"><?php echo $headline; ?></h2>
                </div>
            <?php endif; ?>
            <?php if( !empty($list) ) : ?>
                <div class="two-up__block">
                    <div class="grid two-up__grid">
                        <?php foreach($list as $item) :
                            $class = ' grid__item two-up__item';
                            if( isset($item['args']) ):
                                $item['args']['class'] = isset($item['args']['class']) ? $item['args']['class'].$class : $class;
                            endif;
                            the_module($item['module'], $item['args']);
                        endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
