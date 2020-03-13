<?php if (!empty($list)) : ?>
    <div class="jip-our-programs<?php if ( !empty($class) ) : echo ' ' .$class; endif; ?>">
        <div class="jip-our-programs__wrapper">
            <?php if (!empty($title)) {
                the_module('jip-header-section', array(
                    'title' => $title,
                    'class' => 'jip-our-programs__header',
                    'description' => $description
                ));
            } ?>
            <div class="jip-our-programs__block">
                <div class="jip-container jip-our-programs__container">
                    <div class="jip-our-programs__inner">
                        <div class="jip-our-programs__list">
                            <?php foreach ($list as $item) {
                                the_module('jip-our-program-item', $item);
                            } ?>
                        </div>
                        <?php if ( !empty($footer_cta) || !empty($footer_content) ) : ?>
                            <div class="jip-our-programs__footer">
                                <div class="jip-our-programs__footer-inner">
                                    <?php if (!empty($footer_content) ) : ?>
                                        <p class="jip-p jip-our-programs__footer-description"><?php echo $footer_content; ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($footer_cta) ) : ?>
                                        <?php
                                        the_module('jip-button', array(
                                            'class' => 'jip-our-programs__footer-button',
                                            'text' => $footer_cta['title'],
                                            'link' => $footer_cta['url']
                                        ));
                                        ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if( ! empty( $wave ) ) {
        the_module( 'jip-wave');
    } ?>
<?php endif; ?>
