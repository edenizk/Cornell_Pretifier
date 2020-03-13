<div class="gallery-carousel-item js-item">
    <div class="gallery-carousel-item__inner">
        <?php the_module('image', array(
            'size' => 'large',
            'id' => $image,
            'cover' => true,
            'class' => 'gallery-carousel-item__image-figure'
        )); ?>
        <div class="gallery-carousel-item__content">
            <div class="home-gallery-order gallery-carousel-item__order">
                <?php echo $current.__(' OF ').$total ?>
            </div>
            <div class="home-gallery-description gallery-carousel-item__description">
                <?php echo $description; ?>
            </div>
        </div>
    </div>
</div>
