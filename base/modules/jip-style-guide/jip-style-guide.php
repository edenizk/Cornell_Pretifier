<section class="style-guide">
    <div class="style-guide__wrapper">
        <div class="style-guide__section style-guide__section--blue">
            <div class="container">
                <div class="style-guide__inner">
                    <div class="style-guide__intro">
                        <h2 class="jip-blue style-guide__section-title"><?php esc_html_e('Typography', 'cornell-tech'); ?></h2>
                    </div>
                    <h3 class="jip-blue style-guide__title">Desktop</h3>
                    <div class="style-guide__block">
                        <div class="style-guide__block-primary">
                            <div class="style-guide__group">
                                <h1 class="jip-main-heading text-stroke"><?php esc_html_e('Main Heading', 'cornell-tech'); ?></h1>
                                <span class="jip-blue style-guide__detail">DIN Demi / 50px / 3.3px character spacing / 59px line height / .7px border #FFFFFF / All Caps</span>
                            </div>

                            <div class="style-guide__group">
                                <h2 class="jip-secondary-heading-large"><?php esc_html_e('Secondary Heading Large', 'cornell-tech'); ?></h2>
                                <span class="jip-blue style-guide__detail">DIN Demi / 30px / 1.5px character spacing / 36px line height / All Caps</span>
                            </div>

                            <div class="style-guide__group">
                                <h2 class="jip-secondary-heading-medium"><?php esc_html_e('Secondary Heading Medium', 'cornell-tech'); ?></h2>
                                <span class="jip-blue style-guide__detail">DIN Demi / 23px / 1.53px character spacing / 33px line height / All Caps</span>
                            </div>

                            <div class="style-guide__group">
                                <h2 class="jip-secondary-heading"><?php esc_html_e('Secondary Heading', 'cornell-tech'); ?></h2>
                                <span class="jip-blue style-guide__detail">DIN Demi / 23px / 1.5px character spacing / 33px line height / All Caps</span>
                            </div>

                            <div class="style-guide__group">
                                <h3 class="jip-sub-heading"><?php esc_html_e('Sub Heading', 'cornell-tech'); ?></h3>
                                <span class="jip-blue style-guide__detail">DIN Demi / 19px / 1.2px character spacing / 29px line height / All Caps</span>
                            </div>

                            <div class="style-guide__group">
                                <h6 class="jip-label"><?php esc_html_e('LABEL', 'cornell-tech'); ?></h6>
                                <span class="jip-blue style-guide__detail">DIN Bold / 14px / 1.08px character spacing / 18px line height / All Caps</span>
                            </div>

                            <div class="style-guide__group">
                                <p class="jip-p-intro jip-p"><?php esc_html_e('Intro Paragraph text. This is an example of the Intro text that is to be used ONLY on the Who We Are page.', 'cornell-tech'); ?></p>
                                <span class="jip-blue style-guide__detail">Adelle PE Regular / 20px / 0px character spacing / 31px line height</span>
                            </div>

                            <div class="style-guide__group">
                                <p class="jip-p-large jip-p"><?php esc_html_e('Large Paragraph Text. This is an example of large paragraph text. Large Paragraph Text. This is an example of large paragraph text.', 'cornell-tech'); ?></p>
                                <span class="jip-blue style-guide__detail">DIN Demi / 16px / 0px character spacing / 24px line height</span>
                            </div>

                            <div class="style-guide__group">
                                <p class="jip-p"><?php esc_html_e('Paragraph Text. This is an example of paragraph text. This should be used for the primary paragraph text across the site.', 'cornell-tech'); ?></p>
                                <span
                                    class="jip-blue style-guide__detail">DIN Regular / 16px / 0px character spacing / 26px line height</span>
                            </div>

                            <div class="style-guide__group">
                                <p class="jip-block-quote"><?php esc_html_e('This is an example of the block quote text. This is only to be used for important quotes about Jacobs.', 'cornell-tech'); ?></p>
                                <span class="jip-blue style-guide__detail">Adelle PE Italics / 26px / 0px character spacing / 42px line height</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="style-guide__section">
            <div class="container">
                <div class="style-guide__intro">
                <h2 class="jip-pink style-guide__section-title"><?php esc_html_e('Color Palette', 'cornell-tech'); ?></h2>
                </div>
                <ul class="list--reset style-guide__colors">
                    <li class="style-guide__colors-item">
                        <div class="bg-jip-blue style-guide__colors-bg"></div>
                        <div class="style-guide__colors-content">
                            <h4 class="style-guide__colors-title">Jacobs Blue</h4>
                            <span class="style-guide__detail">#0033A0</span>
                        </div>
                    </li>

                    <li class="style-guide__colors-item">
                        <div class="bg-jip-white style-guide__colors-bg"></div>
                        <div class="style-guide__colors-content">
                            <h4 class="style-guide__colors-title">White</h4>
                            <span class="style-guide__detail">#FFFFFF</span>
                        </div>
                    </li>

                    <li class="style-guide__colors-item">
                        <div class="bg-jip-green style-guide__colors-bg"></div>
                        <div class="style-guide__colors-content">
                            <h4 class="style-guide__colors-title">Green</h4>
                            <span class="style-guide__detail">#C4D600</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="style-guide__section style-guide__section--blue">
            <div class="container">
                <div class="style-guide__intro">
                <h2 class="jip-blue style-guide__section-title"><?php esc_html_e('Buttons / UI Elements', 'cornell-tech'); ?></h2>
                </div>
                    <h3 class="jip-blue style-guide__title"><?php esc_html_e('Button', 'cornell-tech'); ?></h3>
                <div class="style-guide__group">
                    <div class="style-guide__row">
                        <div class="style-guide__row-inner style-guide__row-inner--button">
                            <div class="font-style-guide-box">
                                <?php
                                    the_module('jip-button', array(
                                        'text' => esc_html( 'Learn more', 'cornell-tech' ),
                                        'link' => '#'
                                    ));
                                ?>
                            </div>
                            <span class="jip-blue block font-style-guide">Button: #FFFFFF</span>
                            <span class="jip-blue block font-style-guide">Text: Label Style (see above)</span>
                            <span class="jip-blue block font-style-guide">Arrow: 1.5px border / #0033A0</span>
                        </div>

                        <div class="style-guide__row-inner style-guide__row-inner--button">
                            <div class="font-style-guide-box">
                                <?php
                                    the_module('jip-button', array(
                                        'text' => esc_html( 'Learn more', 'cornell-tech' ),
                                        'link' => '#',
                                        'class' => 'jip-button--hover',
                                        'icon' => 'arrow-left'
                                    ));
                                ?>
                            </div>
                            <h4 class="jip-blue style-guide__subtitle">Hover State</h4>
                            <span class="jip-blue block font-style-guide">Button moves up to reveal green “shadow” </span>
                            <span class="jip-blue block font-style-guide">background: #FFFFFF;</span>
                            <span class="jip-blue block font-style-guide">box-shadow: 4px 4px 0 0 #C7D41E;</span>
                        </div>
                    </div>
                </div>
                <h3 class="jip-blue style-guide__title"><?php esc_html_e('Carousel Indicators', 'cornell-tech'); ?></h3>
                <div class="style-guide__group">
                    <div class="style-guide__row">
                        <div class="style-guide__row-inner">
                            <div class="jip-carousel__wrap style-guide__carousel-wrap">
                                <div class="jip-carousel" data-module="carousel" data-carousel='{"contain": true, "cellAlign": "left", "pageDots": true, "prevNextButtons": true, "groupCells": true, "adaptiveHeight": true, "arrowShape": "M6.018 51.275l10.908 11.212-2.15 2.092L0 49.391 14.805 35l2.091 2.151L5.452 48.275h93.661v3H6.018z"}'>
                                    <div class="jip-carousel__item"></div>
                                    <div class="jip-carousel__item"></div>
                                    <div class="jip-carousel__item"></div>
                                    <div class="jip-carousel__item"></div>
                                    <div class="jip-carousel__item"></div>
                                    <div class="jip-carousel__item"></div>
                                    <div class="jip-carousel__item"></div>
                                </div>
                            </div>
                            <div class="mt15">
                                <span class="jip-blue block font-style-guide">Indicator Dots / Selected Circle: #C4D600</span>
                                <span class="jip-blue block font-style-guide">Arrow: 1.5px border / #FFFFFF</span>
                                <span class="jip-blue block font-style-guide">  Not Selected Arrow: 70% Opacity</span>

                                <h4 class="jip-blue style-guide__subtitle">Hover State</h4>
                                <span class="jip-blue block font-style-guide">Move arrow over by 20px to the right</span>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="jip-blue style-guide__title"><?php esc_html_e('Text Link', 'cornell-tech'); ?></h3>
                <div class="style-guide__group">
                    <div class="style-guide__row">
                        <div class="style-guide__row-inner style-guide__row-inner--button">
                            <div class="font-style-guide-box">
                                <a href="#" class="jip-link" title="">Text Link Style</a>
                            </div>
                            <span class="jip-blue block font-style-guide">DIN Demi / 14px / 0px character spacing / 24px line height / #C4D600</span>
                        </div>

                        <div class="style-guide__row-inner style-guide__row-inner--button">
                            <div class="font-style-guide-box">
                                <a href="#" class="jip-link jip-link--hover" title="">Text Link Style</a>
                            </div>
                            <h4 class="jip-blue style-guide__subtitle">Hover State</h4>
                            <span class="jip-blue block font-style-guide">Change opacity to 50% upon hover</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="style-guide__section">
                <div class="container">
                    <div class="style-guide__intro">
                        <h2 class="jip-pink style-guide__section-title"><?php esc_html_e('Card', 'cornell-tech'); ?></h2>
                    </div>
                    <div class="style-guide__group">
                        <div class="style-guide__row">
                            <?php
                            the_module('jip-card')
                            ?>
                            <div class="style-guide__row-inner style-guide__row-inner--button">
                                <h4 class="jip-pink style-guide__subtitle">Expanded State</h4>
                                <span class="jip-pink block font-style-guide">Right-hand side slides open up to reveal the 2 CTAs</span>
                                <span class="jip-pink block font-style-guide">Have white “wave” move up to make room for supporting text.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</section>
