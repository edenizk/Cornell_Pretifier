<?php
    $id = get_the_ID();
    $modules = get_field('modules', $id) ?: [];
    $is_hero = !empty(get_field('hero_image', $id) ?: [])
        || !empty(get_field('hero_video', $id) ?: [])
        || !empty(get_field('hero_background', $id) ?: [])
        || !empty(get_field('hero_title', $id) ?: [])
        || !empty(get_field('hero_style', $id) ?: [])
        || !empty(get_field('hero_description', $id) ?: [])
        || (count($modules)
            && ($modules[0]['acf_fc_layout'] ?: []) === 'hero'
            && !empty($modules[0]['title'] ?: ''));

    $logo = get_field('logo', 'options') ?: [];
    $logo_svg = !empty($logo)
            && $logo['url']
            && $logo['mime_type'] === 'image/svg+xml'
        ? @file_get_contents($logo['url']) ?: ''
        : null;
?>

<div data-module="page-scroll">
    <a
        class="skip_link"
        id="skip_to_content"
        href="#main_content"
    >Skip to Main Content</a>
</div>

<header
    class="header"
    data-module="header"
    <?php if ($is_hero): ?>
        data-hero="true"
        data-transparent="true"
    <?php endif ?>
>
    <div class="header__row">
        <?php if ($logo_svg): ?>
            <a
                class="header__logo"
                href="<?php echo home_url() ?>"
                aria-label="Cornell Tech Logo"
            >
                <?php
                    $logo_svg = preg_replace('/((?:fill|stroke)=".+?")/', '', $logo_svg);
                    echo $logo_svg;
                ?>
            </a>
        <?php endif ?>
        <div class="header__row-inner">
            <?php if (has_nav_menu('header-primary')) : ?>
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-primary',
                        'container' => 'nav',
                        'container_class' => 'header__nav',
                        'menu_class' => 'header__menu',
                        'walker' => new CRN_Mega_Menu('desktop')
                    ));
                ?>
            <?php endif; ?>
            <?php
                $visit_us = get_field('visit_us_button', 'option') ?: [];

                $visit_button = $visit_us['url'] && $visit_us['title']
                    ? '<a class="button header__button-visit" href="'
                        . $visit_us['url'] . '">'
                        . translate($visit_us['title'], 'crn') . '</a>'
                    : '';

                echo $visit_button;
            ?>
            <?php
                $search_form_id = 'header__search-form';
            ?>
            <button
                class="header__button-search"
                title="<?php _e('Search', 'crn'); ?>"
                aria-controls="<?php echo $search_form_id ?>"
                aria-expanded="false"
                aria-label="Click to toggle Search Form"
                data-module="toggle-class"
                data-toggle-class='{"class": "is-active", "removeClass": "slideout-activate", "removeClassTarget": "body", "target": ".search-form--header"}'
            >
                <span class="icon-search header__search-icon"></span>
            </button>
            <?php
                the_module('search-form', [
                    'class' => 'search-form--header header__search-form',
                    'id' => $search_form_id
                ]);

                $slideout_id = 'slideout';

                the_module('nav-trigger', [
                    'class' => 'nav-trigger--header header__button-toggle',
                    'data_action' => 'data-slideout-toggle data-remove-class="is-active" data-remove-class-target=".search-form--header"',
                    'controls' => $slideout_id
                ]);
            ?>
        </div>
    </div>
    <?php
        the_module('slideout', [
            'id' => $slideout_id,
            'visit_button' => $visit_button
        ]);
    ?>
</header>
