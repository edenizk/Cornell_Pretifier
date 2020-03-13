<div class="tab-horizontal" data-module="tabs">
    <div class="tab-horizontal__wrapper">
        <div class="tab-horizontal__header-mobile js-modal-toggle">
            <div class="tab-horizontal__header-mobile-label" role="tablist">
                <?php foreach($list as $key=>$value) : ?>
                    <p class="home-tab-title tab-horizontal__header-title js-mobile-toggle" role="tab" data-color="<?php echo $value['color']; ?>" data-target="#tab-horizontal-<?php echo $key; ?>" aria-selected="false" aria-controls="tab-horizontal-<?php echo $key; ?>">
                        <?php echo $value['title']; ?>
                    </p>
                <?php endforeach; ?>
            </div>
            <span class="icon-triagle-down tab-horizontal__header-mobile-button"></span>
        </div>
        <div class="tab-horizontal__header js-header">
            <div class="tab-horizontal__control-button js-close">
                <span class="icon-close tab-horizontal__close-icon"></span>
            </div>
            <ul class="tab-horizontal__header-list">
                <?php $count = 0; ?>
                <?php foreach($list as $key=>$value) : ?>
                    <li class="tab-horizontal__header-item js-toggle" data-color="<?php echo $value['color']; ?>" data-target="#tab-horizontal-<?php echo $key; ?>">
                        <div class="home-tab-title tab-horizontal__header-link" role="tablist">
                            <a href="#tab-horizontal-<?php echo $key; ?>" class="home-tab-title tab-horizontal__header-title" role="tab" aria-selected="<?php echo ($count === 0) ? 'true' : 'false'; ?>" aria-controls="tab-horizontal-<?php echo $key; ?>">
                                <?php echo $value['title']; ?>
                                <span class="tab-horizontal__header-line"></span>
                            </a>
                        </div>
                    </li>
                <?php $count++; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="tab-horizontal__content js-content-list">
            <?php foreach($list as $key=>$value) : ?>
                <div class="home-tab-horizontal-description tab-horizontal__content-item js-content" id="tab-horizontal-<?php echo $key; ?>">
                    <?php echo $value['description']; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="tab-horizontal__list js-list">
            <span class="tab-horizontal__border js-border"></span>
            <?php
                foreach ($list as $key => $item):
                    the_module('theme-grid', array(
                        'block_news' => $item['block_news'],
                        'list' => $item['cards'],
                        'description' => $item['description'],
                        'id' => $key
                    ));
                endforeach;
            ?>
        </div>
    </div>
</div>
