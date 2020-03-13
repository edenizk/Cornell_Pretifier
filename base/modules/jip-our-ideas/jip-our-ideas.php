<?php if (!empty($list)) : ?>
    <div class="jip-our-ideas">
        <div class="jip-our-ideas__wrapper">
            <div class="jip-container jip-our-ideas__container">
                <div class="jip-our-ideas__inner">
                    <?php if (!empty($title)) {
                        the_module('jip-header-section', array(
                            'title' => $title,
                            'class' => 'jip-our-ideas__header',
                            'description' => $description
                        ));
                    } ?>
                    <div class="carousel jip-our-ideas__list js-our-ideas<?php echo (count($list) < 4) ? ' jip-our-ideas__list--hide-button' : ''; ?>" data-module="carousel" data-carousel='{"cellAlign": "left", <?php echo (count($list) >= 4) ? '"groupCells": true, "items": 4,' : ''; ?> "contain": true}'>
                        <?php $i = 0; foreach ($list as $key => $item) { $i++;
                            $item_class = ($i == count($list) && $i < 4) ? 'jip-our-ideas-item--last' : '';
                            $item['class'] = $item_class;
                            the_module('jip-our-ideas-item', $item);
                        } ?>
                    </div>
                    <?php if (!empty($button)) : ?>
                        <div class="jip-our-programs__button-wrap">
                            <?php the_module('jip-button', array(
                                'text' => esc_html( $button['title'] ),
                                'link' => $button['url'],
                                'class' => 'jip-our-programs__button'
                            )); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
