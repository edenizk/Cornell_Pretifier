<div class="program-tab js-program-tab">
    <div class="program-tab__inner">
        <?php if( !empty($overview) || !empty($credit_list) ) : ?>
            <div class="program-tab__row">
                <?php if( !empty($overview) ) : ?>
                    <div class="program-tab__block program-tab__block--overview">
                        <h3 class="label-text"><?php _e('Program Overview', 'crn'); ?></h3>
                        <div class="program-tab__intro"><?php echo $overview; ?></div>
                    </div>
                <?php endif; ?>
                <?php if( !empty($credit_list) ) : ?>
                    <div class="program-tab__block program-tab__block--credit">
                        <?php the_module('program-list', array(
                            'title' => __('Credit Breakdown', 'crn'),
                            'list' => $credit_list
                        )); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="program-tab__row program-tab__row--secondary">
            <?php if( !empty($technical_courses) || !empty($program_courses) ) : ?>
                <div class="program-tab__block program-tab__block--half program-tab__block--first">
                    <?php if( !empty($technical_courses) ) :
                        the_module('program-list', array(
                            'title' => __('Technical Courses', 'crn'),
                            'description' => __('Your core technical curriculum', 'crn'),
                            'list' => $technical_courses
                        ));
                    elseif ( !empty($program_courses) ) :
                        the_module('program-list', array(
                            'title' => __('Program Courses', 'crn'),
                            'list' => $program_courses
                        ));
                    endif; ?>
                </div>
            <?php endif; ?>
            <div class="program-tab__block-divider"></div>
            <?php if( !empty($studio_courses) || !empty($event) ) : ?>
                <div class="program-tab__block program-tab__block--half program-tab__block--last">
                    <?php
                    if( !empty($studio_courses) ):
                        the_module('program-list', array(
                            'class' => 'program-list--secondary',
                            'title' => $program,
                            'description' => __('Classes taken with other Cornell Tech Masters students', 'crn'),
                            'list' => $studio_courses
                        ));
                    endif;
                    ?>
                    <?php if( !empty($event) ) : ?>
                        <div class="program-tab__event">
                            <div class="program-tab__event-inner">
                                <?php if( !empty($event['title'])) : ?>
                                    <h4 class="program-tab__event-title"><?php echo $event['title']; ?></h4>
                                <?php endif; ?>
                                <?php if( !empty($event['description'])) : ?>
                                    <div class="p-small-2 program-tab__event-description"><?php echo $event['description']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
