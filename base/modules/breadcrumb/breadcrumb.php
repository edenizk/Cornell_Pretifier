<?php if ( !empty($breadcrumb) ) : ?>
    <ul class="breadcrumb<?php if ( !empty( $class ) ) echo ' ' . $class; ?>">
        <?php foreach ($breadcrumb as $breadcrumb_item) : ?>
            <li class="breadcrumb__item"><a class="label-text breadcrumb__link" href="<?php echo $breadcrumb_item['permalink'] ?>"><?php echo $breadcrumb_item['title']; ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
