<?php
    $social_links = crn_get_social_media_links(array(
        'instagram'
    ));
?>
<div
    <?php if ($id ?: ''): ?>
        id="<?php echo $id ?>"
    <?php endif ?>
    class="slideout js-slideout"
    data-module="slideout"
>
    <div class="slideout__header">
        <?php
            $visit_button = $visit_button ?: '';
            echo $visit_button;

            the_module('nav-trigger', [
                'class' => 'nav-trigger--header',
                'data_action' => join(' ', [
                    'data-slideout-toggle',
                    'data-remove-class="is-active"',
                    'data-remove-class-target=".search-form--header"'
                ]),
                controls => $id
            ]);
        ?>
    </div>
    <div class="slideout__inner js-slideout-inner">
        <div class="slideout__content">
            <div class="slideout__search">
                <?php the_module('search-form', array(
                    'class' => 'search-form--sideout'
                )); ?>
            </div>
            <?php if (has_nav_menu('header-primary')): ?>
                <?php
                    ob_start();

                    wp_nav_menu(array(
                        'theme_location' => 'header-primary',
                        'container' => 'div',
                        'container_class' => 'slideout__nav',
                        'menu_class' => 'slideout__menu',
                        'after' => '<button class="menu-item-arrow js-submenu-toggle" aria-label="Toggle Submenu"></button>',
                        'walker' => new CRN_Mega_Menu('mobile')
                    ));

                    $nav = trim(ob_get_clean());

                    echo preg_replace(
                        '/\shref="#sub-menu-studio"/',
                        ' href="/studio"',
                        $nav);
                ?>
            <?php endif; ?>
            <?php if( has_nav_menu('header-quick-links') ) :
                $menu_location = get_nav_menu_locations();
                $quick_link_menu = wp_get_nav_menu_object( $menu_location['header-quick-links'] );
                wp_nav_menu(array(
                    'theme_location' => 'header-quick-links',
                    'container' => 'div',
                    'container_class' => 'slideout__block',
                    'items_wrap'=> '<h3>'.esc_html($quick_link_menu->name).'</h3><ul id="%1$s" class="%2$s">%3$s</ul>',
                    'menu_class' => 'slideout__header-quick-links-menu'
                ));
            endif; ?>
            <?php if (!empty($social_links)) : ?>
                <div class="slideout__social">
                    <h3 class=""><?php _e('CONNECT WITH US', 'crn'); ?></h3>
                    <div class="slideout__social-links">
                        <?php the_module('social-links', array(
                            'list' => $social_links
                        )); ?>
                    </div>
                    <p class="slideout__address">2 West Loop Road, New York, NY 10044</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="slideout-overlay"></div>
