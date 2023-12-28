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


$needle = [
    'beautiful',
    'wonderful'
];
$haystack = [
    'We are in the last days of December.We are preparing to meet a Wonderful new year!',
    'But the first spring is beautiful!'
];

if($Mind->stristr($haystack, $needle)){
    echo 'Found.';
} else {
    echo 'Not found.';
}


// $condition = $Mind->stristr($haystack, $needle, true);
// if($condition){
//     echo 'Found: '.$condition;
// } else {
//     echo 'Not found.';
// }

