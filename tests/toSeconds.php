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

echo '2:2 - 7320<br>';
echo $Mind->toSeconds('2:2');

echo '<hr>';

echo '2:2:0 - 7320 <br>';
echo $Mind->toSeconds('2:2:0');

echo '<hr>';

echo '02:02 - 7320 <br>';
echo $Mind->toSeconds('02:02');

echo '<hr>';

echo '02:02:00 - 7320 <br>';
echo $Mind->toSeconds('02:02:00');
