<?php
$desktop_list = '';
$mobile_list = '';
$current_text = '';
$arrow_icon = '';
$link_target = '';

if( !empty($list) ) :
    foreach($list as $key => $item) {
        /**
         * Add active item class
         */
        $active = isset($item['active']) ? $item['active'] : false;
        if( $active ) {
            $current_text = $item['text'];
            $desktop_class = ' local-nav__menu-item--active';
        } else {
            $desktop_class = '';
        }
        /**
         * Add Apply Now link item
         */
        if( $key === count($list) - 1 && $has_apply_link ) {
            $desktop_class .= ' local-nav__menu-item--apply';
            $arrow_icon = '<span class="local-nav-label icon-arrow"></span>';
            if ($apply_button_open_in_new_tab) {
                $link_target = ' target="_blank"';
            }
        }
        $selected = ($key == 0) ? 'selected'  : '';
        $mobile_list .= '<option value="' . $item['url'] . '" ' . $selected . '>' . $item['text'] . '</option>';
        $desktop_list .= '<li class="button-link local-nav-label local-nav__menu-item js-toggle-item' . $desktop_class . '"><a href="' . $item['url'] . '" class="local-nav__link"' . $link_target . '>' . $item['text'] . '</a>' . $arrow_icon . '</li>';
    }
?>

<nav class="local-nav<?php if ( !empty( $class ) ) : echo ' ' . $class; endif; ?>" data-module="local-nav">
    <div class="container local-nav__container">
        <div class="local-nav__wrapper">
            <?php if(!empty($title)) : ?>
                <h2 class="h3 sub-title-2 local-nav__headline"><?php echo $title; ?></h2>
            <?php endif; ?>
            <div class="local-nav__menu js-local-nav__menu">
                <div class="local-nav__menu-current">
                    <p class="local-nav-label local-nav__menu-selection js-display"><?php echo $current_text; ?></p><span class="icon-triagle-down local-nav__menu-icon"></span>
                </div>
                <div class="local-nav__menu-mobile">
                    <select class="local-nav__menu-mobile--content js-select" aria-label="<?php echo esc_attr($title); ?>">
                        <?php echo $mobile_list; ?>
                    </select>
                </div>
                <div class="local-nav__menu-desktop">
                    <ul class="local-nav__menu-list js-menu">
                        <?php echo $desktop_list; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<?php endif;?>

