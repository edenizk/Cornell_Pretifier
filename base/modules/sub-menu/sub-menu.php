<div class="sub-menu" aria-hidden="true">
    <?php if ( ! empty( $sub_menu['columns'] ) ): ?>
        <?php
        foreach ( $sub_menu['columns'] as $index => $column ):
            if ( count( $sub_menu['columns'] ) > 1 ) {
                $class = ( $index === 0 ) ? 'sub-menu__left' : 'sub-menu__right';
            } else {
                $class = 'sub-menu__main';
            }
            ?>
            <div class="<?php echo $class; ?>">
                <?php if ( ! empty( $column['title'] ) ):
                    $column_aria_label = !empty($column['aria-label']) ? $column['aria-label'] : $column['title'];
                    ?>
                    <h4 class="label-text">
                        <?php if ( ! empty($column['title_link'] ) ) : ?><a href="<?php echo $column['title_link']; ?>" aria-label="<?php echo $column_aria_label; ?>" class="sub-menu__title-link"><?php endif; ?>
                            <?php echo $column['title']; ?>
                        <?php if ( ! empty($column['title_link'] ) ) : ?> <span class="icon-arrow"></span></a><?php endif; ?>
                    </h4>
                <?php endif; ?>

                <?php if ( ! empty( $column['description'] ) ): ?>
                    <div class="sub-menu__description">
                        <?php echo wpautop( $column['description'] ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( ! empty( $column['group'] ) ): ?>
                    <?php foreach ( $column['group'] as $group ): ?>
                        <?php if ( ! empty( $group['title'] ) ):
                            $group_aria_label = !empty($group['aria-label']) ? $group['aria-label'] : $group['title'];
                            ?>
              <h4 class="label-text">
                  <?php if ( ! empty($group['title_link'] ) ) : ?><a href="<?php echo $group['title_link']; ?>" aria-label="<?php echo $group_aria_label; ?>" class="sub-menu__title-link"><?php endif; ?>
                      <?php echo $group['title']; ?>
                  <?php if ( ! empty($group['title_link'] ) ) : ?> <span class="icon-arrow"></span></a><?php endif; ?>
              </h4>
                        <?php endif; ?>
                        <?php if ( ! empty( $group['links'] ) ): ?>
              <ul>
                                <?php
                                foreach ( $group['links'] as $link ):
                                    if ( empty( $link['page'] ) ) {
                                        continue;
                                    }
                                    $url = get_permalink( $link['page']->ID );
                                    $label = empty( $link['label'] ) ? get_the_title( $link['page']->ID ) : $link['label'];
                                    $link_aria_label = !empty($link['aria-label']) ? $link['aria-label'] : $label;
                                    $link_aria_label = ($link_aria_label == "Learn More") ? $link_aria_label . " about " . $link['post_title'] : $link_aria_label;
                                    ?>
                                    <li class="menu-item menu-item--<?php echo $link['visibility']; ?>"><a href="<?php echo esc_url( $url ); ?>" aria-label="<?php echo $link_aria_label; ?>"><?php echo esc_html( $label ); ?></a></li>
                <?php endforeach; ?>
              </ul>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
