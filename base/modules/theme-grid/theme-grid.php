<?php if (!empty($list)) : ?>
    <div class="theme-grid js-theme" data-theme="<?php echo $id; ?>">
        <div class="theme-grid__wrapper">
            <?php if(!empty($description)) : ?>
                <div class="theme-grid__item theme-grid__item--description ">
                    <?php echo $description; ?>
                </div>
            <?php endif; ?>
            <?php if(!empty($block_news)) : ?>
                <div class="theme-grid__block theme-grid__block-news">
                    <div class="theme-grid__item">
                        <div class="theme-grid__item-inner">
                            <?php
                                if (!empty($block_news['args']['tags'])):
                                    the_module('tag-row', array(
                                        'list' => $block_news['args']['tags']
                                    ));
                                endif;

                                the_module($block_news['module'],
                                    $block_news['args']);
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="theme-grid__block theme-grid__block-program">
                <?php foreach($list as $item) : ?>
                    <div class="theme-grid__item">
                        <div class="theme-grid__item-inner">
                            <?php
                                if (!empty($item['args']['tags'])):
                                    the_module('tag-row', array(
                                        'list' => $item['args']['tags']
                                    ));
                                endif;
                                the_module($item['module'], $item['args']);
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
