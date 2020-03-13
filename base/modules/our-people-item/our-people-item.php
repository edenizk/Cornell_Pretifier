<?php
$tag = 'div';
$href = '';
if (!empty($cta_url) && !empty($cta_text)) {
    $class .= 'our-people-item--cta';
}
if (!empty($image) && !empty($cta_url)) {
    $tag = 'a';
    $href = ' href="'.$cta_url.'"';
}
?>
<?php if (!empty($image) || !empty($cta_url)) : ?>
    <<?php echo $tag; ?> class="our-people-item<?php if (!empty($class)) : echo ' '.$class; endif; ?>"<?php echo $href; ?>>
        <?php if (!empty($cta_url) && !empty($cta_text)) : ?>
        <?php
        if (!empty($cta_background)) {
            the_module('image', array(
                'class' => 'our-people-item__image',
                'id' => $cta_background['ID'],
                'size' => 'large',
                'cover' => true
            ));
        }
        ?>
        <?php endif; ?>
        <div class="our-people-item__inner">
            <?php
                $id = uniqid();
                if (!empty($image)) :
                    the_module('image', array(
                        'class' => 'our-people-item__image',
                        'id' => $image['ID'],
                        'size' => 'large',
                        'cover' => true
                    ));
            ?>
                <figure class="our-people-item__image--grayscale js-image-grayscale">
                    <svg xmlns="http://www.w3.org/2000/svg" id="svgroot_<?= $id ?>" viewBox="0 0 0 0" width="100%" height="100%">
                        <defs>
                            <filter id="filtersPicture_<?= $id ?>">
                                <feComposite result="inputTo_38" in="SourceGraphic" in2="SourceGraphic" operator="arithmetic" k1="0" k2="1" k3="0" k4="0" />
                                <feColorMatrix id="filter_38_<?= $id ?>" type="saturate" values="0" data-filterid="38" />
                            </filter>
                        </defs>
                        <image filter="url(&quot;#filtersPicture_<?= $id ?>&quot;)" x="0" y="0" width="100%" height="100%" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $image['url'];?>" />
                    </svg>
                </figure>
            <?php
                endif
            ?>
            <?php if (!empty($title)) : ?>
                <h3 class="heading-demi jip-p our-people-item__title"><?php echo $title; ?></h3>
            <?php endif; ?>
            <?php if (!empty($cta_url) && !empty(!empty($cta_text))) : ?>
                <div class="our-people-item__cta">
                    <a href="<?php echo $cta_url; ?>" class="jip-link our-people-item__cta-link">
                        <?php echo $cta_text; ?>
                        <span class="our-people-item__cta-icon"></span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </<?php echo $tag; ?>>
<?php endif;
