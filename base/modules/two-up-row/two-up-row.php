<div class="two-up-row <?php echo $class; ?>" <?php echo (!empty($term_id)) ? 'data-post="'.$term_id.'"' : ''; ?>>
    <div class="two-up-row__inner">
        <div class="two-up-row__image">
            <?php
            the_module('image', array(
                'size' => 'large',
                'id' => $image,
                'cover' => true,
                'class' => 'two-up-row__image-figure'
            ));
            ?>
        </div>
        <div class="two-up-row__content">
            <div class="two-up-row__content-inner">
                <?php
                the_module('card-tertiary', array(
                    'cat' => $cat,
                    'title' => $title,
                    'description' => $description,
                    'cta_link' => $cta_link,
                    'cta_text' => $cta_text
                ));
                ?>
            </div>
        </div>
    </div>
</div>
