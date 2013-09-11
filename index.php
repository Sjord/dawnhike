<head>
<style type="text/css">
body {
	margin: 0;
	padding: 0;
	font-family: sans-serif;
	background: green;
}
#left, #right {
	min-height: 100%;
	width: 50%;
	display: inline-block;
	background: green no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	vertical-align: top;
}
.text {
	background: rgba(255, 255, 255, 0.5);
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
</head>
<body>
<div id="left">
    <h1>2013</h1>
    <h2>9 mei 2013</h2>
    <div class="text">
        <div id="carouselWrapper">
            <a id="prev2" class="prev" href="#">&lt;</a>
            <div id="carContainer" class="list_carousel">
            
            <ul id="left_photos">
                <?php 
                    $year = 2013;
                    $dir = $year.'/fotos';
                    $files = glob($dir . '/*.jpg') + glob($dir . '/*.JPG');
                    foreach ($files as $file) {
                        $size = getimagesize($file);
                        $width = $size[0];
                        $height = $size[1];
                        $new_width = 150 / $height * $width;
                        echo '<li>
                            <a class="fancybox-thumb" rel="fancybox-thumb" href="'.$file.'">
                                <img src="'.$file.'" width="'.$new_width.'" />
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
<h1>2014</h1>
<h2>29 mei 2014</h2>
<div class="text">
<p>
Het is alweer bijna Hemelvaartsdag, dus wordt het weer tijd om
condens te gaan vertrappen, ofwel dauwtrappen, zoals dat ook wel
heet.
</p><p>
Traditiegetrouw organiseren de explo's al vele jaren dit grandioze
wandel- en eetfestijn, wat altijd als een succes uitpakt. Gegarandeerd
geen saaie wandeling met een boterhammetje uit een zakje, maar een
mooie tocht met als afsluiter een zeer uitgebreide brunch op het
clubhuis. Explo's noemen het daarom ook wel de Dawnhike.
</p><p>
Deze tocht is tevens een geweldige mogelijkheid voor je ouders,
vrienden, familie of buren om een snufje van scouting op te pikken.
Deze tocht is namelijk voor iedereen!
</p>
</div>

</div>
