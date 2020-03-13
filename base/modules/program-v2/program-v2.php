<?php if( !empty($title) || !empty($program_description) || !empty($courseload) ) : ?>
    <div class="program-v2">
        <div class="program-v2__inner">
            <div class="program-v2__row">
                <?php if( !empty($title) || !empty($program_description) ) : ?>
                    <div class="program-v2__block program-v2__block--overview">
                        <?php if ( !empty( $title ) ) : ?>
                            <h3 class="main-heading program__title"><?= $title; ?></h3>
                        <?php endif; ?>
                        <?php if ( !empty( $program_overview ) ) : ?>
                            <h4 class="label-text program__overview"><?= $program_overview; ?></h4>
                        <?php endif; ?>
                        <?php if ( !empty( $program_description ) ) : ?>
                            <div class="program-v2__description"><?= $program_description; ?></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if( !empty($courseload) && ( !empty($title) || !empty($program_description) ) ) : ?>
                    <div class="program-v2__divider"></div>
                <?php endif; ?>
                <?php if( !empty($courseload) ) : ?>
                    <div class="program-v2__block program-v2__block--courseload">
                        <?php the_module('program-list-v2', array(
                            'title' => empty($courseload_title) ? '' : $courseload_title,
                            'list' => $courseload
                        )); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
