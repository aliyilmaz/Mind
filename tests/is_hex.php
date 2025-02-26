<?php

require_once '../src/Mind.php';

$Mind = new Mind();

if($Mind->is_hex('46656e6572626168c3a7652074657374')){
    echo 'This is a Hex code.';
} else {
    echo 'This is not a Hex code.';
}