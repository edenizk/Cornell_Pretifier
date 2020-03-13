<?php if ( !empty( $list ) ) : ?>
    <section class="people-grid<?php if ( !empty( $class ) ) : echo ' ' . $class; endif; ?>" role="contentinfo" aria-label="<?= empty($headline) ? __('Grid of people', 'crn') : $headline; ?>">
        <div class="container">
            <div class="people-grid__inner<?php if ( !empty( $inner_class ) ) : echo ' ' . $inner_class; endif; ?>">
                <?php if ( !empty( $headline ) ) : ?>
                    <div class="people-grid__head">
                        <h2 class="h2 people-grid__headline"><?php echo $headline; ?></h2>
                    </div>
                <?php endif;?>

                <div class="grid people-grid__list">
                    <?php
                    foreach ( $list as $index => $item ) :
                        $item['class'] = 'grid__item';
                        the_module('people-item', $item);
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>
