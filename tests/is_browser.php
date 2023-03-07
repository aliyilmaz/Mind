<?php
require_once ('../src/Mind.php');

$Mind = new Mind([
    'db'=>[
        'drive'     =>  'mysql', // mysql, sqlite
        'host'      =>  'localhost',
        'dbname'    =>  'mydb', // mydb, app/migration/mydb.sqlite
        'username'  =>  'root',
        'password'  =>  '',
        'charset'   =>  'utf8mb4'
    ]
]);

if($Mind->is_browser($Mind->getBrowser())){
    echo 'TRUE';
} else {
    echo 'FALSE';
}


echo '<br>';


if($Mind->is_browser($Mind->getBrowser(), ['firefox', 'Chrome'])){
    echo 'TRUE';
} else {
    echo 'FALSE';
}


echo '<br>';

if($Mind->is_browser('Firefox', ['Firefox', 'Chrome'])){
    echo 'TRUE';
} else {
    echo 'FALSE';
}

echo '<br>';

if($Mind->is_browser('Edge', ['Firefox', 'Chrome', 'Edge', 'Safari', 'Opera'])){
    echo 'TRUE';
} else {
    echo 'FALSE';
}

