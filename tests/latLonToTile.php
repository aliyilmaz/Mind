<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

$zoom = '16'; 
$lat = '39.91790000'; 
$lon = '32.86268000';
$render = $Mind->latLonToTile($zoom, $lat, $lon);

$Mind->print_pre($render);

// Array
// (
//     [z] => 16
//     [x] => 38750
//     [y] => 24830
// )
