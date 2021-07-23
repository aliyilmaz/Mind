<?php

require_once '../src/Mind.php';

$Mind = new Mind();


$result = $Mind->addressGenerator('255.255.254.200', '255.255.254.230');

$Mind->print_pre($result);