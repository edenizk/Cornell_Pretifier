<?php if( !empty($quote) ) :
    $modal_id = $video_url ? uniqid() : '';
    ?>
<?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
<section class="section-gutter quote-module" role="contentinfo" aria-label="<?= __('Quote', 'crn'); ?>">
    <div class="container quote-module__container">
        <div class="quote-module__content">
            <div class="quote-module__inner">
                <?php if( !empty($quote) ) : ?>
                <div class="quote-module__text">
                    <span class="icon-quote"></span>
                    <div class="quote-text"><?php echo $quote; ?></div>
                </div>
                <?php endif; ?>
                <?php if( !empty($teacher_name) || !empty($teacher_title) ) : ?>
                    <div class="quote-module__author">
                        <?php the_module('quote-author', array(
                            'name' => $teacher_name,
                            'title' => $teacher_title,
                            'image' => $teacher_image,
                            'video_url' => $video_url,
                            'cta_text' => $cta_text,
                            'modal_id' => $modal_id
                        )); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php
    if(!empty($video_url)) :
        the_module('video-modal', array(
            'video' => $video_url,
            'modal_id' => $modal_id
        ));
    endif;
?>
<?php endif; ?>
