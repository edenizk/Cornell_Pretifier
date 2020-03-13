<article class="card-primary<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
    <div class="card-primary__inner">
        <div class="card-primary__image-inner">
            <?php the_module('image', array(
                'size' => 'large',
                'id' => $image,
                'cover' => true,
                'class' => 'card-primary__image-figure'
            )); ?>
        </div>
        <?php if( !empty($title) && !empty($description) ) : ?>
            <div class="card-primary__content">
                <div class="card-primary__content-inner">
                    <?php if( !empty($title) ) : ?>
                        <h3 class="sub-heading card-primary__title"><?php echo $title; ?></h3>
                    <?php endif; ?>
                    <?php if( !empty($description) ) : ?>
                        <div class="p card-primary__description"><?php echo $description; ?></div>
                    <?php endif; ?>
                </div>
                <?php if( !empty($cta_text) && !empty($cta_link) ) : ?>
                    <?php
                        $cta_text = cd_genericLinkTextFix($cta_text, $title);
                    ?>
                    <div class="card-primary__footer">
                        <a class="button-link" href="<?php echo $cta_link; ?>"><span><?php echo $cta_text; ?></span><span class="icon-arrow"></span></a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</article>
