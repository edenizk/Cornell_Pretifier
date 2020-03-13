<?php if( !empty($list) ) : ?>
    <div class="program-list-v2<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
        <?php if( !empty($title) ) : ?>
            <h4 class="label-text program-list__title"><?php echo $title; ?></h4>
        <?php endif; ?>
        <ul class="program-list-v2__list">
            <?php foreach($list as $item) : ?>
                <li class="program-list-v2__item">
                    <span class="p title"><a class="heading-demi program-list-v2__anchor" href="#course-<?php echo empty($item['anchor_id']) ? '' : $item['anchor_id']; ?>"><?= $item['type'] ?></a></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
