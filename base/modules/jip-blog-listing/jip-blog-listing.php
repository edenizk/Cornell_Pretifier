<?php
    $limit = 9;
    if (!empty($posts)) :
?>
    <section class="jip-blog-listing" data-module="jip-blog-listing">
        <div class="jip-blog-listing__wrapper">
            <div class="<?php echo (!empty($width_extended)) ? 'jip-container ' : 'container '; ?>jip-blog-listing__container">
                <div class="grid jip-blog-listing__posts">
                    <?php foreach ($posts as $index => $post) {
                        $class = 'grid__item js-item jip-our-ideas-item--blog-listing jip-blog-listing__post';
                        $class .= ($index + 1 > $limit) ? ' hide' : '';
                        $post['class'] = $class;
                        the_module('jip-our-ideas-item', $post);
                    } ?>
                </div>
                <?php if (count($posts) > $limit) : ?>
                    <div class="jip-blog-listing__button-wrap">
                        <a class="button jip-blog-listing__button js-button" href="#">
                            <span><?php _e('Load more stories', 'cornell-tech'); ?></span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
