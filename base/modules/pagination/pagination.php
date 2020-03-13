<div class="pagination">
    <div class="container">
        <div class="pagination__inner">
            <div class="pagination__list">
                <?php echo paginate_links(
                    array(
                        'prev_text' => '<span class="icon-arrow"></span><span>Prev</span>',
                        'next_text' => '<span>Next</span><span class="icon-arrow"></span>'
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>

