<article class="event-intro<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
    <div class="grid event-intro__inner">
        <?php if( !empty($image) ) : ?>
            <div class="grid__item event-intro__image-inner">
                <?php
                    the_module('image', array(
                        'size' => 'large',
                        'id' => $image,
                        'cover' => true,
                        'class' => 'event-intro__image-figure'
                    ));
                ?>
            </div>
        <?php endif; ?>
        <div class="grid__item event-intro__content">
            <div class="event-intro__content-inner">
                <?php if ( !empty($sub_title) ) : ?>
                    <p class="label-text event-intro__sub-title"><?php echo $sub_title; ?></p>
                <?php endif; ?>
                <?php if ( !empty($title) ) : ?>
                    <h3 class="sub-heading event-intro__title">
                        <?php if ( !empty($link) ) : ?>
                            <a class="event-intro__link" href="<?php echo $link; ?>"<?php if ( $target_blank ) : ?> target="_blank"<?php endif; ?>><?php echo $title; ?></a>
                        <?php else: echo $title;
                        endif; ?>
                    </h3>
                <?php endif; ?>
                <?php if( !empty($description) ) : ?>
                    <div class="p-small-2 event-intro__description"><?php echo $description; ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>
