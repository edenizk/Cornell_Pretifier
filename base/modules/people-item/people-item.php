<?php
    $external = isset($external) ? $external : false;
?>
<div class="people-item<?php echo !empty( $class ) ? ' '.$class : ''; ?>">
    <div class="people-item__inner">
        <?php if( !empty($image) ) : ?>
            <div class="people-item__avatar">
                <?php if( !empty($cta_link) ) : ?>
                    <a href="<?php echo $cta_link; ?>" class="people-item__avatar-link"<?php if ($external) : ?> target="_blank"<?php endif; ?>>
                <?php endif; ?>
                <?php
                    the_module('image', array(
                        'class' => 'people-item__image',
                        'id' => $image,
                        'cover' => true
                    ));
                ?>
                <?php if( !empty($cta_link) ) : ?>
                    <?php echo cd_getHiddenTitle($name); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="people-item__content">
            <div class="people-item__content-inner">
                <?php if ( !empty( $name ) ) : ?><p class="sub-title-2 people-item__name"><?php echo $name; ?></p><?php endif; ?>
                <?php if ( !empty( $position ) ) : ?><p class="p people-item__position"><?php echo $position; ?></p><?php endif; ?>
                <?php if( !empty($description) ) : ?>
                    <div class="wysiwyg people-item__description"><?php echo $description; ?></div>
                <?php endif; ?>
                <?php if ( !empty( $cta_text ) ) : ?>
                    <?php
                        $cta_text = cd_genericLinkTextFix($cta_text, $name);
                    ?>
                    <a
                        href="<?php echo !empty( $cta_link ) ? $cta_link : ''; ?>"
                        class="button-link people-item__link<?php echo !empty( $cta_class) ? ' '.$cta_class : ''; ?>"
                        <?php if ($external) : ?>target="_blank"<?php endif; ?>
                    >
                        <?php echo $cta_text; ?>
                        <span class="<?php if ($external) : ?>icon-external<?php else: ?>icon-arrow<?php endif; ?>"></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
