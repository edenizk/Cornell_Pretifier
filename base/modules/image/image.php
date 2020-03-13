<?php
$module = 'data-module="image"';
$custom_class = '';
$custom_class .= (empty($cover)) ? '' : ' image--cover';
$custom_class .= (empty($contain)) ? '' : ' image--contain';
$custom_class .= (empty($top)) ? '' : ' image--top';
$custom_class .=  (empty($class) ) ? '' : ' ' . $class;
$custom_class .= (empty($img_url)) ? '' : ' image--loaded';
$size = !empty($size) ? $size : 'full';
$sizes = !empty($sizes) ? $sizes : '';
if (!isset($use_srcset)) {
  $use_srcset = true;
}
$image_id = !empty($id) ? $id : crn_get_default_image();
$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
$alt = !empty($image_alt) ? $image_alt : '';
$alt = str_replace(["'", "\"", "&quot;"], "",htmlspecialchars($alt));

?>
<?php error_log($alt); ?>
<figure class="js-wrap image <?php echo $custom_class ?>" <?php echo $module; if( !empty($attributes) ) : echo ' ' .$attributes; endif; ?>>
<?php
if(empty($img_url)) {
    the_lazy_img($image_id, $size, 'image__img', $sizes, $alt, $use_srcset);
} else {
    echo '<img src="'.$img_url.'" data-normal="'.$img_url.'" class="image__img" alt="'.$alt.'">';
}

if (!empty($content)) {
    echo $content;
}
?>
</figure>
