<div class="card-seventh<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
    <div class="card-seventh__inner">
        <?php if ( !empty($stat_number) ) : ?>
            <div class="secondary-title card-seventh__shape"><span class="card-seventh__stat"><?php echo $stat_number; ?></span></div>
        <?php endif; ?>
        <?php
        if ( !empty($image) ) {
            the_module( 'image', array(
                'size'  => 'large',
                'id'    => $image,
                'cover' => true,
                'class' => 'card-seventh__shape card-seventh__shape--image'
            ) );
        }
        ?>
        <div class="card-seventh__content">
            <?php if ( !empty($title) ) : ?>
                <h3 class="sub-heading card-seventh__title"><?php echo $title; ?></h3>
            <?php endif; ?>
            <?php if ( !empty($description) ) : ?>
                <div class="card-seventh-description card-seventh__description"><?php echo $description; ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>
