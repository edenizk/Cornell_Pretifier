<?php
    preg_match('/src="(.+?)"/', $video, $matches);

    $matches = $matches ?: [];

    $src = count($matches)
        ? $matches[1]
        : null;

    $video = $src
        ? parse_video_uri($src)
        : [];
?>

<section
    class="hero-video"
    data-module="hero-video"
    role="banner"
    aria-label="<?php echo
        (empty($title)
            ? __('Hero', 'crn')
            : $title) ?>"
>
    <div class="hero-video__wrapper js-hero-wrapper">
        <div class="hero-video__background js-background">
            <?php
                the_module('image', array(
                    'class' => 'hero-video__image',
                    'id' => empty($image['ID'])
                        ? false
                        : $image['ID'],
                    'size' => 'large',
                    'cover' => true
                ));
            ?>
        </div>
        <?php if (!empty($video)) : ?>
            <div class="hero-video__iframe js-iframe">
                <div
                    class="js-video"
                    data-id="<?php echo $video['id']; ?>"
                    data-type="<?php echo $video['type']; ?>"
                ></div>
            </div>
        <?php endif; ?>
    </div>
    <div class="hero-video__content js-hero-content">
        <div class="hero-video__container">
            <div class="hero-video__inner">
                <?php if (!empty($headline)): ?>
                    <h1
                        class="hero-video-title hero-video__headline"
                    ><?php echo $headline; ?></h1>
                <?php endif; ?>
                <?php if (!empty($description)): ?>
                    <p
                        class="hero-video-description hero-video__description"
                    ><?php echo $description; ?></p>
                <?php endif; ?>
            </div>
            <button
                class="hero-video__control icon-pause js-hero-control"
                aria-label="<?php echo __('Play/Pause Video', 'crn'); ?>"
            ></button>
            <button
                class="hero-video__trigger icon-angle-down js-hero-trigger"
                aria-label="Scroll to content"
            ></button>
        </div>
    </div>
</section>
