<?php

class Text extends Widget {
    function renderHtml($context) {
        $file = $context->year.'/text.html';
        if (file_exists($file)) {
            readfile($file);
        }
    }
}
