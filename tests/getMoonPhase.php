<?php
require_once ('../src/Mind.php');

$Mind = new Mind();


$moon = $Mind->getMoonPhase('2024-11-30 07:43:30');
$Mind->print_pre($moon);

// $moon = $Mind->getMoonPhase('2024-11-28 23:19:21', 'America/Toronto');
// $Mind->print_pre($moon);
