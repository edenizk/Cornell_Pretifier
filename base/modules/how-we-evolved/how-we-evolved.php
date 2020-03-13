<?php if ( ! empty( $content ) ) : ?>
    <section class="how-we-evolved<?php if ( ! empty( $class ) ) { echo ' ' . $class; } ?>">
        <div class="how-we-evolved__wrapper">
            <div class="jip-container how-we-evolved__container">
                <div class="how-we-evolved__inner">
                    <div class="grid how-we-evolved__grid">
                        <div class="grid__item how-we-evolved__grid-item how-we-evolved__grid-item--left">
                            <?php if ( ! empty( $title ) ) : ?>
                                <h2 class="jip-title-text text-stroke how-we-evolved__title"><?php echo esc_html( $title ); ?></h2>
                            <?php endif; ?>
                            <div class="wysiwyg how-we-evolved__content"><?php echo $content; ?></div>
                        </div>

                        <?php if ( ! empty( $right_images ) ) : ?>
                            <div class="grid__item how-we-evolved__grid-item how-we-evolved__grid-item--right">
                                <ul class="how-we-evolved__images">
                                    <?php foreach ( $right_images as $image ) : ?>
                                        <li class="how-we-evolved__image">
                                            <?php if (!empty($image['link'])) : ?><a class="how-we-evolved__image-link" href="<?php echo esc_url( $image['link'] ); ?>"><?php endif ?>
                                                <?php the_module( 'image', array(
                                                    'id' => $image['image'],
                                                    'size'  => 'large',
                                                    'cover' => true,
                                                    'class' => 'how-we-evolved__image-figure'
                                                ) ); ?>
                                            <?php if (!empty($image['link'])) : ?></a><?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
