<?php if ( !empty($title) || !empty($description) ) : ?>
    <article class="card-tertiary<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
        <div class="card-tertiary__inner">
            <div class="card-tertiary__content">
                    <?php if( !empty($cat) ) : ?>
                        <div class="card-tertiary__cat">
                            <h3 class="label-text"><?php echo $cat; ?></h3>
                        </div>
                    <?php endif; ?>
                    <?php if( !empty($title) ) : ?>
                        <h3 class="main-heading card-tertiary__title"><?php echo $title; ?></h3>
                    <?php endif; ?>
                    <?php if( !empty($description) ) : ?>
                        <div class="p wysiwyg card-tertiary__description"><?php echo $description; ?></div>
                    <?php endif; ?>
                </div>
            <?php if( !empty($cta_text) && !empty($cta_link) ) : ?>
                <?php $cta_text = cd_genericLinkTextFix($cta_text, $title); ?>
                <div class="card-tertiary__footer">
                    <a class="button" href="<?php echo $cta_link; ?>"><span><?php echo $cta_text; ?></span></a>
                </div>
            <?php endif; ?>
        </div>
    </article>
<?php endif; ?>
