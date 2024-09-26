<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

echo '0-';
$Mind->print_pre($Mind->getRecipients('0-'));
