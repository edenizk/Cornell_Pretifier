<?php if(!empty($video)) : ?>
    <div class="video-modal js-overlay" id="<?php echo $modal_id; ?>" data-modal="<?php echo $modal_id; ?>" data-module="video-modal" role="dialog" aria-labelledby="trigger-<?php echo $modal_id; ?>">
        <div class="container video-modal__inner">
            <button class="video-modal__close js-close" aria-label="Close video" tabindex="0"><span class="icon-close"></span></button>
            <div class="video-modal__content" tabindex="1">
                <?php the_module('video', array(
                    'video' => $video
                )); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
