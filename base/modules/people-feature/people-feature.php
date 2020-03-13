<div class="section-gutter people-feature<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" role="contentinfo" aria-label="<?= empty($headline) ? __('Featured people', 'crn') : $headline; ?>">
    <div class="people-feature__wrapper">
        <div class="people-feature__container container">
            <?php if( !empty($headline) ) : ?>
                <div class="people-feature__header section-title-gutter">
                    <h2 class="secondary-title"><?php echo $headline; ?></h2>
                </div>
            <?php endif; ?>
            <?php if( !empty($list) ) : ?>
                <div class="people-feature__block">
                    <div class="grid people-feature__grid">
                        <?php foreach($list as $item) :
                            $class = ' grid__item people-feature__item';
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
</div>
