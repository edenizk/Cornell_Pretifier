<?php
$separate_meta = __( ', ', 'crn' );

// Get Categories for posts.
$categories_list = get_the_category_list( $separate_meta );
?>

<article class="post">
  <main id="main_content" tabindex="-1">
    <?php
        the_module('hero-basic', array(
            'subtitle' => '<a href="/news">'.__('News').' / <time class="post__published" datetime="'.get_the_date( DATE_W3C ).'">'.get_the_date('F d Y').'</time></a>',
            'title' => get_the_title(),
            'link' => get_the_permalink(),
            'description' => __('Categories: ', 'cornell-tech') . $categories_list
        ));

        $media_feature = crn_get_single_media_feature();
        switch ($media_feature['type']) :
            case 'carousel':
        ?>
                <?php the_module($media_feature['type'], $media_feature); ?>
        <?php
            break;
            case 'video':
        ?>
            <section class="container section-gutter-media" role="banner" aria-label="<?php echo __('Hero video', 'crn'); ?>">
                <?php the_module($media_feature['type'], $media_feature); ?>
            </section>
        <?php
            break;
            case 'image':
        ?>
            <section class="container section-gutter-media" role="banner" aria-label="<?php echo __('Hero image', 'crn'); ?>">
                <?php the_module('image', $media_feature); ?>
            </section>
        <?php
        endswitch;

        $tags = get_the_terms(get_the_ID(), 'post_tag');
        crn_render_jacobs_institute_cta( $tags, 'jip-tag--single-post' );

        the_module('content', array(
            'content' => '',
            'class' => 'content--single-post',
            'enable_default_content' => true
        ));

        the_module('post-footer', array(
            'cta_link' => '/news/',
            'cta_text' => __('< Back to News', 'cornell-tech'),
            'show_socials' => true
        ));

        the_module('divider-line', array(
            'class' => 'divider-line--no-spacing-bottom'
        ));

        the_module('media-highlights', array(
            'headline' => __( 'Media Highlights', 'crn' ),
            'list' => crn_get_media_highlights_news(),
        ));

        $related_news_list = crn_get_related_posts_by_category();
        if (!empty($related_news_list)) {
            the_module('news-card', array(
                'headline' => __('RELATED STORIES', 'crn'),
                'class' => 'news-card--grey',
                'disable_link_all' => true,
                'item' => 2,
                'list' => $related_news_list
            ));
            foreach($related_news_list as $item) :
                if( !empty($item['args']['video']) ) :
                    the_module('video-modal', array(
                        'video' => $item['args']['video'],
                        'modal_id' => $item['args']['modal_id']
                    ));
                endif;
            endforeach;
        }
        ?>
  </main>
</article>
