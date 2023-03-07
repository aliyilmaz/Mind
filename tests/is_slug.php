<?php

require_once '../src/Mind.php';

$Mind = new Mind();

$str = $Mind->permalink('Hello world');
if($Mind->is_slug($str)){
    echo 'This is a slug.';
} else {
    echo 'This is not a slug.';
}
echo '<hr>';
$str = '*';
if($Mind->is_slug($str)){
    echo 'This is a slug.';
} else {
    echo 'This is not a slug.';
}

