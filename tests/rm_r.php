<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

if($Mind->rm_r('silinecekler'))
{
  echo 'Deleted.';
} else {
  echo 'Not Deleted.';
}


$paths = array(
    'silinecekler1',
    'silinecekler2',
    'silinecekler3/sil1.txt'
);
if($Mind->rm_r($paths)){
  echo 'Deleted.';
} else {
  echo 'Not Deleted.';
}