<?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
<section class="section-gutter client-logos<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" aria-label="<?= empty($title) ? __('Grid of images', 'crn') : $title; ?>">
    <div class="container">
        <div class="client-logos__inner">
            <?php if( !empty($title) || !empty($list) ) : ?>
                <div class="client-logos__content">
                    <div class="client-logos__content-inner">
                        <?php if( !empty($title) ) : ?>
                            <h3 class="secondary-title client-logos__title section-title-gutter"><?php echo $title; ?></h3>
                        <?php endif; ?>
                        <?php if( !empty($list) ) : ?>
                            <ul class="grid client-logos__list">
                                <?php foreach($list as $item) : ?>
                                    <li class="client-logos__item grid__item">
                                        <?php
                                        the_module('image', array(
                                            'class' => 'client-logos__image',
                                            'id' => $item['image'],
                                            'size' => 'large',
                                            'contain' => true
                                        ));
                                        ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
