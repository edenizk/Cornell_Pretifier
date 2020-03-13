<?php
global $post;
$default_content = $post->post_content;
if( !empty($default_content) || !empty($content) ) : ?>
<?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
<div class="content section-gutter<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>" <?php if( !empty($title) ): ?> role="contentinfo" aria-label="<?= $title; ?>"<?php endif; ?>>
    <div class="container">
        <div class="content__wysiwyg wysiwyg">
            <?php if ( !empty($title) ) : ?>
                <h2 class="secondary-title content__headline"><?php echo $title; ?></h2>
            <?php endif; ?>
            <div class="content__wysiwyg-inner">
                <?php
                if( !empty($content) && $enable_default_content == false ) :
                    echo do_shortcode($content);
                elseif ( !empty($default_content) ) :
                    the_content();
                endif; ?>
            </div>
        </div>
        <?php if ( !empty($cta_text) && !empty($cta_link) ) : ?>
            <a href="<?php echo $cta_link; ?>" class="button-link content__link"><?php echo $cta_text; ?></a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
