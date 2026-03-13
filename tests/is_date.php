<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

$time = '09:00'; // 09:00, 2026-01-03, 2026-01-03 14:22, 2026-01-03 14:22:22
$format = 'H:i'; // H:i, Y-m-d, Y-m-d H:i, Y-m-d H:i:s

if($Mind->is_date($time, $format)){
    echo 'Valid';
} else {
    echo 'Invalid';
}