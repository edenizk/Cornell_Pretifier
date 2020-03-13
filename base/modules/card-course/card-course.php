<div class="card-course">
    <div class="card-course__wrapper">
        <div class="card-course__left-block">
            <div class="card-course__block card-course__block--header">
                <?php if( !empty($subtitle) ) : ?><p class="feature-label card-course__subtitle"><?php echo $subtitle; ?></p><?php endif; ?>
                <?php if ( ! empty( $title ) ): ?>
                    <h3 class="main-heading card-course__headline"><?php echo $title; ?></h3>
                <?php endif ?>
                <?php if( !empty($tag) ) : ?><p class="card-course__credit"><?php echo $tag; ?></p><?php endif; ?>
            </div>
            <?php if( !empty($description) ) : ?>
                <div class="card-course-secondary-description card-course__block card-course__block--description"><?php echo $description; ?></div>
            <?php endif; ?>
        </div>
        <?php if( !empty($teacher_name) || !empty($teacher_title) || !empty($teacher_image) ) : ?>
            <div class="card-course__right-block">
                <?php the_module('card-author-secondary', array(
                    'name' => $teacher_name,
                    'title' => $teacher_title,
                    'image' => $teacher_image
                )); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
