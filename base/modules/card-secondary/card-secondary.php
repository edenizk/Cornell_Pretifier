<article class="card-secondary<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
    <div class="card-secondary__inner">
        <?php if( !empty($title) && !empty($description) ) : ?>
            <div class="card-secondary__content">
                <?php if( !empty($title) ) : ?>
                    <h3 class="card-secondary__title"><?php echo $title; ?></h3>
                <?php endif; ?>
                <?php if( !empty($description) ) : ?>
                    <div class="card-secondary__description"><?php echo $description; ?></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if( !empty($cta_text) && !empty($cta_link) ) : ?>
            <div class="card-secondary__footer">
                <a class="button" href="<?php echo $cta_link; ?>"><span><?php echo $cta_text; ?></span></a>
            </div>
        <?php endif; ?>
    </div>
</article>
