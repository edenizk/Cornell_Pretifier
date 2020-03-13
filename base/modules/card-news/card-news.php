<?php
    $target_link = '';
    if (!empty($external_url)) {
        $target_link = 'target="_blank" ';
        $link = $external_url;
    }
?>
<article class="card-news<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
    <div class="card-news__inner">
        <div class="card-news__image-inner">
            <?php if( !empty($link) ) : ?>
                <a <?php echo $target_link; ?>class="button-link card-news__image-cta" href="<?php echo $link; ?>" title="<?php echo esc_attr($title); ?>">
            <?php endif;?>
            <?php
            the_module('image', array(
                'size' => 'large',
                'id' => $image,
                'cover' => true,
                'class' => 'card-news__image-figure'
            ));
            ?>
            <?php if( !empty($link) ) : ?>
                </a>
            <?php endif;?>
        </div>
        <div class="card-news__block-content">
            <?php if ( !empty($sub_title) ) : ?>
                <p class="label-text card-news__sub-title"><?php echo $sub_title; ?></p>
            <?php endif; ?>
            <?php if ( !empty($title) ) : ?>
                <h4 class="card-news__title">
                    <a <?php echo $target_link; ?>class="main-heading card-news__link" href="<?php echo $link; ?>"><?php echo $title; ?></a>
                </h4>
            <?php endif; ?>
            <?php if( !empty($link) && !empty($cta_text) ) : ?>
                <div class="card-news__footer">
                    <?php
                        $cta_text = cd_genericLinkTextFix($cta_text, $title);
                    ?>
                    <a <?php echo $target_link; ?>class="button-link" href="<?php echo $link; ?>">
                        <span><?php echo $cta_text; ?></span>
                        <?php if (!empty($external_url)) : ?> <span class="icon-external"><?php else: ?><span class="icon-arrow"><?php endif; ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</article>
