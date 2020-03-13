<?php if( !empty($list) ) : ?>
    <section class="cta-list<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" aria-label="<?= empty($title) ? __('Studio Courses', 'crn') : $title; ?>">
        <div class="cta-list__wrapper">
            <?php if( !empty($title) || !empty($description) ) : ?>
                <div class="cta-list__header">
                    <?php if( !empty($title) ) : ?>
                        <h3 class="main-heading cta-list__title"><?php echo $title; ?></h3>
                    <?php endif; ?>
                    <?php if( !empty($description) ) : ?>
                        <div class="cta-list__description"><?php echo $description; ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="cta-list__list">
                <?php
                foreach($list as $item) :
                    the_module('cta-item', $item);
                endforeach;
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>
