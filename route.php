<?php

$year = (int) $_GET['year'];
$file = $year.'/'.$year.'.gpx';

$doc = new DOMDocument();
$doc->load($file);
$points = $doc->getElementsByTagName('trkpt');

$result = array();
foreach ($points as $point) {
    $lat = $point->getAttribute('lat');
    $lon = $point->getAttribute('lon');
    $result[] = array("lat" => (float)$lat, "lon" => (float)$lon);
}
echo json_encode($result);
