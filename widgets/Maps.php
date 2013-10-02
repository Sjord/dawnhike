<?php

class Maps extends Widget {
    function renderHtml($context) {
        echo '<div id="map-canvas" style="height: 500px; width: 100%"></div>';
    }

    function getScriptIncludes() {
        return array(
            "scripts/jquery-1.8.2.min.js",
            "https://maps.googleapis.com/maps/api/js?key=AIzaSyD44ReafoysVF0wuvCnvq-JjoiaJ_z6jt4&sensor=false"
        );
    }
}
