<?php

require_once '../src/Mind.php';

$Mind = new Mind();


$data = bin2hex('Merhaba dünya');

echo $Mind->hexToBinary($data);