<?php
    global $wp;
    $current_url = esc_url( get_permalink() );
?>
<ul class="sub-menu sub-menu--has-child" aria-hidden="true">
    <?php if ( ! empty( $sub_menu['columns'] ) ): ?>
        <?php foreach ( $sub_menu['columns'] as $index => $column ): ?>
            <?php if ( ! empty( $column['title'] ) ):
                $column_aria_label = !empty($column['aria-label']) ? $column['aria-label'] : $column['title'];
                ?>
                <li class="menu-item<?php if ( count( $column['group'] ) > 0 ): ?> menu-item-has-children<?php endif; ?>">
                <a href="#sub-menu-<?php echo sanitize_title($column['title']); ?>" aria-label="<?php echo $column_aria_label; ?>"><?php echo $column['title']; ?></a>
                <ul id="sub-menu-<?php echo sanitize_title($column['title']); ?>" class="sub-menu sub-menu--customize">
            <?php endif; ?>
            <?php if ( ! empty( $column['description'] ) ): ?>
                <li class="menu-item__description">
                    <div class="sub-menu__description">
                        <?php echo wpautop( $column['description'] ); ?>
                    </div>
                </li>
            <?php endif; ?>
            <?php if ( $column['group'] && count( $column['group'] ) > 0 ): ?>
                <?php foreach ( $column['group'] as $group ): ?>
                    <?php $class_current_group = ($group['title_link'] == $current_url) ? ' current-menu-item' : ''; ?>
                    <li class="menu-item<?php if ( ! empty( $group['links'] ) ): ?> menu-item-has-children<?php endif; ?><?php echo $class_current_group; ?>">
                        <?php if ( ! empty( $group['title'] ) ):
                            $group_aria_label = !empty($group['aria-label']) ? $group['aria-label'] : $group['title'];
                            ?>
                            <a href="<?php echo $group['title_link']; ?>" aria-label="<?php echo $group_aria_label; ?>">
                                <?php echo $group['title']; ?>
                            </a>
                            <?php if ( ! empty( $group['links'] ) ): ?>
                                <button class="menu-item-arrow js-submenu-toggle"></button>
                            <?php endif ?>
                        <?php endif; ?>
                        <?php if ( count( $group['links'] ) > 0 ): ?>
                            <ul <?php if ( ! empty( $group['title'] ) ): ?>class="sub-menu sub-menu--third-level"<?php endif; ?>>
                                <?php
                                foreach ( $group['links'] as $link ):
                                    if ( empty( $link['page'] ) ) {
                                        continue;
                                    }

                                    $url = get_permalink( $link['page']->ID );
                                    $label = empty( $link['label'] ) ? get_the_title( $link['page']->ID ) : $link['label'];
                                    $link_aria_label = !empty($link['aria-label']) ? $link['aria-label'] : $label;
                                    $class_current_page = ($url === $current_url) ? ' current-menu-item' : '';
                                    $link_aria_label = ($link_aria_label == "Learn More") ? $link_aria_label . " about " . $link['post_title'] : $link_aria_label;
                                    ?>
                                    <li class="menu-item menu-item--<?php echo $link['visibility']; ?><?php echo $class_current_page;?>"><a href="<?php echo esc_url( $url ); ?>" aria-label="<?php echo $link_aria_label; ?>"><?php echo esc_html( $label ); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if ( ! empty( $column['title'] ) ): ?>
                </ul>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
