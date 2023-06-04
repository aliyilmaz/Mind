<?php

require_once '../src/Mind.php';

$Mind = new Mind();
$data = 'In Turkey, about 10,000 plant species grow. About 3,000 of these plant species are endemic to Turkey. With this feature, Turkey has more endemic plant species than all of Europe.';

if($Mind->is_base64(base64_encode($data))){
    echo 'This is a Base64 code.';
} else {
    echo 'This is not a base64 code.';
}

if($Mind->is_base64($data)){
    echo 'This is a Base64 code.';
} else {
    echo 'This is not a base64 code.';
}