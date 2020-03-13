<?php
if( empty($cta_link) ) {
    $cta_link = '';
}
?>
<?php if( !empty($title) || !empty($description) ) : ?>
    <article class="card-fifth<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
        <a class="card-fifth__inner" href="<?php echo $cta_link; ?>"<?php if ($target_blank) : ?> target="_blank"<?php endif; ?>>
            <?php if( !empty($title) && !empty($description) ) : ?>
                <div class="card-fifth__content">
                    <div class="card-fifth__content-inner">
                        <?php if( !empty($title) ) : ?>
                            <h3 class="sub-title-2 card-fifth__title"><?php echo $title; ?></h3>
                        <?php endif; ?>
                        <?php if( !empty($description) ) : ?>
                            <div class="p card-fifth__description"><?php echo $description; ?></div>
                        <?php endif; ?>
                    </div>
                    <?php if( !empty($cta_text) ) : ?>
                        <div class="card-fifth__footer">
                            <p class="button-link card-fifth__cta-link"><?php echo $cta_text; ?><span class="icon-arrow"></span></p>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </a>
    </article>
<?php endif; ?>
