<?php
    $root_url = get_template_directory_uri().'/assets/img/';
    $background = $root_url.'bg-our-programs.png'
?>
<div class="jip-our-program-item" style="background-image: url('<?php echo $background; ?>')">
    <div class="jip-our-program-item__inner">
        <div class="jip-our-program-item__grid grid">
            <?php if (!empty($image)) : ?>
                <div class="jip-our-program-item__block jip-our-program-item__block--left grid__item">
                    <div class="jip-our-program-item__block-inner">
                        <?php the_module('image', array(
                            'class' => 'jip-our-program-item__image',
                            'id' => $image,
                            'size' => 'large',
                            'cover' => true
                        )); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ( !empty($title) || !empty($description) ) : ?>
                <div class="jip-our-program-item__block jip-our-program-item__block--right grid__item">
                    <div class="jip-our-program-item__block-inner">
                        <?php if (!empty($sub_title) && empty($cta_link)) : ?>
                            <h4 class="jip-label jip-our-program-item__subtitle"><?php echo $sub_title; ?></h4>
                        <?php endif; ?>
                        <?php if (!empty($title)) : ?>
                            <h3 class="jip-secondary-heading-medium jip-our-program-item__title"><?php echo $title; ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($description)) : ?>
                            <p class="jip-p jip-our-program-item__description"><?php echo $description; ?></p>
                        <?php endif; ?>
                        <?php if (!empty($cta_link) && !empty($cta_text)) {
                            the_module('jip-button', array(
                                'text' => esc_html( $cta_text ),
                                'link' => $cta_link,
                                'target' => $cta_target,
                                'class' => 'jip-our-program-item__button'
                            ));
                        } ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
