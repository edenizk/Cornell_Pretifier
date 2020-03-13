<button
    class="<?php echo
        trim('nav-trigger ' . ($class ?: '')); ?>"
    <?php if ($controls ?: ''): ?>
        aria-controls="<?php echo $controls ?>"
    <?php endif ?>
    aria-label="Navigation menu"
    aria-haspopup="true"
    aria-expanded="false"
    <?php
        if ($data_action)
            echo $data_action;
    ?>
>
    <span class="nav-trigger__bar"></span>
    <span class="nav-trigger__bar"></span>
    <span class="nav-trigger__bar"></span>
</button>
