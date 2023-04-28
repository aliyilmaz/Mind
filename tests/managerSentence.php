<?php
require_once ('../src/Mind.php');

$Mind = new Mind([
    'db'=>[]]);

// $str = 'Ortaya çıkan gizemli bir virüs, tüm şehri etkisi altına alır. Virüsten etkilenenler birer birer canavara dönüşmektedir.';
// echo $Mind->managerSentence($str, 1);

$str = 'Ortaya çıkan gizemli bir virüs, tüm şehri etkisi altına alır. Virüsten etkilenenler birer birer canavara dönüşmektedir.';
echo $Mind->managerSentence($str, 2);


