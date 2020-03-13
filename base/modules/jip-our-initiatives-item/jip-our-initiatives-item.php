<div class="jip-our-initiatives-item">
    <div class="jip-our-initiatives-item__inner">
        <div class="jip-our-initiatives-item__grid grid">
            <?php if (!empty($image)) : ?>
                <div class="jip-our-initiatives-item__block jip-our-initiatives-item__block--left grid__item">
                    <div class="jip-our-initiatives-item__block-inner">
                        <?php the_module('image', array(
                            'class' => 'jip-our-initiatives-item__image',
                            'id' => $image,
                            'size' => 'large',
                            'cover' => true,
                        )); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (!empty($title) || !empty($description)) : ?>
                <div class="jip-our-initiatives-item__block jip-our-initiatives-item__block--right grid__item">
                    <div class="jip-our-initiatives-item__block-inner">
                        <?php if (!empty($title)) : ?>
                            <div class="jip-our-initiatives-item__heading">
                                <h4 class="jip-secondary-heading-medium jip-our-initiatives-item__title"><?php echo $title; ?></h4>
                                <?php if (!empty($cta_link) && $cta_target === '_blank') : ?>
                                    <a href="<?php echo $cta_link; ?>" class="jip-our-initiatives-item__icon-link" title="<?php echo $title; ?>" target="<?php echo $cta_target; ?>"><?php echo _get_svg('external-link'); ?></a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($description)) : ?>
                            <p class="jip-p jip-our-initiatives-item__description"><?php echo $description; ?></p>
                        <?php endif; ?>
                        <?php if (!empty($cta_link) && !empty($cta_text)) : ?>
                            <a href="<?php echo $cta_link; ?>" class="jip-link" title="<?php echo $cta_text; ?>" target="<?php echo $cta_target; ?>"><?php echo $cta_text; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
