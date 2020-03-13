<section class="theme-block">
    <div class="theme-block__container">
        <?php if (!empty($headline)): ?>
            <h2
                class="home-tag-row-label theme-block__headline"
            ><?php echo $headline; ?></h2>
        <?php endif; ?>
        <div class="theme-block__wrapper">
            <?php
                if (!empty($list)):
                    the_module('tab-horizontal', array(
                        'headline' => $headline,
                        'list' => $list
                    ));
                endif;
            ?>
        </div>
    </div>
</section>
