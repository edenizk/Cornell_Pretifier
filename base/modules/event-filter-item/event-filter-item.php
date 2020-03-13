<?php
if (empty($item)) return;
$post_id = $item->ID;
$filter = new Filter('events');
$event_meta = $filter->current_taxonomies($post_id, false);
$open_hour = get_field('open_hour', $post_id);
$close_hour = get_field('close_hour', $post_id);
$where = get_field('where', $post_id);

$when = get_field('date', $post_id, false);
$date = new DateTime($when);
$new_date = !empty($date) ? $date->format( 'D' ) : false;
$day_month = !empty($date) ? $date->format( 'm/d' ) : false;
?>
<?php if (!empty($item)) : ?>
    <div class="event-filter-item<?php if ( !empty( $class ) ) : echo ' ' . $class; endif; ?>">
        <div class="event-filter-item__inner">
            <div class="event-filter-item__image-wrapper">
                <?php if ( !empty($when) ) : ?>
                    <div class="date-label event-filter-item__date-label">
                        <span class="event-filter-item__day"><?php echo $new_date; ?></span>
                        <span class="event-filter-item__month"><?php echo $day_month; ?></span>
                    </div>
                <?php endif; ?>
                <a href="<?php echo get_the_permalink($post_id); ?>" title="<?php echo get_the_title($post_id); ?>">
                    <?php
                    the_module('image', array(
                        'class' => 'event-filter-item__image',
                        'id' => get_post_thumbnail_id($post_id),
                        'size' => 'large',
                        'cover' => true
                    ));
                    ?>
                </a>
            </div>

            <div class="event-filter-item__content-wrapper">
                <div class="event-filter-item__content-head">
                    <?php if (!empty($open_hour) && !empty($close_hour)) : ?>
                        <div class="p-small event-filter-item__open-close-hour event-filter-item-where-text"><?php echo $open_hour; ?> - <?php echo $close_hour; ?></div>
                    <?php endif; ?>
                    <?php if (!empty($where)) : ?>
                        <div class="p-small event-filter-item__where event-filter-item-where-text"><?php echo $where; ?></div>
                    <?php endif; ?>
                    <a class="sub-title-2 event-filter-item__title event-filter-item-title-text" href="<?php echo get_the_permalink($post_id); ?>">
                        <h3><?php echo get_the_title($post_id); ?></h3>
                    </a>
                </div>

                <?php if (!empty($event_meta)) : ?>
                    <div class="event-filter-item__content-bottom">
                        <span class="event-filter-item__meta-icon"><?php echo _get_svg('tag'); ?></span>
                        <span class="p-small event-filter-item__meta-tags event-filter-item-meta-tags-text"><?php echo $event_meta; ?></span>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
<?php endif; ?>
