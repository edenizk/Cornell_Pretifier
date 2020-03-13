<?php
    $wysiwyg_content = apply_filters('the_content', get_the_content());
?>
<section class="event-details section-gutter">
    <div class="event-details__wrapper">
        <div class="container event-details__container">
            <?php
            $post_id = get_the_ID();
            $filter = new Filter('events');
            $event_meta = $filter->current_taxonomies($post_id);
            $when = get_field('date', false, false);
            $date = new DateTime($when);
            $new_date = !empty($date) ? $date->format( 'D' ) : false;
            $day_month = !empty($date) ? $date->format( 'm/d' ) : false;

            the_module('event-card', array(
                'item' => array(
                    'day' => $new_date,
                    'month' => $day_month,
                    'image' => get_post_thumbnail_id(),
                    'title' => get_the_title(),
                    'sub_title' => $event_meta
                )
            ));
            ?>
            <div class="event-details__inner">
                <div class="grid">
                    <div class="grid__item event-details__block-left">
                        <?php
                        the_module('event-details-sidebar', array(
                            'class' => 'event-details-sidebar--mobile'
                        ));

                        the_module('wysiwyg', array(
                            'class' => 'wysiwyg--event-details',
                            'content' => $wysiwyg_content
                        ));

                        the_module('speaker-bio', array(
                            'content' => get_field('speaker_bio')
                        ));
                        ?>
                    </div>
                    <div class="grid__item event-details__block-right">
                        <?php the_module('event-details-sidebar', array(
                            'class' => 'event-details-sidebar--desktop'
                        )); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
