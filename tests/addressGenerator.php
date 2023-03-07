<?php

require_once '../src/Mind.php';

$Mind = new Mind();

// ipv4
// $result = $Mind->addressGenerator('255.255.254.200', '255.255.254.230');

// ipv6
// $start = "2001:0db8:85a3:0000:0000:8a2e:0370:7334";
// $end = "2001:0db8:85a3:0000:0000:8a2e:0370:7384";
// $result = $Mind->addressGenerator($start, $end, 'ipv6');
// $Mind->print_pre($result);

// onion
$start = "abcdefghijklmnop";
$end = "abcdefghijklmnoz";
$result = $Mind->addressGenerator($start, $end, 'onion');
$Mind->print_pre($result);

