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

var_dump($Mind->is_isbn('ISBN:0-306-40615-2'));     // return 1
var_dump($Mind->is_isbn('0-306-40615-2'));          // return 1
var_dump($Mind->is_isbn('ISBN:0306406152'));        // return 1
var_dump($Mind->is_isbn('0306406152'));             // return 1
var_dump($Mind->is_isbn('ISBN:979-1-090-63607-1')); // return 2
var_dump($Mind->is_isbn('979-1-090-63607-1'));      // return 2
var_dump($Mind->is_isbn('ISBN:9791090636071'));     // return 2
var_dump($Mind->is_isbn('9791090636071'));          // return 2
var_dump($Mind->is_isbn('ISBN:97811'));             // return false