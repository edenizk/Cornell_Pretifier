<?php
$empty_class = '';
if( empty($title) && empty($description) && empty($text) ) {
    $empty_class = ' card-video--empty-content';
}
?>
<?php if(!empty($video)) : ?>
    <?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
    <section class="section-gutter card-video<?php if(!empty($class) ) : echo ' ' . $class; endif;?><?php echo $empty_class; ?>">
        <div class="container card-video__container">
            <div class="card-video__inner">
                <div class="card-video__video">
                    <?php if( !empty($video) ) :
                        the_module('video', array(
                            'class' => 'card-video__image',
                            'video' => $video,
                            'image' => $image,
                            'title' => !empty($title) ? $title : ''
                        ));
                    endif; ?>
                </div>
                <?php if( !empty($title) || !empty($description) || !empty($text) ) : ?>
                    <div class="card-video__content">
                        <?php if( !empty($title) ) : ?>
                            <h2 class="h2 secondary-title card-video__title">
                                <?php echo $title; ?>
                            </h2>
                        <?php endif; ?>
                        <?php if( !empty($description) ) : ?>
                            <div class="card-video__description">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>
                        <?php if( !empty($cta_text) && !empty($cta_link) ) : ?>
                            <div class="card-video__cta">
                                <a class="button card-video__cta" href="<?php echo $cta_link; ?>">
                                    <?php echo $cta_text; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
