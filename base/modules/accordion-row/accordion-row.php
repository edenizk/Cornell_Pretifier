<?php if ( !empty($title) && !empty($description) ) : ?>
    <div class="accordion-row js-row<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
        <div class="accordion-row__inner">
            <p class="sub-heading accordion-row__title js-toggle">
                <?php echo $title; ?>
            </p>
            <div class="accordion-row__content js-content">
                <div class="accordion__wysiwyg wysiwyg">
                    <?php echo $description; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
