<?php if( !empty($headline) || !empty($list) ) : ?>
    <?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
    <section class="section-gutter three-up<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" aria-label="<?= empty($headline) ? __('Grid of content', 'crn') : $headline; ?>">
        <div class="three-up__wrapper">
            <div class="container">
                <?php if( !empty($headline) ) : ?>
                    <div class="three-up__header section-title-gutter">
                        <h2 class="secondary-title"><?php echo $headline; ?></h2>
                    </div>
                <?php endif; ?>
                <?php if( !empty($list) ) : ?>
                    <div class="three-up__block">
                        <div class="grid three-up__grid">
                            <?php foreach($list as $item) :
                                $class = ' grid__item three-up__item';
                                if( isset($item['args']) ):
                                    $item['args']['class'] = isset($item['args']['class']) ? $item['args']['class'].$class : $class;
                                endif;
                                the_module($item['module'], $item['args']);
                            endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
