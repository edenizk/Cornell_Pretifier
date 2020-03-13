<?php if (!empty($list)) : ?>
    <section class="our-people<?php if (!empty($class)) : echo ' '.$class; endif; ?>" data-module="our-people">
        <?php
            the_module('jip-header-section', array(
                'class' => 'jip-header-section--our-people',
                'title' => $title,
                'description' => $description
            ));
        ?>
        <div class="jip-container our-people__container">
            <div class="carousel our-people__grid" data-module="carousel" data-carousel='{"cellAlign": "left", "prevNextButtons": false, "watchCSS": true}'>
                <?php
                    foreach ($list as $item) {
                        the_module('our-people-item', $item);
                    }
                ?>
            </div>
        </div>
    </section>
<?php endif;
