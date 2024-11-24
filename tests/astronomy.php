<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

$lat = 39.92500;
$lon = 32.83694;
$date_str = $Mind->timestamp;
$astronomy = $Mind->astronomy($lat, $lon, $date_str);
$Mind->print_pre($astronomy);


// or

// $lat = 39.92500;
// $lon = 32.83694;
// $date_str = strtotime('2024-02-12');
// $timezone = 'America/Toronto';
// $astronomy = $Mind->astronomy($lat, $lon, $date_str, $timezone);
// $Mind->print_pre($astronomy);

