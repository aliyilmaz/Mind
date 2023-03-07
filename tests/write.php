<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

// $str = 'Merhaba dünya';
// $Mind->write($str, 'yeni.txt');

// $str = array('Merhaba', 'Dünya');
// $Mind->write($str, 'yeni.txt');

// $str = array('Merhaba', 'Dünya');
// $Mind->write($str, 'yeni.txt', '~');

$str = 'Merhaba dünya';
$Mind->write($str, 'klasor/alt_klasor/yeni.txt');

$str = array('Merhaba', 'Dünya');
$Mind->write($str, 'klasor/alt_klasor/yeni.txt');

