<?php if(!empty($list)) : ?>
<section class="section-gutter archive-list<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" aria-label="<?= empty($headline) ? __('Archive List', 'crn') : $headline; ?>">
    <div class="container archive-list__container">
        <div class="archive-list__wrapper">
            <?php if( !empty($headline) ) : ?>
                <div class="archive-list__header">
                    <h2 class="secondary-title section-title-gutter"><?php echo $headline; ?></h2>
                </div>
            <?php endif; ?>
            <div class="archive-list__articles js-load-more-container">
                <?php foreach($list as $item) :
                    the_module($item['module'], $item['args']);
                endforeach; ?>
            </div>
            <?php if (!isset($disable_loadmore) || !$disable_loadmore) : ?>
                <div class="archive-list__load-more">
                    <?php
                        // Load more query
                        $per_page = !empty($per_page) ? $per_page : 10;
                        $offset = !empty($offset) ? $offset : 0;
                        $post_type = 'post';
                        $category = get_category( get_query_var( 'cat' ) );
                        $category_name = ($category && !is_wp_error($category)) ? $category->slug : '';
                        $query = array (
                            'post_status' => 'publish',
                            'posts_per_page' => $per_page,
                            'order' => 'DESC',
                            'orderby' => 'date',
                            'post_type' => $post_type,
                            'category_name' => $category_name,
                            'category__not_in' => get_field( 'excluded_categories', 'option' )
                        );
                        $query_args = htmlspecialchars(json_encode($query), ENT_QUOTES, 'UTF-8');
                        $query['offset'] = (1 * $per_page);
                        $next = new WP_Query( $query );
                    ?>

                    <?php if ( $next->have_posts() ): ?>
                        <button
                            data-module="load-more"
                            data-base-url="<?php echo home_url( "wp-json/wp/v2/$post_type" ); ?>"
                            data-args="<?= $query_args; ?>"
                            data-offset="<?php echo $offset; ?>"
                            data-perpage="<?php echo $per_page; ?>"
                            data-selector=".js-load-more-container"
                            class="label-text archive-list__load-more-button"
                        >
                            <?php _e('LOAD MORE NEWS STORIES', 'crn')?> <span class="icon-arrow-down"></span>
                        </button>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
