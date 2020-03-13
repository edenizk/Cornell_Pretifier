<section class="section-gutter five-up<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" aria-label="<?= empty($headline) ? __('Content grid', 'crn') : $headline; ?>">
    <div class="container five-up__container">
        <?php if( !empty($headline) ) : ?>
            <div class="home-five-up-header five-up__header">
                <h2 class="section-title-gutter secondary-title five-up__headline"><?php echo $headline; ?></h2>
            </div>
        <?php endif; ?>
        <div class="five-up__wrapper">
            <div class="grid five-up__grid">
                <?php foreach($list as $item) :
                    the_module($item['module'], $item['args']);
                endforeach; ?>
                <?php if( !empty($after) ) :
                    echo $after;
                endif; ?>
            </div>
        </div>
    </div>
</section>

