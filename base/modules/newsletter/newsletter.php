<div class="newsletter">
    <div class="newsletter__wrapper">
        <div class="newsletter__block newsletter__block--input-group gravity-form gravity-form--newsletter">
            <?php
            $form_id = get_field('newsletter_form_id', 'option');
            if ( ! empty( $form_id ) && function_exists('gravity_form') ) {
                gravity_form($form_id, false, false, false, null, true, 0, true);
            }
            ?>
        </div>
    </div>
</div>
