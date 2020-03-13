<?php
    $unique_id = esc_attr(uniqid('search-form-' ));
?>

<form
    <?php if ($id ?: ''): ?>
        id="<?php echo $id ?>"
    <?php endif ?>
    role="search"
    action="<?php echo esc_url( home_url( '/' ) ); ?>"
    method="get"
    class="search-form<?php if( !empty($class) ) : echo ' ' . $class; endif; ?>"
>
    <label for="<?php echo $unique_id; ?>" class="label-text search-form__label">
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'cornell-tech' ); ?></span>
    </label>
    <input type="search" id="<?php echo $unique_id; ?>" class="p search-field" placeholder="<?php echo esc_attr_x( 'Enter your search', 'placeholder', 'cornell-tech' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    <button
        type="submit"
        class="search-submit"
        aria-label="Submit Search"
        title="<?php echo _x( 'Search', 'submit button', 'cornell-tech' ); ?>"
    >
        <span class="icon-arrow search-submit-icon"></span>
    </button>
</form>
