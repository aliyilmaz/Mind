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

$duration = '02:02:00';
$timecode = '02:02:02';
if($Mind->timecodeCompare($duration, $timecode)){
    echo 'true';
}else{
    echo 'false';
}