<?php

class Photos extends Widget {
    function renderHtml($context) {
        ?>
            <div id="carouselWrapper">
                <a id="prev2" class="prev" href="#">&lt;</a>
                <div id="carContainer" class="list_carousel">
                
                <ul id="left_photos">
                    <?php 
                        $year = $context->year;
                        $dir = $year.'/fotos';
                        $files = glob($dir . '/*.jpg') + glob($dir . '/*.JPG');
                        foreach ($files as $file) {
                            $size = getimagesize($file);
                            $width = $size[0];
                            $height = $size[1];
                            $new_width = floor(150 / $height * $width);
                            echo '<li>
                                <a class="fancybox-thumb" rel="fancybox-thumb" href="'.$file.'">
                                    <img src="'.$file.'" width="'.$new_width.'" alt="Foto van Dawnhike '.$year.' bij Scouting Kameleon Kinheim" />
                                </a>
                            </li>';
                        }
                    ?>
                </ul>
                </div>
                <a id="next2" class="next" href="#">&gt;</a>
            </div>

        <?php
    }

    function getCssIncludes() {
        return array('scripts/fancybox/jquery.fancybox.css');
    }

    function getScriptIncludes() {
        return array(
            "scripts/jquery-1.8.2.min.js",
            "scripts/jquery.carouFredSel-6.2.1-packed.js",
            "scripts/fancybox/jquery.fancybox.pack.js",
        );
    }
}
