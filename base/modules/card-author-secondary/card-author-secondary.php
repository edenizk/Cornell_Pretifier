<?php if( !empty($name) ) : ?>
    <div class="card-author card-author--secondary">
        <div class="card-author__inner">
            <div class="card-author__content">
                <?php the_module('image', array(
                    'id' => !empty($image) ? $image : crn_get_default_person_image(),
                    'class' => 'card-author__image-figure',
                    'cover' => true
                )); ?>
                <div class="card-author__info">
                    <h4 class="card-author-secondary-title card-author__name"><?php echo $name; ?></h4>
                    <?php if( !empty($title) ) : ?>
                        <p class="p card-author__title"><?php echo $title; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
