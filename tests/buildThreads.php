<?php
require_once ('../src/Mind.php');

$Mind = new Mind();


$comments = [
    ['id'=>1,'comment_id'=>null,'text'=>'First comment'],
    ['id'=>2,'comment_id'=>1,'text'=>'Reply to first comment'],
    ['id'=>3,'comment_id'=>1,'text'=>'another answer'],
    ['id'=>4,'comment_id'=>2,'text'=>'Reply to reply'],
];

$threads = $Mind->buildThreads($comments);

$Mind->print_pre($threads);