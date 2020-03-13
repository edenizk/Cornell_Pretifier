<div class="card-tenth">
    <div class="card-tenth__wrapper">
        <?php the_module('image', array(
            'id' => $image,
            'class' => 'card-tenth__image-figure',
            'cover' => true,
            'size' => 'large'
        )); ?>
        <div class="card-tenth__block">
            <div class="card-tenth__inner">
                <?php if(!empty($logo)) : ?>
                    <div class="card-tenth__logo-wrapper">
                        <?php the_module('image', array(
                            'id' => $logo,
                            'class' => 'card-tenth__logo',
                            'size' => 'large',
                            'contain' => true
                        )); ?>
                    </div>
                <?php endif; ?>
                <a class="card-tenth__link" href="<?php echo $link; ?>">
                    <span class="link-wrap">
                        <span class="text"><?php echo $title; ?></span>
                    </span>
                    <span class="icon-arrow"></span>
                </a>
            </div>
        </div>
    </div>
</div>
