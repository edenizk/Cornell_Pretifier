<article class="card-sixth<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
    <div class="card-sixth__inner">
        <div class="card-sixth__mask"></div>
        <div class="card-sixth__block">
            <div class="card-sixth__image-inner">
                <?php
                    the_module('image', array(
                        'size' => 'large',
                        'id' => $image,
                        'cover' => true,
                        'class' => 'card-sixth__image-figure'
                    ));
                ?>
            </div>
            <?php if( !empty($title) || !empty($description) ) : ?>
                <div class="card-sixth__content">
                    <div class="card-sixth__content-inner">
                        <div class="card-sixth__content-left">
                            <?php
                                $cta_text = cd_genericLinkTextFix($cta_text, $title);
                            ?>
                            <?php if( !empty($title) ) : ?>
                                <h3 class="sub-heading card-sixth__title"><?php echo $title; ?></h3>
                            <?php endif; ?>
                            <?php if( !empty($subtitle) ) : ?>
                                <p class="p card-sixth__subtitle"><?php echo $subtitle; ?></p>
                            <?php endif; ?>
                            <?php if (!empty($cta_under_subtitle) && !empty($cta_text) && !empty($cta_link)) : ?>
                                <div class="card-sixth__footer card-sixth__footer--desktop">
                                    <a class="button-link" href="<?php echo $cta_link; ?>"><?php echo $cta_text; ?><span class="icon-arrow"></span></a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if( !empty($description) ) : ?>
                            <div class="p card-sixth__description wysiwyg"><?php echo $description; ?></div>
                        <?php endif; ?>
                    </div>
                    <?php if( !empty($cta_text) && !empty($cta_link) ) : ?>
                        <a class="button-link" href="<?php echo $cta_link; ?>"<?php if ($external) : ?> target="_blank"<?php endif; ?>>
                            <?php echo $cta_text; ?><?php if ($external) : ?> <span class="icon-external"><?php else: ?><span class="icon-arrow"><?php endif; ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</article>
