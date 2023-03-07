<?php
require_once ('../src/Mind.php');

$Mind = new Mind([
    'db'=>[]
]);


// echo $Mind->mime_content_type('../screenshots/error.png');
echo $Mind->mime_content_type('https://raw.githubusercontent.com/aliyilmaz/Mind/master/screenshots/error.png');
?>