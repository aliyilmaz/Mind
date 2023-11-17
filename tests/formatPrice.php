<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

// $price = '605'; // 605.00
// echo $Mind->formatPrice($price);

// $price = '605.00'; // 605.00
// echo $Mind->formatPrice($price);

// $price = '4235'; // 4,235.00
// echo $Mind->formatPrice($price);

// $price = '4,235'; // 4,235.00
// echo $Mind->formatPrice($price);

$price = '4,235.00'; // 4,235.00
echo $Mind->formatPrice($price);



