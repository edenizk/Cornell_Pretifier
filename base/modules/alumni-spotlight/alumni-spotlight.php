<section class="alumni-spotlight" aria-label="<?= empty($headline) ? __('Alumni Spotlight', 'crn') : $headline; ?>">
    <div class="container">
        <div class="alumni-spotlight__inner">
            <div class="alumni-spotlight__body">
                <blockquote class="alumni-spotlight__quote">
                    <div class="alumni-spotlight__quote-header">
                        <?php the_module('image', array(
                            'class' => 'alumni-spotlight__quote-image',
                            'id' => $image,
                            'cover' => true
                        )); ?>
                        <?php if( !empty($headline) || !empty($name) ) : ?>
                            <div class="home-alumni-label alumni-spotlight__quote-label">
                                <?php if ( ! empty( $headline ) ): ?>
                                    <span><?php echo $headline; ?></span>
                                <?php endif; ?>
                                <?php if ( ! empty( $name ) ): ?>
                                    <cite><?php echo $name; ?></cite>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if( !empty($quote) ) : ?>
                        <div class="home-alumni-quote-content alumni-spotlight__quote-content">
                            <?php echo $quote; ?>
                        </div>
                    <?php endif; ?>
                    <?php if( !empty($cta_text) && !empty($cta_link) ) : ?>
                        <div class="alumni-spotlight__quote-cta">
                            <a class="button-link button-link--has-underline sub-heading alumni-spotlight__quote-cta-link" href="<?php echo $cta_link; ?>">
                                <span class="text"><?php echo $cta_text; ?></span>
                                <span class="icon-arrow"></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </blockquote>
                <!-- Program show on mobile -->
                <?php if( !empty($program) ) : ?>
                    <div class="alumni-spotlight__program alumni-spotlight__program--mobile">
                        <p class="home-alumni-label alumni-spotlight__program-label"><?php echo $program['label']; ?></p>
                        <?php the_module('image', array(
                            'class' => 'alumni-spotlight__program-image',
                            'id' => $program['image'],
                            'cover' => true
                        )); ?>
                        <h2 class="main-heading alumni-spotlight__program-title">
                            <a href="<?php echo $program['link']?>" class="alumni-spotlight__program-link">
                                <span><?php echo $program['title']; ?></span>
                                <span class="icon-arrow label-text alumni-spotlight__icon"></span>
                            </a>
                        </h2>
                    </div>
                <?php endif; ?>
                <!-- End program show on mobile -->
                <?php if( !empty($stats) ) : ?>
                    <div class="alumni-spotlight__stat grid">
                        <?php foreach($stats as $stat) : ?>
                            <div class="grid__item alumni-spotlight__stat-block">
                                <div class="home-alumni-stat-quantity alumni-spotlight__stat-quantity">
                                    <?php echo $stat['number']; ?>
                                </div>
                                <div class="home-alumni-stat-description alumni-spotlight__stat-description">
                                    <?php echo $stat['description']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Program show on desktop -->
            <?php if( !empty($program) ) : ?>
                <div class="alumni-spotlight__program alumni-spotlight__program--desktop">
                    <p class="home-alumni-label alumni-spotlight__program-label"><?php echo $program['label']; ?></p>
                    <?php the_module('image', array(
                        'class' => 'alumni-spotlight__program-image',
                        'id' => $program['image'],
                        'cover' => true
                    )); ?>
                    <h2 class="main-heading alumni-spotlight__program-title">
                        <a href="<?php echo $program['link']?>" class="link-hover main-heading alumni-spotlight__program-link">
                            <span><?php echo $program['title']; ?></span>
                            <span class="icon-arrow label-text alumni-spotlight__icon"></span>
                        </a>
                    </h2>
                </div>
            <?php endif; ?>
            <!-- End program show on desktop -->
        </div>
    </div>
</section>
