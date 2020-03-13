<?php if ( !empty($item) ) : ?>
    <div class="event-card">
        <div class="event-card__image-wrapper">
            <?php if ( !empty($item['day']) && !empty($item['month']) ) : ?>
                <div class="date-label event-card__date event-filter-item__date-label">
                    <span class="event-filter-item__day"><?php echo $item['day']; ?></span>
                    <span class="event-filter-item__month"><?php echo $item['month']; ?></span>
                </div>
            <?php endif; ?>
            <?php
                the_module('image', array(
                    'class' => 'event-card__image',
                    'id' => $item['image'],
                    'size' => 'large',
                    'cover' => true
                ));
            ?>
        </div>
        <div class="event-card__detail">
            <?php if ( !empty($item['title']) ) : ?>
                <h2 class="secondary-title event-card__title"><?php echo $item['title']; ?></h2>
            <?php endif; ?>
            <?php if ( !empty($item['sub_title']) ) : ?>
                <div class="p event-card__sub-title"><?php echo $item['sub_title']; ?></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
