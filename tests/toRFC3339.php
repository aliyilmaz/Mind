<?php
require_once ('../src/Mind.php');

$Mind = new Mind();


// $ndate = "10/06/2023";
// echo $Mind->toRFC3339($ndate);

echo $Mind->toRFC3339($Mind->timestamp);
