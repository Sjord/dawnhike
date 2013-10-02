<?php

class Header extends Widget {
    function renderHtml($context) {
        ?>
            <h1><?php echo $context->year; ?></h1>
            <h2><?php echo $context->date; ?></h2>
        <?php
    }
}
