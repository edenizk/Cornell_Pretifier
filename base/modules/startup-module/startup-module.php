<?php
    $post_type = (empty($post_type)) ? 'companies' : $post_type;
    $per_page = isset($per_page) ? $per_page : 15;
    $new_layout = isset($new_layout) ? $new_layout : false;
    $class_company_filter = !empty($class_company_filter) ? $class_company_filter : null;
    $title = !empty($title) ? $title : null;
    $label = !empty($label) ? $label : null;
    if (!empty($anchor_link)) {
        the_module('section-anchor', array(
            'anchor_link' => $anchor_link
        ));
    }
    $Filter = new Filter($post_type, $per_page);
    $has_filter = $Filter->has_filter();
    $build_filter_list = $Filter->build_filter_list();
    $build_filter = $Filter->build_filter();
    $taxonomies = $Filter->all_taxonomies();
    $query = $Filter->load_more_query();
    $list = $Filter->get_filter_list();
?>
<section
    class="section-gutter startup-module<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>"
    data-module="startup-module"
    data-startup-module='{"url": "<?php echo home_url( "wp-json/crn/filter/$post_type" ); ?>", "perpage": "<?php echo $per_page; ?>", "new_layout": <?php echo $new_layout; ?>}'
>
    <?php if ( !empty($wrapper) ) : ?>
    <div class="container startup-module__container">
        <div class="startup-module__wrapper">
            <div class="grid startup-module__grid">
    <?php endif; ?>
        <?php
            the_module('company-filter', array(
                'class' => $class_company_filter,
                'new_layout' => $new_layout,
                'headline' => $title,
                'label' => $label,
                'post_type' => $post_type,
                'per_page' => $per_page,
                'wrapper' => $wrapper,
                'has_filter' => $has_filter,
                'build_filter_list' => $build_filter_list,
                'build_filter' => $build_filter,
                'taxonomies' => $taxonomies,
            ));

            if ( !empty($wrapper) ) : ?>
            <div class="grid__item company-list-filter">
                <div class="company-filter-keys<?php if ($has_filter) : ?> company-filter-keys--active<?php endif; ?> js-filter-key-wrapper">
                    <p class="p company-filter-keys__label"><?php _e('Active Filters: ', 'crn'); ?></p>
                    <?php echo $build_filter_list; ?>
                </div>
            <?php endif;

            the_module('company-list', array(
                'post_type' => $post_type,
                'per_page' => $per_page,
                'list' => $list,
                'query' => $query
            ));
        ?>
    <?php if ( !empty($wrapper) ) : ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>
