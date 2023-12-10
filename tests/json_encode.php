<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

$data = ['Beyazıt Karataş: Milli Muharif Uçağın adı "Türk Kartalı" olmalı!', 'Ali Yılmaz'];
echo $Mind->json_encode($data); // $this->json_encode($data, false); or $this->json_encode($data, false, true);