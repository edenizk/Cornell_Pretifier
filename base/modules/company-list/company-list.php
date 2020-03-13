<?php the_module('section-anchor', array('anchor_link' => 'company-list-anchor')); ?>
<section class="company-list company-list--<?php echo $post_type; ?> js-company-list" data-module="company-list">
    <div class="company-list__inner">
        <div class="container company-list__container js-company-filter-container">
            <?php if (count($list) == 0) : ?>
                <p class="company-list__empty"><?php _e('Sorry, there is nothing that matches your search.', 'cornell-tech'); ?></p>
            <?php else : ?>
                <div class="grid company-list__grid js-load-more-container">
                    <?php
                        foreach ($list as $item) {
                            switch ($post_type) :
                                case 'companies' :
                                    the_module('company-list-item', array(
                                        'class' => 'grid__item',
                                        'item' => $item
                                    ));
                                    break;
                                case 'events' :
                                    the_module('event-filter-item', array(
                                        'class' => 'grid__item',
                                        'item' => $item
                                    ));
                                    break;
                            endswitch;
                        }
                    ?>
                </div>
                <?php if (count($list) == $per_page) :
                    $query_args = htmlspecialchars(json_encode($query), ENT_QUOTES, 'UTF-8');
                    ?>
                    <div class="company-list__load-more">
                        <button
                            data-module="load-more"
                            data-base-url="<?php echo home_url( "wp-json/crn/load-more/$post_type" ); ?>"
                            data-args="<?= $query_args; ?>"
                            data-offset="0"
                            data-perpage="<?php echo $per_page; ?>"
                            data-selector=".js-load-more-container"
                            class="label-text company-list__load-more-button js-company-load-more"
                        >
                            <?php _e('LOAD MORE', 'crn')?> <span class="icon-arrow-down"></span>
                        </button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
