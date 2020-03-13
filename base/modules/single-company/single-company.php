<?php if (!empty($company_id)) : ?>
    <div class="single-company<?php if ( !empty( $class ) ) : echo ' ' . $class; endif; ?>">
        <?php
            the_module('company-detail', array(
                'title' => get_the_title($company_id),
                'image' => get_post_thumbnail_id($company_id),
                'content' => get_post_field('post_content', $company_id),
                'link' => get_field('company_url', $company_id),
                'link_open_new_window' => get_field('company_url_new_window', $company_id),
                'location' => get_field('company_location', $company_id),
                'stage' => get_field('company_stage', $company_id)
            ));

            the_module('company-team', array(
                'title' => __('Team Members', 'crn'),
                'list' => crn_get_team_member($company_id)
            ));
        ?>
    </div>
<?php endif; ?>
