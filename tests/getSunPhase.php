<?php
require_once ('../src/Mind.php');

$Mind = new Mind();


$sun = $Mind->getSunPhase(39.92500,32.83694);
$Mind->print_pre($sun);

// $sun = $Mind->getSunPhase(39.92500,32.83694, '2024-11-28 23:19:21');
// $Mind->print_pre($sun);

// $sun = $Mind->getSunPhase(39.92500,32.83694, '2024-11-28 23:19:21', 'UTC');
// $Mind->print_pre($sun);