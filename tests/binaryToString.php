<?php

require_once '../src/Mind.php';

$Mind = new Mind();

$data = '1000001 1101100 1101001 100000 1011001 11000100 10110001 1101100 1101101 1100001 1111010';
echo $Mind->binaryToString($data);