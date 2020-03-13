<?php if( !empty($list) ) : ?>
    <div class="section-gutter hero-icons">
        <div class="container">
            <div class="hero-icons__list">
                <?php foreach($list as $item) : ?>
                    <div class="hero-icons__item">
                        <div class="hero-icons__item-inner">
                            <?php if( !empty($item['image'] ) ) : ?>
                                <?php the_module('image', array(
                                    'img_url' => $item['image'],
                                    'class' => 'hero-icons__image-figure',
                                    'size' => 'large',
                                    'contain' => true
                                )); ?>
                            <?php endif; ?>
                            <?php if( !empty($item['title']) || !empty($item['description']) ) : ?>
                                <div class="hero-icons__content">
                                    <?php if( !empty($item['title']) ) : ?>
                                        <h3 class="sub-title-2 heading-demi hero-icons__title"><?php echo $item['title']; ?></h3>
                                    <?php endif; ?>
                                    <?php if( !empty($item['description']) ) : ?>
                                        <div class="p hero-icons__description"><?php echo $item['description']; ?></div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
