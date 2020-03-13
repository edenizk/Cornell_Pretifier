<?php if (!empty($list)) : ?>
    <section class="company-team section-gutter">
        <div class="company-team__inner">
            <div class="container">
                <h2 class="main-heading company-team__title"><?php echo $title; ?></h2>
                <div class="grid company-team__grid">
                    <?php foreach ($list as $item) : ?>
                        <div class="grid__item company-team-item">
                            <div class="company-team-item__inner">
                                <h4 class="sub-heading company-team-item__name"><?php echo $item['name']; ?></h4>
                                <p class="company-team-item__title"><?php echo $item['title']; ?></p>
                                <p class="company-team-item__program"><?php echo $item['program']; ?></p>
                                <?php if (!empty($item['text'])) : ?>
                                    <?php
                                        $title_text = cd_getHiddenTitle($item['name']);
                                    ?>
                                    <a class="button-link" href="<?php echo $item['link']; ?>">
                                        <span><?php echo $item['text']; ?></span>
                                        <?php echo $title_text; ?>
                                        <span class="icon-arrow"></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
