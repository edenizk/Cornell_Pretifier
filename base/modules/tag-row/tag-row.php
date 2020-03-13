<?php if( !empty($list) ) : ?>
    <p class="tag-row">
        <?php foreach($list as $item) : ?>
            <?php if( !empty($item['name']) && !empty($item['link']) && $item['link'] != '#' ) : ?>
                <?php
                // Get the local url.
                $tag_path = str_replace(get_site_url(), "", $item['link'] );
                // Incase they are hard coded urls :(
                $tag_path = str_replace("https://tech.cornell.edu", "", $tag_path);
                // Seperate url params into readable text.
                $split_path = str_replace("/", " ", $tag_path);
                // Remove any tags from url.
                $clean_tag = trim(str_ireplace($item['name'],"",$split_path));
                // Build screen reader text.
                $sr_text = ( $clean_tag != "" ) ? "<span class='visually-hidden'> "  . $clean_tag ." </span> " : "";
                ?>
                <a class="home-tag-row-label link-hover" href="<?php echo $item['link']; ?>">
                    <?php echo $sr_text . $item['name']; ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </p>
<?php endif; ?>
