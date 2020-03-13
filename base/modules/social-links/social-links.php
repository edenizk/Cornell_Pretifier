<?php if( !empty($list) ) : ?>
    <ul class="social-links<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>">
        <?php foreach($list as $item) : ?>
            <?php $social_link_text = (strpos($item['url'], '?') !== false) ? "See Article at ".$item['name'] : "'Follow on " . $item['name']; ?>
            <li class="social-links__item">
                <a class="social-links__link"
                    href="<?php echo $item['url']; ?>"
                    target="_blank"
                    title="<?php echo $item['name']; ?>"
                    >
                    <span class="icon-<?php echo $item['name']; ?>"></span>
                    <span class="visually-hidden"><?php echo $social_link_text; ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
