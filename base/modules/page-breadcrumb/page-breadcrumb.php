<?php if (function_exists('yoast_breadcrumb') && empty(get_field('hide_breadcrumbs'))) :
    $options = get_option( 'wpseo_internallinks' );
    if ( $options['breadcrumbs-enable'] ) : ?>
    <div class="page-breadcrumb<?php if ( !empty( $class ) ) : echo ' ' . $class; endif; ?>">
        <div class="container container--xl page-breadcrumb__container">
            <div class="page-breadcrumb__inner">
                <?php yoast_breadcrumb(); ?>
            </div>
        </div>
    </div>
<?php endif; endif; ?>
