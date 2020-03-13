<article class="card-event<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
    <div class="card-event__inner">
        <?php if ( !empty($sub_title) ) : ?>
            <p class="label-text card-event__sub-title"><?php echo $sub_title; ?></p>
        <?php endif; ?>
        <?php if ( !empty($title) ) : ?>
            <h4 class="sub-heading card-event__title">
                <?php if ( !empty($link) ) : ?>
                    <a class="card-event__link" href="<?php echo $link; ?>"<?php if ( $target_blank ) : ?> target="_blank"<?php endif; ?>><?php echo $title; ?></a>
                <?php else: echo $title;
                endif; ?>
            </h4>
        <?php endif; ?>
    </div>
</article>
