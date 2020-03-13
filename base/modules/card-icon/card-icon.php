<?php
    $card_tag = 'div';
    if(!empty($card_tag)) {
        $card_tag = 'a';
    }
?>
<?php if( !empty($title) || !empty($description) ) : ?>
    <div class="grid__item card-icon">
        <<?php echo $card_tag; ?><?php if(!empty($card_url)) : echo ' href="'.$card_url.'" '; endif; ?> class="card-icon__inner">
            <?php
            the_module('image', array(
                'id' => $image,
                'class' => 'card-icon__image-figure',
                'contain' => true,
                'size' => 'large'
            ));
            ?>
            <div class="card-icon__content">
                <?php if( !empty($title) ) : ?>
                    <h3 class="home-card-title link-hover card-icon__title"><?php echo $title; ?></h3>
                <?php endif; ?>
                <?php if( !empty($description) ) : ?>
                    <div class="p-small card-icon__description"><?php echo $description; ?></div>
                <?php endif; ?>
            </div>
        </<?php echo $card_tag; ?>>
    </div>
<?php endif; ?>
