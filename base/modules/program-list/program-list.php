<div class="program-list<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
    <?php if( !empty($title) ) : ?>
        <h4 class="label-text program-list__title"><?php echo $title; ?></h4>
    <?php endif; ?>
    <?php if( !empty($description) ) : ?>
        <div class="p-small-2 program-list__description"><?php echo $description; ?></div>
    <?php endif; ?>
    <?php if( !empty($list) ) : ?>
        <ul class="program-list__list">
            <?php foreach($list as $item) : ?>
                <li class="program-list__item">
                    <span class="p title"><?php echo $item['title']; ?></span>
                    <span class="p score"><?php echo $item['score']; ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
