<?php if( !empty($list) ) : ?>
    <div class="event-list<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
        <div class="grid event-list__content">
            <?php foreach ($list as $item) :
                the_module('card-event', $item);
            endforeach; ?>
        </div>
    </div>
<?php endif; ?>
