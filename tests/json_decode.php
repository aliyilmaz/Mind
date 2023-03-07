<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

$data = '[
    "Beyazıt Karataş: Milli Muharif Uçağın adı \"Türk Kartalı\" olmalı!",
    "Ali Yılmaz"
]';
$Mind->print_pre($Mind->json_decode($data));