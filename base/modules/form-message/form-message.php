<?php if( function_exists('gravity_form') ) : ?>
    <section class="form-message">
        <div class="container">
            <div class="form-message__wrapper section-gutter">
                <div class="grid">
                    <div class="grid__item form-message__inner">
                        <?php gravity_form( 1, true, false, false, '', false ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
