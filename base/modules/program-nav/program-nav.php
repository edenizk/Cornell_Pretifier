<?php if( !empty($list) ) : ?>
    <div class="program-nav" data-module="program-nav">
        <div class="program-nav__select-field">
            <div class="program-nav__select-current">
                <p class="program-nav__select-selection label-text js-current-select"><?php echo $list[0]; ?></p><span class="icon-triagle-down program-nav__select-icon"></span>
            </div>
            <div class="program-nav__list program-nav__list--mobile">
                <?php $uuid = wp_generate_uuid4(); ?>
                <label class='visually-hidden' for="<?php echo $uuid; ?>">Select an item</label>
                <select id="<?php echo $uuid; ?>"class="program-nav__select js-select">
                    <?php foreach($list as $index => $item) : ?>
                        <option <?php selected($index, 0); ?>><?php echo $item; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <ul class="program-nav__list program-nav__list--desktop">
                <?php foreach($list as $index => $item) : ?>
                    <li class="sub-heading program-nav__item js-nav-list<?php if($index === 0 ) : ?> program-nav__item--active<?php endif; ?>" class="js-nav-list"><?php echo $item; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
