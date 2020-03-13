<?php if ( !empty($list) ) : ?>
    <section class="section-gutter hero-grid" aria-label="<?= __('Content grid', 'crn'); ?>">
        <div class="container hero-grid__container">
            <?php if (!empty($title)) : ?>
                <h2 class="h2 hero-grid__title"><?php echo $title; ?></h2>
            <?php endif; ?>
            <div class="hero-grid__inner" data-module="carousel" data-initialize="true" data-carousel='{"cellAlign": "left", "contain": true, "prevNextButtons": false, "pageDots": true, "resize": true, "watchCSS": true}'>
                <?php foreach ($list as $item) : ?>
                    <div class="hero-grid__item">
                        <?php if ( !empty($item['image']) ):
                            the_module('image', array(
                                'class' => 'hero-grid__image',
                                'id' => $item['image'],
                                'cover' => true
                            ));
                        endif; ?>
                        <?php if ( !empty($item['label']) || !empty($item['title']) || !empty($item['description']) ): ?>
                            <div class="hero-grid__item-inner">
                                <div class="hero-grid__item-body">
                                    <?php if ( !empty($item['label']) ): ?>
                                        <p class="label-text hero-grid__item-label"><?php echo $item['label']; ?></p>
                                    <?php endif;?>
                                    <?php if ( !empty($item['title']) ): ?>
                                        <h3 class="sub-title-3 hero-grid__item-title"><?php echo $item['title']; ?></h3>
                                    <?php endif;?>
                                    <?php if ( !empty($item['description']) ): ?>
                                        <div class="p-small-2 hero-grid__item-description"><?php echo $item['description']; ?></div>
                                    <?php endif;?>
                                </div>
                                <?php if ( !empty($item['cta_text']) or !empty($item['cta_link']) ): ?>
                                    <a class="label-text hero-grid__item-link" href="<?php echo $item['cta_link']; ?>"><?php echo $item['cta_text']; ?></a>
                                <?php endif;?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
