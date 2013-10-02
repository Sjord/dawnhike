<?php

class Widget {
    function __construct() {
        $this->name = get_class($this);
    }

    function _renderFiles($extension) {
        $files = glob('widgets/'.$this->name.'/*'.$extension);
        foreach ($files as $file) {
            include($file);
        }
    }

    function renderHtml() {
        $this->renderFiles('main.php');
    }

    function renderCss() {
        $this->_renderFiles('.css');
    }

    function renderHead() {
        $this->_renderFiles('head.html');
    }

    function renderScript() {
        $this->_renderFiles('.js');
    }
    
    function getCssIncludes() {
        return array();
    }

    function getScriptIncludes() {
        return array();
    }
}
