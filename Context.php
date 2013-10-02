<?php

class Context {
    function __construct($timestamp) {
        $this->year = date('Y', $timestamp);
        $this->date = $this->nl_date('j M Y', $timestamp);
    }

    function nl_date($format, $time) {
        $search = array('May', 'Jun');
        $replace = array('mei', 'jun');
        return str_replace($search, $replace, date($format, $time));
    }
}
