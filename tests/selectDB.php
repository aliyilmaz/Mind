<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

$Mind->selectDB('blog');
$Mind->print_pre($Mind->getData('users', array('limit'=>array('end'=>2))));