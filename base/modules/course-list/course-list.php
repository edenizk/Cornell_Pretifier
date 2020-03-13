<?php if( !empty($list) ) : ?>
    <section class="course-list<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" aria-label="<?= empty($title) ? __('Course List', 'crn') : $title; ?>">
        <div class="course-list__wrapper">
            <?php if( !empty($version && $version == 'v2') ) : ?>
                <?php if( !empty($title) || !empty($description) ) : ?>
                    <div class="course-list__header">
                        <?php if( !empty($title) ) : ?>
                            <h2 class="secondary-title course-list__title"><?php echo $title; ?></h2>
                        <?php endif; ?>
                        <?php if( !empty($description) ) : ?>
                            <div class="wysiwyg course-list__description"><?php echo $description; ?></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if( !empty($id) || !empty($course_name) || !empty($course_description) ) : ?>
                    <div class="course-list__course">
                        <?php if( !empty($id) ) : ?>
                            <a class="course-list__anchor" id="<?php echo $id; ?>"></a>
                        <?php endif; ?>
                        <?php if( !empty($course_name) ) : ?>
                            <h3 class="main-heading course-list__course-name"><?php echo $course_name; ?></h3>
                        <?php endif; ?>
                        <?php if( !empty($course_description) ) : ?>
                            <div class="course-list__course-description"><?php echo $course_description; ?></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php elseif( !empty($title) ) : ?>
                <h2 class="secondary-title section-title-gutter course-list__title"><?php echo $title; ?></h2>
            <?php endif; ?>
            <div class="course-list__list" data-module="accordion" data-accordion='{"activeClass": "course-item--active"}'>
                <?php
                foreach($list as $item) :
                    the_module('course-item', $item);
                endforeach;
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>
