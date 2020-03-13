<?php if(!empty($video)) :
    // function str_replace_first($from, $to, $content)
    // {
    //     $from = '/'.preg_quote($from, '/').'/';
    //     return preg_replace($from, $to, $content, 1);
    // }
    $video_id = uniqid('video-');
    $video_embed = str_replace('<iframe', '<iframe id="' . $video_id . '"', $video);
    $video_embed = str_replace('feature=oembed', 'enablejsapi=1', $video_embed);
    $video_embed = str_replace( 'frameborder="0"', 'title="Video"', $video_embed );
    $modal_data = !empty($modal) ? ' data-modal="'.$modal.'"' : '';
    ?>
    <div class="video js-video"<?php if( !empty($video_id) ) : ?> data-video-iframe="<?php echo $video_id; ?>" data-module="video"<?php endif; ?><?php echo $modal_data; ?>>
        <div class="video__inner">
            <?php
                if( isset($image) ) {
                    the_module('image', array(
                        'size' => 'large',
                        'id' => $image,
                        'cover' => true,
                        'class' => 'video__image js-video-image'
                    ));
                }
            ?>
            <button class="video__control js-control" tabindex="0" aria-label="<?php echo __('Play video', 'crn'); ?> <?php echo isset($title) ? $title : ''; ?>"></button>
            <div class="video__frame" tabindex="-1"><?php echo $video_embed; ?></div>
        </div>
        <div class="icon-play video__button">
            <span class="video__inner"></span>
        </div>
    </div>
<?php endif; ?>
