<?php if (!empty($module)) :
    $module = preg_replace(
        '/(href=")(?:https*:\/\/)*(?:tech\.cornell\.edu|pantheonsite\.io)(\/.+)?"/',
        '$1$2"',
        $module ?: '');

    ob_start();
    $top = crn_get_top_most_parent_page();
    $excluded_pages = get_field('excluded_pages', 'options');
    $params = array(
        'title_li' => '',
        'child_of' => $top
    );
    if (!empty($excluded_pages)) {
        $params['exclude'] = implode(',', $excluded_pages);
    }
    wp_list_pages($params);
    $page_content = ob_get_contents();
    ob_end_clean();
    if (empty(get_field('hide_side_nav'))) :
?>
    <div class="page-side-navigation<?php if ( !empty( $class ) ) echo ' ' . $class; ?>" data-module="page-side-navigation">
        <div class="js-inner">
            <div class="page-side-navigation__inner">
                <div class="page-side-navigation__grid">
                    <?php if (!empty($page_content)) : ?>
                        <div class="page-side-navigation__block page-side-navigation__block--left js-block-left">
                            <?php if (!empty($top)) : ?>
                                <div class="page-side-navigation__wrapper">
                                    <div class="page-side-navigation__active label-text js-current-page">
                                        <p class="page-side-navigation__active-text">
                                            <span><?php echo get_the_title($top); ?></span>
                                            <span class="icon icon-plus"></span>
                                        </p>
                                    </div>
                                    <ul class="page-side-navigation__list js-list">
                                        <?php echo $page_content; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="page-side-navigation__block<?php if (!empty($page_content)) : ?> page-side-navigation__block--right js-block-right<?php endif; ?>">
                        <?php echo $module; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else :
        echo $module;
    endif;
endif; ?>
