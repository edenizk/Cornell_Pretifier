<?php if (!empty($list)) : ?>
    <?php
        if (!empty($anchor_link)):
            the_module('section-anchor', array('anchor_link' => $anchor_link));
        endif;
    ?>
    <section
        class="news-card<?php
            if (!empty($class))
                echo ' ' . $class; ?>"
    >
        <div class="news-card__wrapper">
            <?php
                $container_class = ($container_class ?: '');
            ?>
            <div
                class="container<?php
                    echo $container_class
                        ? ' ' . trim($container_class)
                        : '' ?>"
            >
                <?php if (!empty($headline)): ?>
                    <div class="news-card__header">
                        <h2 class="secondary-title"><?php echo $headline; ?></h2>
                    </div>
                <?php endif; ?>
                <?php if (!empty($list) ) : ?>
                    <div class="news-card__block">
                        <div
                            class="grid news-card__grid carousel js-news-card card-fourth--news-card carousel--visible carousel--adaptive-height"
                            data-module="carousel"
                            data-carousel='{"contain": true, "cellAlign": "left", "pageDots": true, "prevNextButtons": true, "groupCells": true, "adaptiveHeight": true}'>
                            <?php
                                foreach($list as $item):
                                    $class = ' grid__item card-fourth__item';
                                    if (isset($item['args'])):
                                        $item['args']['class']
                                            = isset($item['args']['class'])
                                                ? $item['args']['class'].$class
                                                : $class;
                                    endif;
                                    the_module($item['module'], $item['args']);
                                endforeach;
                            ?>
                        </div>
                        <?php if(!empty($bottom_text)): ?>
                            <div class="home-tag-row-label news-card__bottom-text">
                                <?php echo $bottom_text; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
