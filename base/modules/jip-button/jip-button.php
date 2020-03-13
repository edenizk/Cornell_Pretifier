<?php
$class = !empty($class) ? $class : '';
$attrs = !empty($attrs) ? $attrs : '';
$target = !empty($target) ? $target : '_self';
$tag = empty($link) ? 'button' : 'a';
$icon = !empty($icon) ? $icon : 'arrow-left';
$attrs = "";

if ( !empty($text) ) :
    if (!empty($link)) {
        $link = preg_replace('/^https*:\/\/tech\.cornell\.edu/', '', $link);
        // add aria-label, title and target attributes to <a> tag only
        $attrs = sprintf(' href="%s" title="%s" aria-label="%s" target="%s" %s',
            $link, $text, $text, $target, $attrs);
    } ?>
    <<?= $tag; ?>
    class="rel jip-button jip-label<?php if (!empty($class)) { echo ' ' . $class; } ?>"
    <?= $attrs; ?>
    ><?= $text; ?><span class="jip-button__icon"><?php echo _get_svg($icon); ?></span>
    </<?= $tag; ?>>
<?php endif; ?>
