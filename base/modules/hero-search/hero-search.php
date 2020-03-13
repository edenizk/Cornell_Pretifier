<section class="hero-search<?php if (!empty($class)) : echo ' ' . $class; endif; ?>" role="search" aria-label="<?= empty($title) ? __('Search', 'crn') : $title; ?>">
    <div class="container hero-search__container">
        <div class="hero-search__inner">
            <?php if (!empty($subtitle)) : ?>
                <p class="label-text hero-search__subtitle"><?php echo $subtitle; ?></p>
            <?php endif; ?>

            <?php if (!empty($title)) : ?>
                <h2 class="secondary-title hero-search__title"><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php the_module('search-form', array(
                'class' => 'search-form--results'
            )); ?>
        </div>
    </div>
</section>
