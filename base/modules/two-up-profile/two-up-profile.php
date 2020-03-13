<?php
    if (!empty($anchor_link)) {
        the_module('section-anchor', array(
            'anchor_link' => $anchor_link
        ));
    }
?>
<section class="section-gutter two-up-profile section-bg<?php if ( !empty( $class ) ) : echo ' ' . $class; endif; ?>">
    <div class="two-up-profile__wrapper">
        <div class="container">
            <div class="two-up-profile__inner">
                <?php if( !empty($title) ) : ?>
                    <header class="two-up-profile__header">
                        <h2 class="secondary-title"><?php echo $title; ?></h2>
                    </header>
                <?php endif; ?>
                <div class="grid two-up-profile__list">
                    <?php
                        foreach ( $list as $people ) :
                            $people['class'] = 'grid__item people-item--big';
                            the_module('people-item', $people);
                        endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
