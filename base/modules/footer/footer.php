<?php
$exclude_icons       = array( 'envelope' );
$social_links        = crn_get_social_media_links( $exclude_icons );
$footer_address      = get_field( 'footer_address', 'option' );
$footer_copyright    = get_field( 'footer_copyright_text', 'option' );
$cornell_footer_logo = get_field( 'cornell_footer_logo', 'option' );
$cornell_footer_url = get_field( 'cornell_footer_url', 'option' );
$jacobs_footer_logo  = get_field( 'jacobs_footer_logo', 'option' );
$jacobs_footer_url  = get_field( 'jacobs_footer_url', 'option' );
$footer_menus = array(
    array(
        'id' => 'footer-about',
        'title' => __('About', 'crn')
    ),
    array(
        'id' => 'footer-discover',
        'title' => __('Discover', 'crn')
    ),
    array(
        'id' => 'footer-resources',
        'title' => __('Resources', 'crn')
    )
);
?>
<footer class="footer">
    <div class="footer__wrapper">
        <div class="container footer__container">
            <div class="footer__inner">
                <div class="footer__block-main">
                    <div class="footer__block-menu">
                        <?php
                        foreach($footer_menus as $menu) :
                            if( has_nav_menu($menu['id']) ) : ?>
                                <div class="footer__widget" id="<?php echo $menu['id']; ?>">
                                    <h4 class="label-text footer__widget-title" data-module="toggle-class" data-toggle-class='{"target": "#<?php echo $menu['id']; ?>", "class": "footer__widget--activate"}'><?php echo $menu['title'] ?><span class="icon-triagle-down footer__widget-icon"></span></h4>
                                    <?php wp_nav_menu(array(
                                        'theme_location' => $menu['id'],
                                        'container' => '',
                                        'menu_class' => 'footer__menu'
                                    )); ?>
                                </div>
                            <?php endif;
                        endforeach;
                        ?>
                    </div>
                    <div class="footer__block-newsletter">
                        <h4 class="label-text footer__widget-title"><?php _e('Connect with us', 'crn'); ?></h4>
                        <?php the_module('newsletter', array(
                            'class' => 'newsletter--footer',
                            'description' => __('Stay in the loop on all things Cornell Tech','crn')
                        )); ?>
                        <?php if (!empty($social_links)) : ?>
                            <div class="footer__block-social">
                                <?php the_module('social-links', array(
                                    'class' => 'social-links--footer',
                                    'list' => $social_links
                                )); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="footer__block-sponsors">
                    <div class="footer__logos">
                        <?php if ( !empty($cornell_footer_logo) ) : ?>
                                <a class="footer__logo-first"<?php if ( !empty($cornell_footer_url) ) : ?> href="<?php echo $cornell_footer_url; ?>"<?php endif;?> title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                                    <?php the_module('image', array(
                                        'id' => crn_get_acf_image_id($cornell_footer_logo),
                                        'alt' => crn_get_acf_image_alt($cornell_footer_logo),
                                        'class' => 'footer__logo-figure',
                                        'cover' => true,
                                        'size' => 'large'
                                    )); ?>
                                </a>
                            <?php endif;
                            if ( !empty($jacobs_footer_logo) ) : ?>
                                <a class="footer__logo-second"<?php if ( !empty($jacobs_footer_url) ) : ?> href="<?php echo $jacobs_footer_url; ?>"<?php endif;?> title="<?php echo esc_attr( __( 'The Jacobs Technion-Cornell Institute', 'crn' ) ); ?>">
                                    <?php the_module('image', array(
                                        'id' => crn_get_acf_image_id($jacobs_footer_logo),
                                        'alt' => crn_get_acf_image_alt($jacobs_footer_logo),
                                        'class' => 'footer__logo-figure',
                                        'cover' => true,
                                        'size' => 'large'
                                    )); ?>
                                </a>
                            <?php endif; ?>
                    </div>
                    <div class="footer__block-bottom">
                        <?php if( !empty($footer_address) ) : ?>
                            <p class="footer__address"><?php echo __($footer_address, 'crn')?></p>
                        <?php endif;?>
                        <?php if( !empty($footer_copyright) ) : ?>
                            <p class="footer__copyright"><?php echo $footer_copyright ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
