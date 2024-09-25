<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

if($Mind->is_callsign('NMTZ')){
    echo 'Valid';
} else {
    echo 'Invalid';
}