<?php if (!empty($title)) : ?>
    <div class="jip-header-section<?php if (!empty($class)) : echo ' '.$class; endif; ?>">
        <div class="jip-container jip-header-section__container">
            <h2 class="jip-title-text text-stroke jip-header-section__headline"><?php echo $title; ?></h2>
            <?php if (!empty($description)) : ?>
                <div class="jip-p jip-header-section__description"><?php echo $description; ?></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif;
