<?php
ob_start("ob_gzhandler");
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<?php

require('Context.php');
require('Widget.php');
require('widgets/Text.php');
require('widgets/Header.php');
require('widgets/Photos.php');
require('widgets/Maps.php');

$dates = json_decode(file_get_contents('dates.json'));
$now = time();
foreach ($dates as $date) {
    $time = strtotime($date->date);
    if ($now < $time) {
        $next_year = $time;
        break;
    }
    $last_year = $time;
}

$text = new Text();
$header = new Header();
$photos = new Photos();
$maps = new Maps();
$widgets = array($text, $header, $photos, $maps);
?>
<head>
    <style type="text/css">
        html {
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: green;
            display: table;
            height: 100%;
        }
        #left, #right {
            width: 50%;
            display: table-cell;
            background: green no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            vertical-align: top;
        }
        .text {
            background: rgba(255, 255, 255, 0.6);
            padding: 1em;
            margin: 1em;
        }
        #left {
            background-image: url('dauw1.jpg');
        }
        #right {
            background-image: url('dauw2.jpg');
        }

        <?php
            foreach ($widgets as $widget) {
                $widget->renderCss();
            }
        ?>
    </style>
    <?php
        $includes = array();
        foreach ($widgets as $widget) {
            $includes = array_merge($includes, $widget->getCssIncludes());
        }
        $includes = array_unique($includes);
        foreach ($includes as $include) {
            echo '<link rel="stylesheet" href="'.$include.'" />';
        }
    ?>
    <title>Dawnhike</title>
</head>
<body>
    <div id="left">
        <?php $context = new Context($last_year); ?>
        <?php $header->renderHtml($context); ?>
        <div class="text">
            <?php
                $text->renderHtml($context);
                $photos->renderHtml($context);
                $maps->renderHtml($context);
            ?>
        </div>
    </div><div id="right">
        <?php $context = new Context($next_year); ?>
        <?php $header->renderHtml($context); ?>
        <div class="text">
            <?php
                $text->renderHtml($context);
            ?>
        </div>

    </div>

    <?php
        $includes = array();
        foreach ($widgets as $widget) {
            $includes = array_merge($includes, $widget->getScriptIncludes());
        }
        $includes = array_unique($includes);
        foreach ($includes as $include) {
            echo '<script type="text/javascript" src="'.$include.'"></script>';
        }
    ?>
    <script type="text/javascript">
        <?php
            foreach ($widgets as $widget) {
                $widget->renderScript();
            }
        ?>
    </script>
