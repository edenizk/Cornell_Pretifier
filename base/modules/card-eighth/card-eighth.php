<?php
$card_tag = 'div';
$card_href = '';
if( !empty($cta_link) ) {
    $card_tag = 'a';
    $card_href = ' href="' . $cta_link . '"';
    if ($target_blank) {
        $card_href .= ' target="_blank"';
    }
}
?>
<div class="card-eighth<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
    <<?php echo $card_tag . $card_href;?> class="card-eighth__inner">
        <?php
        the_module('image', array(
            'size' => 'large',
            'id' => $image,
            'cover' => true,
            'class' => 'image--absolute card-eighth__image-figure'
        ));
        ?>
        <div class="card-eighth__block">
            <div class="card-eighth__block-inner">
                <?php if( !empty($title) ) : ?>
                    <h3 class="main-heading card-eighth__title"><?php echo $title; ?></h3>
                <?php endif; ?>
                <?php if( !empty($description) ) : ?>
                    <div class="p card-eighth__description"><?php echo $description; ?></div>
                <?php endif; ?>
                <?php if( !empty($cta_text) && !empty($cta_link) ) : ?>
                    <div class="card-eighth__footer">
                        <p class="button-link-white card-eighth__cta"><?php echo $cta_text; ?><span class="icon-arrow"></span></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </<?php echo $card_tag; ?>>
</div>
