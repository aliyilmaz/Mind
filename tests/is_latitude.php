<?php

require_once '../src/Mind.php';

$Mind = new Mind();

$latitude = 41.008610;

echo '<br>';

if($Mind->is_latitude($latitude)){
    echo 'The current latitude.';
} else {
    echo 'Invalid latitude.';
}
