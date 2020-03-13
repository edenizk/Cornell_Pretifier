<section class="category-list" aria-label="<?= empty($headline) ? __('Explore By Category', 'crn') : $headline; ?>">
    <div class="container">
        <div class="category-list__header">
            <?php
                $active = !empty( $activate ) ? $activate : '';
                the_module('local-nav', array(
                    'class' => 'local-nav--no-border local-nav--category-list',
                    'title' => __('Explore By Category', 'crn'),
                    'list' => get_nav_categories( $active ),
                    'has_apply_link' => false
                ));
            ?>
        </div>
        <?php if ( !empty( $list ) ) : ?>
            <div class="category-list__content">
                <?php
                    the_module('archive-list', array(
                        'headline' => !empty( $headline ) ? $headline : __('All News', 'crn'),
                        'list' => $list,
                        'per_page' => !empty($per_page) ? $per_page : 10,
                        'disable_loadmore' => false
                    ));
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>
