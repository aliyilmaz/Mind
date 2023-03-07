<?php

require_once '../src/Mind.php';

$Mind = new Mind();

$data = 'Ali Yılmaz';
echo $Mind->stringToBinary($data);