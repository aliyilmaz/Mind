<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

if($Mind->is_timezone('Europe/Istanbul')){
    echo 'This is a timezone.';
} else {
    echo 'This is not a timezone.';
}