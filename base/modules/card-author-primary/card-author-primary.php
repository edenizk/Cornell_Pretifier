<?php if( !empty($name) ) : ?>
    <div class="card-author card-author--primary">
        <div class="card-author__inner">
            <?php if( !empty($background) ) : ?>
                <?php the_module('image', array(
                    'id' => $background,
                    'class' => 'card-author__background-image',
                    'cover' => true
                )); ?>
            <?php else : ?>
                <div class="card-author__background js-background"></div>
            <?php endif; ?>
            <div class="card-author__content">
                <?php the_module('image', array(
                    'id' => !empty($image) ? $image : crn_get_default_person_image(),
                    'class' => 'card-author__image-figure',
                    'cover' => true
                )); ?>
                <div class="card-author__cta">
                    <?php
                    $link_before = '';
                    $link_after = '';
                    if (!empty($link)) :
                        $link_before = '<a class="button-link-white card-author__link"';
                        $link_before .= ' href="' . $link . '"';
                        $link_before .= !empty( $external_link ) ? ' target="_blank"' : '';
                        $link_before .= '>';
                        $link_after = '<span class="icon-arrow"></span></a>';
                    endif; ?>
                    <?php echo $link_before; ?>
                    <div class="link-wrap">
                        <?php if( !empty($name) ) : ?>
                            <h4 class="home-card-author-name card-author__name"><span><?php echo $name; ?></span></h4>
                        <?php endif; ?>
                        <?php if( !empty($title) ) : ?>
                            <p class="p-large card-author__title"><span><?php echo $title; ?></span></p>
                        <?php endif; ?>
                    </div>
                    <?php echo $link_after; ?>
                </div>
                <?php echo (!empty($after)) ? $after : ''; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
