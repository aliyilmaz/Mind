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

$start_date = '2022-09-02';
if($Mind->lifetime($start_date)){
    echo 'Time hasn\'t expired.';
} else {
    echo 'The time has expired.';
}

$start_date = '2022-09-02 14:20:10';
if($Mind->lifetime($start_date)){
    echo 'Time hasn\'t expired.';
} else {
    echo 'The time has expired.';
}

$start_date = '2022-09-02';
$end_date = '2022-09-02';
if($Mind->lifetime($start_date, $end_date)){
    echo 'Time hasn\'t expired.';
} else {
    echo 'The time has expired.';
}

$start_date = '2022-09-02 22:02:34';
$end_date = '2022-09-02 22:02:35';
if($Mind->lifetime($start_date, $end_date)){
    echo 'Time hasn\'t expired.';
} else {
    echo 'The time has expired.';
}