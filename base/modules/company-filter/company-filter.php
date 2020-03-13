<?php if (!empty($taxonomies)) :
    $new_layout = isset($new_layout) ? $new_layout : false; ?>
    <section
        class="company-filter<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>"
        aria-label="<?= empty($headline) ? __('Company Filter', 'crn') : $headline; ?>"
        data-module="company-filter"
        data-company-filter='{"new_layout": <?php echo $new_layout; ?>}'
    >
        <div class="container company-filter__container">
            <?php if( !empty($headline) ) : ?>
                <div class="company-filter__header">
                    <h2 class="secondary-title"><?php echo $headline; ?></h2>
                </div>
            <?php endif; ?>
            <div class="company-filter__wrapper js-company-filter-wrapper">
                <h4 class="company-filter__label sub-heading js-company-filter-label"><?php echo empty($label) ? _e('Refine By:', 'crn') : $label; ?></h4>
                <div class="company-filter__inner js-company-filter-inner">
                    <?php if ( !empty($wrapper) ) : ?>
                        <div class="company-filter__buttons<?php if (is_user_logged_in()) : ?> company-filter__buttons--has-copy<?php endif; ?>">
                            <a href="<?php the_permalink(); ?>" class="button button--small js-company-filter-reset company-filter__reset<?php if ($has_filter) : ?> company-filter__reset--active<?php endif; ?>"><?php _e('Reset', 'crn'); ?></a>
                        </div>
                    <?php else : ?>
                        <button class="company-filter__toggle js-block-toggle" aria-label="<?php _e('Toggle visible filter', 'cornell-tech'); ?>">
                            <span class="icon-up-down"></span>
                        </button>
                    <?php endif; ?>

                    <div class="company-filter__block js-block-content<?php if ($has_filter) : ?> company-filter__block--active<?php endif; ?>">
                        <div class="company-filter-list">
                            <div class="company-filter-list__inner">
                                <?php
                                the_module('accordion', array(
                                    'class' => 'accordion--company-filter',
                                    'taxonomies' => $taxonomies,
                                    'list' => $build_filter
                                ));
                                ?>
                            </div>
                        </div>

                        <?php if ($post_type === 'events') : ?>
                            <div class="company-filter-list__past-event">
                                <div class="company-filter-list__past-event-inner">
                                    <div class="sub-heading company-filter-list__past-event-title js-filter-past-event">
                                        <label class="company-filter-list__check-item<?php if ($has_filter) : ?> clicked<?php endif; ?>">
                                            <input class="js-company-filter-checkbox" type="checkbox" value="past-event" data-group="past-event" data-text="<?php echo _e('Past Event', 'crn')?>" <?php if ($has_filter) : ?>checked="checked"<?php endif; ?>/>
                                            <span><?php echo _e('View past Events', 'crn'); ?></span>
                                            <span class="icon-arrow"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (empty($wrapper) ) : ?>
                            <div class="company-filter__footer js-content<?php if ($has_filter) : ?> is-active<?php endif; ?>">
                                <div class="company-filter__footer-inner">
                                    <div class="company-filter-keys<?php if ($has_filter) : ?> company-filter-keys--active<?php endif; ?> js-filter-key-wrapper">
                                        <p class="p company-filter-keys__label"><?php _e('Showing results containing', 'crn'); ?></p>
                                        <?php echo $build_filter_list; ?>
                                    </div>
                                    <div class="company-filter__buttons<?php if (is_user_logged_in()) : ?> company-filter__buttons--has-copy<?php endif; ?>">
                                        <a href="<?php the_permalink(); ?>" class="js-company-filter-reset company-filter__reset<?php if ($has_filter) : ?> company-filter__reset--active<?php endif; ?>"><?php _e('Reset', 'crn'); ?></a>
                                        <button class="button button--small company-filter__button js-company-filter-apply"><?php _e('APPLY FILTERS', 'crn'); ?></button>
                                        <?php if (is_user_logged_in()) : ?>
                                            <button class="button button--small company-filter__link-copy js-company-filter-copy"><span class="icon-copy-link"></span><span class="icon-check"></span></button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="company-filter__button-update">
                                <button class="button button--small company-filter__button js-company-filter-apply"><?php _e('Update Results', 'crn'); ?></button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
