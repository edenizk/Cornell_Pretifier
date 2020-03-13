<?php if (isset($enable) && $enable) : ?>
    <div class="section-gutter magnetic-link" data-module="magnetic-link">
        <div class="container magnetic-link__container">
            <div class="magnetic-link__wrapper" data-module="page-scroll">
                <div class="magnetic-link__close js-magnetic-link-close">
                    <span class="normal-bold icon-close magnetic-link__close-icon"></span>
                </div>
                <div class="magnetic-link__inner">
                    <?php if (!empty($title)) : ?>
                        <h3 class="sub-title-2 magnetic-link__title"><?php echo $title; ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($description)) : ?>
                        <p class="p magnetic-link__description"><?php echo $description; ?></p>
                    <?php endif; ?>
                    <?php if (!empty($cta_text) && !empty($cta_link)) : ?>
                        <?php $cta_text = cd_genericLinkTextFix($cta_text, $title); ?>
                        <a class="button-link magnetic-link__button" href="<?php echo strtolower($cta_link); ?>"><?php echo $cta_text; ?><span class="icon-arrow"></span></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
