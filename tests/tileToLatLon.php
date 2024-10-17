<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

$z = '16'; 
$x = '38750'; 
$y = '24830';
$render = $Mind->tileToLatLon($z, $x, $y);

$Mind->print_pre($render);

// Array
// (
//     [zoom] => 16
//     [lat] => 39.918162846609
//     [lon] => 32.860107421875
// )
