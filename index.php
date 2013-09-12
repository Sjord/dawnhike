<!DOCTYPE html>
<html>
<?php

function nl_date($format, $time) {
    $search = array('May', 'Jun');
    $replace = array('mei', 'jun');
    return str_replace($search, $replace, date($format, $time));
}

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
?>
<head>
<style type="text/css">
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
h1, h2 { 
	color: white;
	padding: 0 1em;
    text-shadow: #060 0px 0px 8px;
}
#right h1, #right h2 {
	text-align: right;
}
#left_photos img {
    height: 150px;
}

			.list_carousel ul {
				margin: 0;
				padding: 0;
				list-style: none;
				display: block;
			}
			.list_carousel li {
				border: 5px solid #999;
				padding: 0;
				margin: 6px;
				display: block;
				float: left;
			}
#carouselWrapper {
    height: 180px;
    position: relative;
}
#next2, #prev2 {
    width: 30px;
    height: 100%;
    position: absolute;
    text-indent: -9999px;
    background-position: center center;
    background-repeat: no-repeat;
}
#prev2 {
    left: 0;
    background-image: url('images/left.png');
}
#next2 {
    right: 0;
    background-image: url('images/right.png');
}
#carContainer {
    position: absolute;
    left: 30px;
    right: 30px;
}
</style>
<script src="scripts/jquery-1.8.2.min.js"></script>
<script src="scripts/jquery.carouFredSel-6.2.1-packed.js"></script>
<script src="scripts/fancybox/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="scripts/fancybox/jquery.fancybox.css" />
<title>Dawnhike</title>
</head>
<body>
<div id="left">
    <h1><?php echo date('Y', $last_year); ?></h1>
    <h2><?php echo nl_date('j M Y', $last_year); ?></h2>
    <div class="text">
        <?php
            $file = date('Y', $last_year).'/text.html';
            if (file_exists($file)) {
                readfile($file);
            }
        ?>
        <div id="carouselWrapper">
            <a id="prev2" class="prev" href="#">&lt;</a>
            <div id="carContainer" class="list_carousel">
            
            <ul id="left_photos">
                <?php 
                    $year = date('Y', $last_year);
                    $dir = $year.'/fotos';
                    $files = glob($dir . '/*.jpg') + glob($dir . '/*.JPG');
                    foreach ($files as $file) {
                        $size = getimagesize($file);
                        $width = $size[0];
                        $height = $size[1];
                        $new_width = floor(150 / $height * $width);
                        echo '<li>
                            <a class="fancybox-thumb" rel="fancybox-thumb" href="'.$file.'">
                                <img src="'.$file.'" width="'.$new_width.'" alt="Foto van dawnhike '.$year.' bij Scouting Kameleon Kinheim" />
                            </a>
                        </li>';
                    }
                ?>
            </ul>
            </div>
            <a id="next2" class="next" href="#">&gt;</a>
        </div>
        <script>
            $(document).ready(function() {
                $('#left_photos').carouFredSel({
                    auto: false,
                    prev: '#prev2',
                    next: '#next2',
                    mousewheel: true,
                    width: $('#carContainer').width(),
                    swipe: {
                        onMouse: true,
                        onTouch: true
                    }
                });

                $(".fancybox-thumb").fancybox({
                    prevEffect	: 'none',
                    nextEffect	: 'none',
                    helpers	: {
                        title	: {
                            type: 'outside'
                        },
                        thumbs	: {
                            width	: 50,
                            height	: 50
                        }
                    }
                });
            });
        </script>
    </div>
</div><div id="right">

    <h1><?php echo date('Y', $next_year); ?></h1>
    <h2><?php echo nl_date('j M Y', $next_year); ?></h2>
<div class="text">
    <?php
        $file = date('Y', $next_year).'/text.html';
        if (file_exists($file)) {
            readfile($file);
        }
    ?>
</div>

</div>
