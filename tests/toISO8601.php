<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

echo $Mind->toISO8601('2012-01-18 11:45');
// echo $Mind->toISO8601('2012-01-18 11:45:00+01:00');
// echo $Mind->toISO8601('2012-01-18T11:45:00+01:00');
