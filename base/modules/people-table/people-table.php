<?php
    if (!empty($anchor_link)) {
        the_module('section-anchor', array(
            'anchor_link' => $anchor_link
        ));
    }
    $table_columns = array(
        'student' => __('Student', 'cornell-tech'),
        'advisor' => __('Advisor', 'cornell-tech'),
        'department' => __('Dept.', 'cornell-tech'),
        'email' => __('Email', 'cornell-tech'),
    );
?>

<?php if (!empty($list)) : ?>
    <section class="section-gutter people-table-module" data-module="people-table">
        <div class="people-table-module__wrapper">
            <div class="container people-table-module__container">
                <div class="people-table-module__inner">
                    <table class="people-table sortable">
                        <thead class="people-table__thead">
                            <tr>
                                <?php foreach ($table_columns as $key => $column) : ?>
                                    <th class="label-text people-table__th<?php if ($key == 'student') : ?> order-asc<?php endif; ?>" tabindex="0"><?php echo $column; ?> <span class="icon-up-down people-table__th-icon"></span></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody class="people-table__tbody">
                            <?php foreach ($list as $row) : ?>
                                <tr class="people-table__tr">
                                    <?php foreach ($table_columns as $key => $column) : ?>
                                        <td class="people-table__td" data-head="<?= $column . ':' ?>" data-sort="<?= strtolower($row[$key]['sort']) ?>"><?php echo $row[$key]['content']; ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
