<?php
$sidebar_content = crn_get_event_details_sidebar();
if (!empty($sidebar_content['list'])) : ?>
    <aside class="event-details-sidebar<?php if (!empty($class)) : echo ' '.$class; endif; ?>">
        <div class="event-details-sidebar__container">
            <div class="event-details-sidebar__inner">
                <div class="event-details-sidebar__list">
                    <?php foreach ($sidebar_content['list'] as $item) : ?>
                        <div class="event-details-sidebar__item">
                            <?php if (!empty($item['title'])) : ?>
                                <h2 class="label-text event-details-sidebar__item-title"><?php echo $item['title']; ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($item['description'])) : ?>
                                <div class="event-details-sidebar__item-description">
                                    <span><?php echo $item['description']; ?></span>
                                    <?php if ( !empty($item['map_cta_text']) && !empty($item['map_cta_url']) ) : ?>
                                        <a href="<?php echo $item['map_cta_url']; ?>" title="<?php echo $item['map_cta_text']; ?>">(<?php echo $item['map_cta_text']; ?>)</a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="event-details-sidebar__footer">
                        <?php if (!empty($sidebar_content['button_text']) && !empty($sidebar_content['button_link']) ) : ?>
                            <a class="button event-details-sidebar__item-button" href="<?php echo $sidebar_content['button_link']; ?>"><?php echo $sidebar_content['button_text']; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </aside>
<?php endif; ?>
