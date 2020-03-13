<?php
    if (empty($item)) return;
    $post_id = $item->ID;
    $filter = new Filter();
    $company_meta = $filter->current_taxonomies($post_id, false);
?>
<article class="company-list-item<?php if ( !empty( $class ) ) : echo ' ' . $class; endif; ?>" data-module="company-list-item">
    <div class="company-list-item__wrapper">
        <div class="company-list-item__container">
            <div class="company-list-item__inner">
                <div class="company-list-item__image-wrapper">
                    <?php
                    the_module('image', array(
                        'class' => 'company-list-item__image',
                        'id' => get_post_thumbnail_id($post_id),
                        'size' => 'large',
                        'contain' => true
                    ));
                    ?>
                </div>

                <div class="company-list-item__content-wrapper js-content-wrapper">
                    <div class="company-list-item__content js-content-inner">
                        <div class="company-list-item__content-inner">
                            <div class="company-list-item-description company-list-item__content-description">
                                <?php
                                $content = strip_tags(get_post_field('post_content', $post_id));
                                if (has_excerpt($post_id)) {
                                    $content = get_the_excerpt($post_id);
                                }
                                echo wp_trim_words($content, 8,  '&hellip;');
                                ?>
                            </div>

                            <div class="button-link company-list-item__button">
                                <a href="<?php echo get_permalink( $post_id ); ?>">
                                    <span><?php _e('Learn more', 'crn'); ?></span>
                                    <span class="icon-arrow"></span>
                                </a>
                            </div>
                            <?php if (!empty($company_meta)) : ?>
                                <div class="p company-list-item__meta company-list-item-meta company-list-item__meta--mobile">
                                    <span class="company-list-item__meta-icon"><?php echo _get_svg('tag'); ?></span>
                                    <span class="company-list-item__meta-tags"><?php echo $company_meta; ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if (!empty($company_meta)) : ?>
                    <div class="p company-list-item__meta company-list-item-meta company-list-item__meta--desktop">
                        <span class="company-list-item__meta-icon"><?php echo _get_svg('tag'); ?></span>
                        <span class="company-list-item__meta-tags"><?php echo $company_meta; ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>
