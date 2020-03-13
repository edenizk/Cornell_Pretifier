<div class="course-item<?php if ( !empty( $class ) ) echo ' ' . $class; ?><?php if( !empty($description) ) : ?> js-row<?php endif; ?>">
    <div class="course-item__inner">
        <?php if( !empty($title) ) : ?>
            <div class="course-item__header js-toggle">
                <?php if( !empty($id) && empty($version)) : ?>
                    <a class="course-item__anchor" id="<?php echo $id; ?>"></a>
                <?php endif; ?>
                <h3 class="sub-heading course-item__title"><?php echo $title; ?></h3>

                <?php if( empty($version) ) : ?>
                    <div class="course-item__code-credit">
                        <?php if( !empty($code) ) : ?>
                            <span class="label-text course-item__code"><?php echo $code; ?></span>
                        <?php endif; ?>
                        <?php if( !empty($credit) ) : ?>
                            <span class="label-text course-item__credit"><?php echo $credit; ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if( !empty($description) ) : ?><span class="icon-angle-down course-item__icon"></span><?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if( !empty($description) ) : ?>
            <div class="course-item__description js-content"><?php echo $description; ?></div>
        <?php endif; ?>
    </div>
</div>
