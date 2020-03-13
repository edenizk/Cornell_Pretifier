<?php
    $Filter = new Filter();
?>
<div class="company-detail section-gutter">
    <div class="company-detail__inner">
        <div class="container">
            <?php
                $breadcrumbs = crn_get_companies_breadcrumb_list();
                the_module('breadcrumb', array(
                    'class' => 'breadcrumb--company-detail',
                    'breadcrumb' => $breadcrumbs
                ));
            ?>
            <h2 class="main-heading company-detail__title"><?php echo $title; ?></h2>
            <div class="grid">
                <div class="grid__item company-detail__block company-detail__block--left">
                    <div class="company-detail__image-wrapper">
                        <?php
                        the_module('image', array(
                            'class' => 'company-detail__image',
                            'id' => get_post_thumbnail_id($post_id),
                            'size' => 'large',
                            'contain' => true
                        ));
                        ?>
                    </div>
                    <span class="p company-detail__meta"><?php echo $Filter->current_taxonomies($post_id, false); ?></span>
                </div>
                <div class="grid__item company-detail__block company-detail__block--middle">
                    <div class="company-detail__wysiwyg wysiwyg">
                        <?php echo $content; ?>
                    </div>
                    <?php if (!empty($link)) : ?>
                        <a href="<?php echo $link ?>" class="button button--small company-detail__button"<?php if(isset($link_open_new_window) && $link_open_new_window) : ?> target="_blank"<?php endif; ?>><?php printf('Visit %s', $title); ?></a>
                    <?php endif; ?>
                </div>
                <div class="grid__item company-detail__block company-detail__block--right">
                    <?php if (!empty($location)) : ?>
                        <div class="company-detail__location">
                            <h3 class="label-text"><?php _e('Location', 'crn'); ?></h3>
                            <p class="company-detail__location-text"><?php echo $location; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($stage)) : ?>
                        <div class="company-detail__stage">
                            <h3 class="label-text"><?php _e('Stage', 'crn'); ?></h3>
                            <p class="company-detail__stage-text"><?php echo $stage; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
